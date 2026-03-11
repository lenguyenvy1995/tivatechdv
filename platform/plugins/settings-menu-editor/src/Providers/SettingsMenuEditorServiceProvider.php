<?php

namespace FurkanKalafat\SettingsMenuEditor\Providers;

use Botble\Base\Facades\AdminHelper;
use Botble\Base\Facades\DashboardMenu;
use Botble\Base\Facades\PanelSectionManager;
use Botble\Base\PanelSections\PanelSection;
use Botble\Base\PanelSections\PanelSectionItem;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Setting\PanelSections\SettingOthersPanelSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Throwable;

class SettingsMenuEditorServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    protected const SETTING_KEY = 'settings_menu_editor_layout';

    protected const SUPPORTED_GROUPS = ['settings', 'system'];

    protected array $runtimeItemsByGroup = [];

    protected array $runtimeSectionItemsByGroup = [];

    protected array $runtimeItemPrioritiesByGroup = [];

    protected array $runtimeHiddenItemsByGroup = [];

    protected ?array $catalogContext = null;

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/settings-menu-editor')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadAndPublishTranslations()
            ->loadAndPublishViews();

        $this->registerRoutes();
        $this->registerPanelItem();
        $this->registerSortFilters();
    }

    protected function registerRoutes(): void
    {
        AdminHelper::registerRoutes(function (): void {
            Route::group([
                'prefix' => 'settings/settings-menu-editor',
                'as' => 'settings-menu-editor.',
                'permission' => 'settings-menu-editor.index',
            ], function (): void {
                Route::get('/', fn (Request $request) => $this->index($request))->name('index');
                Route::post('/', fn (Request $request) => $this->update($request))->name('update');
                Route::post('/reset', fn () => $this->reset())->name('reset');
            });
        });
    }

    protected function registerPanelItem(): void
    {
        PanelSectionManager::default()->beforeRendering(function (): void {
            $targetSection = $this->resolveFurkanKalafatPanelSectionClass();

            if ($targetSection !== SettingOthersPanelSection::class) {
                PanelSectionManager::register($targetSection);
            }

            PanelSectionManager::registerItem(
                $targetSection,
                fn () => PanelSectionItem::make('settings-menu-editor')
                    ->setTitle(trans('plugins/settings-menu-editor::settings-menu-editor.settings.title'))
                    ->withDescription(trans('plugins/settings-menu-editor::settings-menu-editor.settings.description'))
                    ->withIcon('ti ti-layout-grid')
                    ->withPriority(998)
                    ->withUrl(route('settings-menu-editor.index'))
                    ->withPermissions(['settings-menu-editor.index'])
            );
        });
    }

    protected function resolveFurkanKalafatPanelSectionClass(): string
    {
        $sectionClasses = [
            'order-chat' => \FurkanKalafat\OrderChat\PanelSections\FurkanKalafatPanelSection::class,
            'admin-menu-editor' => \FurkanKalafat\AdminMenuEditor\PanelSections\FurkanKalafatPanelSection::class,
            'google-drive-backup' => \FurkanKalafat\GoogleDriveBackup\PanelSections\FurkanKalafatPanelSection::class,
            'tryoto' => \FurkanKalafat\Tryoto\PanelSections\FurkanKalafatPanelSection::class,
            'settings-menu-editor' => \FurkanKalafat\SettingsMenuEditor\PanelSections\FurkanKalafatPanelSection::class,
        ];

        foreach ($sectionClasses as $plugin => $class) {
            $active = function_exists('is_plugin_active') ? is_plugin_active($plugin) : true;

            if ($active && class_exists($class)) {
                return $class;
            }
        }

        return SettingOthersPanelSection::class;
    }

    protected function registerSortFilters(): void
    {
        if (! function_exists('add_filter')) {
            return;
        }

        add_filter('panel_sections', function (array $sections, $groupId, $manager = null): array {
            $resolvedGroupId = $this->resolvePanelSectionsGroupId($sections, $groupId, $manager);

            if (! $resolvedGroupId) {
                return $sections;
            }

            return $this->applyLayoutToSections($sections, $resolvedGroupId);
        }, 120, 3);

        add_filter('panel_section_items', function (array $items, $section): array {
            if (! is_object($section) || ! method_exists($section, 'getGroupId')) {
                return $items;
            }

            $groupId = (string) $section->getGroupId();

            if (! in_array($groupId, $this->getSupportedGroupIds(), true)) {
                return $items;
            }

            $sectionId = method_exists($section, 'getId') ? (string) $section->getId() : '';

            if (
                $sectionId === ''
                || ! isset($this->runtimeSectionItemsByGroup[$groupId])
                || ! isset($this->runtimeSectionItemsByGroup[$groupId][$sectionId])
            ) {
                return $items;
            }

            $resolved = [];

            foreach ($this->runtimeSectionItemsByGroup[$groupId][$sectionId] as $itemId) {
                if (! isset($this->runtimeItemsByGroup[$groupId][$itemId])) {
                    continue;
                }

                if (isset($this->runtimeHiddenItemsByGroup[$groupId][$itemId]) && $this->runtimeHiddenItemsByGroup[$groupId][$itemId]) {
                    continue;
                }

                $item = $this->runtimeItemsByGroup[$groupId][$itemId];

                if (is_object($item) && method_exists($item, 'setSectionId')) {
                    $item->setSectionId($sectionId);
                }

                if (
                    is_object($item)
                    && method_exists($item, 'withPriority')
                    && isset($this->runtimeItemPrioritiesByGroup[$groupId][$sectionId][$itemId])
                ) {
                    $item->withPriority((int) $this->runtimeItemPrioritiesByGroup[$groupId][$sectionId][$itemId]);
                }

                $resolved[] = $item;
            }

            return $resolved;
        }, 120, 2);
    }

    protected function applyLayoutToSections(array $sections, string $groupId): array
    {
        [, $sectionMap, $currentItemRegistry] = $this->extractCatalogFromSections($sections);
        $catalogContext = $this->buildCatalogContext();
        $catalog = $catalogContext['catalogByGroup'][$groupId] ?? [];
        $itemRegistry = $catalogContext['itemRegistryById'] ?? [];

        if (empty($itemRegistry)) {
            $itemRegistry = $currentItemRegistry;
        }

        $layout = $this->normalizeSingleGroupLayout(
            $this->getSavedLayout(),
            $groupId,
            $catalog,
            $catalogContext['itemDefaultGroupById'] ?? [],
            $catalogContext['sectionDefaultGroupById'] ?? [],
            $catalogContext['sectionTitleById'] ?? []
        );

        $this->runtimeItemsByGroup[$groupId] = $itemRegistry;
        $this->runtimeSectionItemsByGroup[$groupId] = $layout['items'] ?? [];
        $this->runtimeItemPrioritiesByGroup[$groupId] = [];
        $this->runtimeHiddenItemsByGroup[$groupId] = [];

        foreach ((array) ($layout['item_meta'] ?? []) as $itemId => $meta) {
            if (! is_string($itemId) || trim($itemId) === '' || ! is_array($meta)) {
                continue;
            }

            $this->runtimeHiddenItemsByGroup[$groupId][trim($itemId)] = (bool) ($meta['hidden'] ?? false);
        }

        $ordered = [];
        $priority = 0;

        foreach ($layout['sections'] as $sectionId) {
            $meta = $layout['section_meta'][$sectionId] ?? [];
            $title = is_array($meta) && isset($meta['title']) && is_string($meta['title']) && trim($meta['title']) !== ''
                ? trim($meta['title'])
                : $sectionId;
            $hidden = is_array($meta) && (bool) ($meta['hidden'] ?? false);

            if ($hidden) {
                continue;
            }

            if (isset($sectionMap[$sectionId])) {
                $section = $sectionMap[$sectionId];

                if (method_exists($section, 'setGroupId')) {
                    $section->setGroupId($groupId);
                }

                if (method_exists($section, 'withPriority')) {
                    $section->withPriority(99000 + $priority);
                }
            } else {
                $section = PanelSection::make($sectionId)
                    ->setId($sectionId)
                    ->setGroupId($groupId)
                    ->setTitle($title)
                    ->withPermissions($this->getGroupPermissions($groupId))
                    ->withPriority(99000 + $priority)
                    ->withEmptyStateView();
            }

            $ordered[] = $section;

            $this->runtimeItemPrioritiesByGroup[$groupId][$sectionId] = [];

            foreach ((array) ($this->runtimeSectionItemsByGroup[$groupId][$sectionId] ?? []) as $itemOrder => $itemId) {
                if (! is_string($itemId) || trim($itemId) === '') {
                    continue;
                }

                $this->runtimeItemPrioritiesByGroup[$groupId][$sectionId][trim($itemId)] = $itemOrder;
            }

            $priority++;
        }

        return $ordered;
    }

    protected function resolvePanelSectionsGroupId(array $sections, mixed $groupId, mixed $manager = null): ?string
    {
        $groupIdFromRequest = $this->resolvePanelSectionsGroupIdFromRequest();

        if ($groupIdFromRequest) {
            return $groupIdFromRequest;
        }

        foreach ($sections as $section) {
            if (! is_object($section) || ! method_exists($section, 'getGroupId')) {
                continue;
            }

            $sectionGroupId = trim((string) $section->getGroupId());

            if (in_array($sectionGroupId, $this->getSupportedGroupIds(), true)) {
                return $sectionGroupId;
            }
        }

        if (is_object($manager) && method_exists($manager, 'getGroupId')) {
            $managerGroupId = trim((string) $manager->getGroupId());

            if (in_array($managerGroupId, $this->getSupportedGroupIds(), true)) {
                return $managerGroupId;
            }
        }

        if (is_string($groupId) && in_array($groupId, $this->getSupportedGroupIds(), true)) {
            return $groupId;
        }

        return null;
    }

    protected function resolvePanelSectionsGroupIdFromRequest(): ?string
    {
        if (! function_exists('request')) {
            return null;
        }

        $request = request();

        if (! $request) {
            return null;
        }

        if ($request->routeIs('system.*') || $request->is('admin/system') || $request->is('admin/system/*')) {
            return 'system';
        }

        if ($request->routeIs('settings.*') || $request->is('admin/settings') || $request->is('admin/settings/*')) {
            return 'settings';
        }

        return null;
    }

    protected function normalizeSingleGroupLayout(
        array $layout,
        string $groupId,
        array $catalog,
        array $itemDefaultGroupById = [],
        array $sectionDefaultGroupById = [],
        array $sectionTitleById = []
    ): array
    {
        $rawGroups = is_array($layout['groups'] ?? null) ? $layout['groups'] : [];
        $rawLayout = [];

        if (isset($rawGroups[$groupId]) && is_array($rawGroups[$groupId])) {
            $rawLayout = $rawGroups[$groupId];
        } elseif (empty($rawGroups) && $groupId === 'settings') {
            // Backward compatibility for legacy single-group payload
            $rawLayout = $layout;
        }

        $claimedItemGroups = $this->extractClaimedItemGroups($layout, array_keys($itemDefaultGroupById));
        $claimedSectionGroups = $this->extractClaimedSectionGroups($layout);

        return $this->normalizeGroupLayout(
            $rawLayout,
            $catalog,
            $groupId,
            $itemDefaultGroupById,
            $sectionDefaultGroupById,
            $sectionTitleById,
            $claimedItemGroups,
            $claimedSectionGroups
        );
    }

    protected function index(Request $request)
    {
        $catalogContext = $this->buildCatalogContext();
        $catalogByGroup = $catalogContext['catalogByGroup'];
        $itemDefaultGroupById = $catalogContext['itemDefaultGroupById'] ?? [];
        $sectionDefaultGroupById = $catalogContext['sectionDefaultGroupById'] ?? [];
        $sectionTitleById = $catalogContext['sectionTitleById'] ?? [];
        $layoutByGroups = $this->normalizeLayoutByGroups(
            $this->getSavedLayout(),
            $catalogByGroup,
            $itemDefaultGroupById,
            $sectionDefaultGroupById,
            $sectionTitleById
        );

        $editorGroups = [];

        foreach ($this->getSupportedGroupIds() as $groupId) {
            $editorGroups[] = [
                'id' => $groupId,
                'title' => $this->getGroupLabel($groupId),
                'sections' => $this->buildEditorSections(
                    $catalogByGroup[$groupId] ?? [],
                    $layoutByGroups['groups'][$groupId] ?? $this->normalizeGroupLayout(
                        [],
                        [],
                        $groupId,
                        $itemDefaultGroupById,
                        $sectionDefaultGroupById,
                        $sectionTitleById,
                        [],
                        []
                    ),
                    $catalogContext['itemCatalogById'] ?? []
                ),
            ];
        }

        if (function_exists('page_title')) {
            page_title()->setTitle(trans('plugins/settings-menu-editor::settings-menu-editor.page_title'));
        }

        return response()->view('plugins/settings-menu-editor::index', [
            'editorGroups' => $editorGroups,
            'layout' => $layoutByGroups,
            'defaultTargetGroup' => 'settings',
        ]);
    }

    protected function update(Request $request): RedirectResponse
    {
        try {
            $decoded = json_decode((string) $request->input('layout', ''), true);

            if (! is_array($decoded)) {
                return redirect()
                    ->route('settings-menu-editor.index')
                    ->with('error_msg', trans('plugins/settings-menu-editor::settings-menu-editor.messages.invalid_layout_payload'));
            }

            $catalogContext = $this->buildCatalogContext();
            $catalogByGroup = $catalogContext['catalogByGroup'];
            $itemDefaultGroupById = $catalogContext['itemDefaultGroupById'] ?? [];
            $sectionDefaultGroupById = $catalogContext['sectionDefaultGroupById'] ?? [];
            $sectionTitleById = $catalogContext['sectionTitleById'] ?? [];
            $normalized = $this->normalizeLayoutByGroups(
                $decoded,
                $catalogByGroup,
                $itemDefaultGroupById,
                $sectionDefaultGroupById,
                $sectionTitleById
            );
            $this->saveLayout($normalized);

            return redirect()
                ->route('settings-menu-editor.index')
                ->with('success_msg', trans('plugins/settings-menu-editor::settings-menu-editor.messages.saved'));
        } catch (Throwable $exception) {
            Log::error('[SettingsMenuEditor] save failed: ' . $exception->getMessage(), ['exception' => $exception]);

            return redirect()
                ->route('settings-menu-editor.index')
                ->with('error_msg', trans('plugins/settings-menu-editor::settings-menu-editor.messages.save_failed'));
        }
    }

    protected function reset(): RedirectResponse
    {
        try {
            $settings = function_exists('setting') ? setting() : null;

            if (is_object($settings)) {
                if (method_exists($settings, 'delete')) {
                    $settings->delete(self::SETTING_KEY);
                } elseif (method_exists($settings, 'forget')) {
                    $settings->forget(self::SETTING_KEY);
                } elseif (method_exists($settings, 'set')) {
                    $settings->set(self::SETTING_KEY, '');
                }

                if (method_exists($settings, 'save')) {
                    $settings->save();
                }
            }

            if (class_exists('Botble\\Setting\\Models\\Setting')) {
                \Botble\Setting\Models\Setting::query()->where('key', self::SETTING_KEY)->delete();
            }

            return redirect()
                ->route('settings-menu-editor.index')
                ->with('success_msg', trans('plugins/settings-menu-editor::settings-menu-editor.messages.reset_success'));
        } catch (Throwable $exception) {
            Log::error('[SettingsMenuEditor] reset failed: ' . $exception->getMessage(), ['exception' => $exception]);

            return redirect()
                ->route('settings-menu-editor.index')
                ->with('error_msg', trans('plugins/settings-menu-editor::settings-menu-editor.messages.reset_failed'));
        }
    }

    protected function getSavedLayout(): array
    {
        $raw = function_exists('setting') ? setting(self::SETTING_KEY) : null;

        if (! is_string($raw) || trim($raw) === '') {
            return [];
        }

        $decoded = json_decode($raw, true);

        return is_array($decoded) ? $decoded : [];
    }

    protected function saveLayout(array $layout): void
    {
        $settings = function_exists('setting') ? setting() : null;

        if (! is_object($settings) || ! method_exists($settings, 'set')) {
            return;
        }

        $settings->set(self::SETTING_KEY, json_encode($layout, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

        if (method_exists($settings, 'save')) {
            $settings->save();
        }
    }

    protected function buildCatalogByGroups(): array
    {
        return $this->buildCatalogContext()['catalogByGroup'];
    }

    protected function buildCatalogContext(): array
    {
        if (is_array($this->catalogContext)) {
            return $this->catalogContext;
        }

        try {
            DashboardMenu::default()->getAll();
        } catch (Throwable) {
            // Ignore menu preloading errors and continue with available sections
        }

        $allSections = PanelSectionManager::default()->getAllSections();
        $catalogByGroup = [];
        $itemRegistryById = [];
        $itemDefaultGroupById = [];
        $itemCatalogById = [];
        $sectionDefaultGroupById = [];
        $sectionTitleById = [];

        foreach ($this->getSupportedGroupIds() as $groupId) {
            [$catalog, , $groupItemRegistry] = $this->extractCatalogFromSections((array) ($allSections[$groupId] ?? []));
            $catalogByGroup[$groupId] = $catalog;

            foreach ($groupItemRegistry as $itemId => $item) {
                if (! isset($itemRegistryById[$itemId])) {
                    $itemRegistryById[$itemId] = $item;
                }
            }

            foreach ($catalog as $section) {
                $sectionId = isset($section['id']) && is_string($section['id']) ? trim($section['id']) : '';

                if ($sectionId !== '') {
                    if (! isset($sectionDefaultGroupById[$sectionId])) {
                        $sectionDefaultGroupById[$sectionId] = $groupId;
                    }

                    if (! isset($sectionTitleById[$sectionId])) {
                        $sectionTitleById[$sectionId] = isset($section['title']) && is_string($section['title'])
                            ? trim($section['title'])
                            : $sectionId;
                    }
                }

                foreach ((array) ($section['items'] ?? []) as $item) {
                    $itemId = isset($item['id']) && is_string($item['id']) ? trim($item['id']) : '';

                    if ($itemId === '') {
                        continue;
                    }

                    if (! isset($itemDefaultGroupById[$itemId])) {
                        $itemDefaultGroupById[$itemId] = $groupId;
                    }

                    if (! isset($itemCatalogById[$itemId])) {
                        $itemCatalogById[$itemId] = $item;
                    }
                }
            }
        }

        $this->catalogContext = [
            'catalogByGroup' => $catalogByGroup,
            'itemRegistryById' => $itemRegistryById,
            'itemDefaultGroupById' => $itemDefaultGroupById,
            'itemCatalogById' => $itemCatalogById,
            'sectionDefaultGroupById' => $sectionDefaultGroupById,
            'sectionTitleById' => $sectionTitleById,
        ];

        return $this->catalogContext;
    }

    protected function extractCatalogFromSections(array $sections): array
    {
        $catalog = [];
        $sectionMap = [];
        $itemRegistry = [];

        foreach ($sections as $section) {
            if (! is_object($section) || ! method_exists($section, 'getId') || ! method_exists($section, 'getTitle')) {
                continue;
            }

            $sectionId = (string) $section->getId();

            if ($sectionId === '') {
                continue;
            }

            $sectionMap[$sectionId] = $section;
            $items = [];

            foreach ((array) $section->getItems() as $item) {
                if (! is_object($item) || ! method_exists($item, 'getId') || ! method_exists($item, 'getTitle')) {
                    continue;
                }

                $itemId = (string) $item->getId();

                if ($itemId === '') {
                    continue;
                }

                if (! isset($itemRegistry[$itemId])) {
                    $itemRegistry[$itemId] = $item;
                }

                $items[] = [
                    'id' => $itemId,
                    'title' => (string) $item->getTitle(),
                    'description' => method_exists($item, 'getDescription') ? (string) $item->getDescription() : '',
                    'icon_html' => $this->renderIconHtml(method_exists($item, 'getIcon') ? $item->getIcon() : null),
                    'source_section' => $sectionId,
                ];
            }

            $catalog[] = [
                'id' => $sectionId,
                'title' => (string) $section->getTitle(),
                'items' => $items,
            ];
        }

        return [$catalog, $sectionMap, $itemRegistry];
    }

    protected function renderIconHtml(mixed $icon): string
    {
        try {
            if (is_object($icon) && method_exists($icon, 'toHtml')) {
                $html = (string) $icon->toHtml();

                if (trim($html) !== '') {
                    return $html;
                }
            }

            if (is_string($icon)) {
                $name = trim($icon) !== '' ? trim($icon) : 'ti ti-box';

                if (str_contains($name, '<svg') || str_contains($name, '<i')) {
                    return $name;
                }

                return Blade::render('<x-core::icon :name="$name" />', ['name' => $name]);
            }
        } catch (Throwable) {
            // fallback
        }

        try {
            return Blade::render('<x-core::icon name="ti ti-box" />');
        } catch (Throwable) {
            return '<i class="ti ti-box"></i>';
        }
    }

    protected function normalizeLayoutByGroups(
        array $layout,
        array $catalogByGroup,
        array $itemDefaultGroupById = [],
        array $sectionDefaultGroupById = [],
        array $sectionTitleById = []
    ): array
    {
        $groups = [];

        $rawGroups = is_array($layout['groups'] ?? null) ? $layout['groups'] : [];
        $hasNewGroupPayload = ! empty($rawGroups);
        $claimedItemGroups = $this->extractClaimedItemGroups($layout, array_keys($itemDefaultGroupById));
        $claimedSectionGroups = $this->extractClaimedSectionGroups($layout);

        foreach ($this->getSupportedGroupIds() as $groupId) {
            $catalog = $catalogByGroup[$groupId] ?? [];

            $rawLayout = [];

            if (isset($rawGroups[$groupId]) && is_array($rawGroups[$groupId])) {
                $rawLayout = $rawGroups[$groupId];
            } elseif (! $hasNewGroupPayload && $groupId === 'settings') {
                // backward compatibility for old single-group payload
                $rawLayout = $layout;
            }

            $groups[$groupId] = $this->normalizeGroupLayout(
                $rawLayout,
                $catalog,
                $groupId,
                $itemDefaultGroupById,
                $sectionDefaultGroupById,
                $sectionTitleById,
                $claimedItemGroups,
                $claimedSectionGroups
            );
        }

        return [
            'groups' => $groups,
        ];
    }

    protected function normalizeGroupLayout(
        array $layout,
        array $catalog,
        string $groupId,
        array $itemDefaultGroupById = [],
        array $sectionDefaultGroupById = [],
        array $sectionTitleById = [],
        array $claimedItemGroups = [],
        array $claimedSectionGroups = []
    ): array
    {
        $baseSectionIds = [];
        $baseTitlesByCurrentCatalog = [];
        $itemSource = [];
        $baseItemIds = [];

        foreach ($catalog as $section) {
            $sectionId = isset($section['id']) && is_string($section['id']) ? trim($section['id']) : '';

            if ($sectionId === '') {
                continue;
            }

            $baseSectionIds[] = $sectionId;
            $baseTitlesByCurrentCatalog[$sectionId] = isset($section['title']) && is_string($section['title'])
                ? trim($section['title'])
                : $sectionId;

            foreach ((array) ($section['items'] ?? []) as $item) {
                $itemId = isset($item['id']) && is_string($item['id']) ? trim($item['id']) : '';

                if ($itemId === '' || isset($itemSource[$itemId])) {
                    continue;
                }

                $itemSource[$itemId] = $sectionId;
                $baseItemIds[] = $itemId;
            }
        }

        $baseSectionIds = array_values(array_unique($baseSectionIds));
        $baseItemIds = array_values(array_unique($baseItemIds));
        $knownBaseSectionGroupById = ! empty($sectionDefaultGroupById)
            ? $sectionDefaultGroupById
            : array_fill_keys($baseSectionIds, $groupId);
        $sectionTitlesById = [...$baseTitlesByCurrentCatalog, ...$sectionTitleById];
        $knownItemIds = ! empty($itemDefaultGroupById)
            ? array_values(array_unique(array_keys($itemDefaultGroupById)))
            : $baseItemIds;
        $knownItemLookup = array_fill_keys($knownItemIds, true);

        $rawMeta = is_array($layout['section_meta'] ?? null) ? $layout['section_meta'] : [];
        $rawItemMeta = is_array($layout['item_meta'] ?? null) ? $layout['item_meta'] : [];
        $savedItems = is_array($layout['items'] ?? null) ? $layout['items'] : [];
        $savedSections = $this->filterIds($layout['sections'] ?? []);
        $resolveSectionTargetGroup = function (string $sectionId) use ($claimedSectionGroups, $knownBaseSectionGroupById, $groupId): string {
            return $claimedSectionGroups[$sectionId] ?? ($knownBaseSectionGroupById[$sectionId] ?? $groupId);
        };

        $fallbackBaseSections = [];

        foreach ($baseSectionIds as $sectionId) {
            if ($resolveSectionTargetGroup($sectionId) === $groupId && ! in_array($sectionId, $fallbackBaseSections, true)) {
                $fallbackBaseSections[] = $sectionId;
            }
        }

        foreach ($knownBaseSectionGroupById as $sectionId => $defaultGroupId) {
            if (
                ! is_string($sectionId)
                || trim($sectionId) === ''
                || ($claimedSectionGroups[$sectionId] ?? $defaultGroupId) !== $groupId
                || in_array($sectionId, $fallbackBaseSections, true)
            ) {
                continue;
            }

            $fallbackBaseSections[] = trim($sectionId);
        }

        $candidateSectionIds = array_values(array_unique(array_merge(
            $savedSections,
            array_keys($rawMeta),
            array_keys($savedItems),
            $fallbackBaseSections
        )));
        $customSections = [];

        foreach ($candidateSectionIds as $sectionId) {
            if (! is_string($sectionId) || trim($sectionId) === '') {
                continue;
            }

            $sectionId = trim($sectionId);

            if (isset($knownBaseSectionGroupById[$sectionId])) {
                continue;
            }

            if ($resolveSectionTargetGroup($sectionId) !== $groupId) {
                continue;
            }

            $customSections[] = $sectionId;
        }

        $customSections = array_values(array_unique($customSections));
        $fallbackSectionOrder = [...$fallbackBaseSections, ...$customSections];
        $savedSectionsForCurrentGroup = array_values(array_filter(
            $savedSections,
            fn ($sectionId) => in_array($sectionId, $fallbackSectionOrder, true)
        ));
        $sectionOrder = $this->mergeOrderedIds($savedSectionsForCurrentGroup, $fallbackSectionOrder);

        if (empty($sectionOrder)) {
            $sectionOrder = $fallbackBaseSections;
        }

        $sectionMeta = [];
        $itemMeta = [];

        foreach ($sectionOrder as $sectionId) {
            if (! is_string($sectionId) || trim($sectionId) === '') {
                continue;
            }

            $sectionId = trim($sectionId);
            $meta = is_array($rawMeta[$sectionId] ?? null) ? $rawMeta[$sectionId] : [];
            $isBase = isset($knownBaseSectionGroupById[$sectionId]);
            $isCustom = ! $isBase;
            $title = trim((string) Arr::get($meta, 'title', ''));
            $hidden = (bool) Arr::get($meta, 'hidden', false);

            if ($title === '') {
                $title = $isBase
                    ? ($sectionTitlesById[$sectionId] ?? $sectionId)
                    : trans('plugins/settings-menu-editor::settings-menu-editor.defaults.custom_section_title', [
                        'number' => array_search($sectionId, $customSections, true) !== false
                            ? array_search($sectionId, $customSections, true) + 1
                            : count($customSections) + 1,
                        'group' => $this->getGroupLabel($groupId),
                    ]);
            }

            $sectionMeta[$sectionId] = [
                'title' => $title,
                'is_custom' => $isCustom,
                'hidden' => $hidden,
            ];
        }

        $itemsBySection = [];
        $assigned = [];
        $sectionOrderLookup = array_fill_keys($sectionOrder, true);

        foreach ($sectionOrder as $sectionId) {
            $itemsBySection[$sectionId] = [];

            foreach ($this->filterIds($savedItems[$sectionId] ?? []) as $itemId) {
                if (! isset($knownItemLookup[$itemId]) || isset($assigned[$itemId])) {
                    continue;
                }

                $targetGroup = $claimedItemGroups[$itemId] ?? ($itemDefaultGroupById[$itemId] ?? $groupId);

                if ($targetGroup !== $groupId) {
                    continue;
                }

                if (! isset($sectionOrderLookup[$sectionId])) {
                    continue;
                }

                $itemsBySection[$sectionId][] = $itemId;
                $assigned[$itemId] = true;
            }
        }

        $fallbackSection = $baseSectionIds[0] ?? ($sectionOrder[0] ?? null);

        if ($fallbackSection && ! isset($sectionOrderLookup[$fallbackSection])) {
            $fallbackSection = $sectionOrder[0] ?? null;
        }

        $baseItemsForGroup = empty($itemDefaultGroupById)
            ? $baseItemIds
            : collect($itemDefaultGroupById)
                ->filter(fn ($targetGroup, $itemId) => $targetGroup === $groupId && isset($knownItemLookup[$itemId]))
                ->keys()
                ->all();

        foreach ($baseItemsForGroup as $itemId) {
            if (isset($assigned[$itemId])) {
                continue;
            }

            $targetGroup = $claimedItemGroups[$itemId] ?? ($itemDefaultGroupById[$itemId] ?? $groupId);

            if ($targetGroup !== $groupId) {
                continue;
            }

            $targetSection = $itemSource[$itemId] ?? $fallbackSection;

            if (! $targetSection || ! isset($itemsBySection[$targetSection])) {
                $targetSection = $fallbackSection;
            }

            if ($targetSection) {
                $itemsBySection[$targetSection][] = $itemId;
                $assigned[$itemId] = true;
            }
        }

        foreach ($knownItemIds as $itemId) {
            if (isset($assigned[$itemId])) {
                continue;
            }

            $targetGroup = $claimedItemGroups[$itemId] ?? ($itemDefaultGroupById[$itemId] ?? null);

            if ($targetGroup !== $groupId) {
                continue;
            }

            $targetSection = $itemSource[$itemId] ?? $fallbackSection;

            if (! $targetSection || ! isset($itemsBySection[$targetSection])) {
                $targetSection = $fallbackSection;
            }

            if ($targetSection) {
                $itemsBySection[$targetSection][] = $itemId;
                $assigned[$itemId] = true;
            }
        }

        foreach ($sectionOrder as $sectionId) {
            if (! isset($sectionMeta[$sectionId])) {
                $sectionMeta[$sectionId] = [
                    'title' => $sectionTitlesById[$sectionId] ?? $sectionId,
                    'is_custom' => ! isset($knownBaseSectionGroupById[$sectionId]),
                    'hidden' => false,
                ];
            }

            $sectionMeta[$sectionId]['hidden'] = (bool) ($sectionMeta[$sectionId]['hidden'] ?? false);
            $itemsBySection[$sectionId] = array_values(array_unique($itemsBySection[$sectionId] ?? []));
        }

        $finalItemIds = [];

        foreach ($itemsBySection as $itemIds) {
            foreach ($itemIds as $itemId) {
                $finalItemIds[$itemId] = true;
            }
        }

        foreach (array_keys($finalItemIds) as $itemId) {
            $meta = $rawItemMeta[$itemId] ?? [];
            $itemMeta[$itemId] = [
                'hidden' => is_array($meta) ? (bool) ($meta['hidden'] ?? false) : false,
            ];
        }

        return [
            'sections' => array_values($sectionOrder),
            'items' => $itemsBySection,
            'section_meta' => $sectionMeta,
            'item_meta' => $itemMeta,
        ];
    }

    protected function extractClaimedItemGroups(array $layout, array $knownItemIds): array
    {
        if (empty($knownItemIds)) {
            return [];
        }

        $knownItemLookup = array_fill_keys($knownItemIds, true);
        $claimed = [];
        $rawGroups = is_array($layout['groups'] ?? null) ? $layout['groups'] : [];

        foreach ($this->getSupportedGroupIds() as $groupId) {
            $groupLayout = [];

            if (isset($rawGroups[$groupId]) && is_array($rawGroups[$groupId])) {
                $groupLayout = $rawGroups[$groupId];
            } elseif (empty($rawGroups) && $groupId === 'settings') {
                // Legacy payload without groups
                $groupLayout = $layout;
            }

            $itemsBySection = is_array($groupLayout['items'] ?? null) ? $groupLayout['items'] : [];

            foreach ($itemsBySection as $itemIds) {
                foreach ($this->filterIds((array) $itemIds) as $itemId) {
                    if (! isset($knownItemLookup[$itemId])) {
                        continue;
                    }

                    $claimed[$itemId] = $groupId;
                }
            }
        }

        return $claimed;
    }

    protected function extractClaimedSectionGroups(array $layout): array
    {
        $claimed = [];
        $rawGroups = is_array($layout['groups'] ?? null) ? $layout['groups'] : [];

        foreach ($this->getSupportedGroupIds() as $groupId) {
            $groupLayout = [];

            if (isset($rawGroups[$groupId]) && is_array($rawGroups[$groupId])) {
                $groupLayout = $rawGroups[$groupId];
            } elseif (empty($rawGroups) && $groupId === 'settings') {
                // Legacy payload without groups
                $groupLayout = $layout;
            }

            foreach ($this->filterIds((array) ($groupLayout['sections'] ?? [])) as $sectionId) {
                $claimed[$sectionId] = $groupId;
            }
        }

        return $claimed;
    }

    protected function filterIds(array $ids): array
    {
        $filtered = [];

        foreach ($ids as $id) {
            if (! is_string($id)) {
                continue;
            }

            $id = trim($id);

            if ($id === '') {
                continue;
            }

            $filtered[] = $id;
        }

        return array_values(array_unique($filtered));
    }

    protected function mergeOrderedIds(array $preferred, array $fallback): array
    {
        $merged = [];

        foreach ($preferred as $id) {
            if (in_array($id, $fallback, true) && ! in_array($id, $merged, true)) {
                $merged[] = $id;
            }
        }

        foreach ($fallback as $id) {
            if (! in_array($id, $merged, true)) {
                $merged[] = $id;
            }
        }

        return $merged;
    }

    protected function buildEditorSections(array $catalog, array $layout, array $globalItemMap = []): array
    {
        $itemMap = [];

        foreach ($catalog as $section) {
            foreach ((array) ($section['items'] ?? []) as $item) {
                if (! isset($item['id']) || ! is_string($item['id']) || trim($item['id']) === '') {
                    continue;
                }

                $itemMap[$item['id']] = $item;
            }
        }

        foreach ($globalItemMap as $itemId => $item) {
            if (! is_string($itemId) || trim($itemId) === '' || ! is_array($item) || isset($itemMap[$itemId])) {
                continue;
            }

            $itemMap[$itemId] = $item;
        }

        $sections = [];

        foreach ((array) ($layout['sections'] ?? []) as $sectionId) {
            if (! is_string($sectionId) || trim($sectionId) === '') {
                continue;
            }

            $sectionId = trim($sectionId);
            $meta = $layout['section_meta'][$sectionId] ?? [];
            $title = is_array($meta) && isset($meta['title']) && is_string($meta['title']) && trim($meta['title']) !== ''
                ? trim($meta['title'])
                : $sectionId;
            $isCustom = is_array($meta) && (bool) ($meta['is_custom'] ?? false);
            $hidden = is_array($meta) && (bool) ($meta['hidden'] ?? false);

            $items = [];

            foreach ((array) ($layout['items'][$sectionId] ?? []) as $itemId) {
                if (! is_string($itemId) || trim($itemId) === '' || ! isset($itemMap[$itemId])) {
                    continue;
                }

                $itemId = trim($itemId);
                $item = $itemMap[$itemId];
                $item['hidden'] = (bool) (($layout['item_meta'][$itemId]['hidden'] ?? false));
                $items[] = $item;
            }

            $sections[] = [
                'id' => $sectionId,
                'title' => $title,
                'is_custom' => $isCustom,
                'hidden' => $hidden,
                'items' => $items,
            ];
        }

        return $sections;
    }

    protected function getSupportedGroupIds(): array
    {
        return self::SUPPORTED_GROUPS;
    }

    protected function getGroupPermissions(string $groupId): array
    {
        return match ($groupId) {
            'system' => ['system.index'],
            default => ['settings.index'],
        };
    }

    protected function getGroupLabel(string $groupId): string
    {
        return trans('plugins/settings-menu-editor::settings-menu-editor.groups.' . $groupId);
    }
}
