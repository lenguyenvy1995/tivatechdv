@extends(BaseHelper::getAdminMasterLayoutTemplate())
@section('content')
@php($smeTranslationBase = 'plugins/settings-menu-editor::settings-menu-editor.ui')
<div class="container-xxl">
    <div class="card">
        <div class="card-header d-flex flex-column flex-lg-row gap-2 align-items-lg-center justify-content-between">
            <div>
                <h4 class="card-title mb-1">{{ trans($smeTranslationBase . '.header_title') }}</h4>
                <p class="text-muted mb-0">{{ trans($smeTranslationBase . '.header_description') }}</p>
            </div>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-outline-secondary" id="sme-reset">{{ trans($smeTranslationBase . '.reset') }}</button>
                <button type="submit" class="btn btn-primary" form="sme-form">{{ trans($smeTranslationBase . '.save_order') }}</button>
            </div>
        </div>
        <div class="card-body">
            <div id="sme-warn" class="alert alert-warning d-none">{{ trans($smeTranslationBase . '.sortable_missing') }}</div>

            <div class="sme-heading-panel mb-3">
                <div class="row g-2 align-items-end">
                    <div class="col-12 col-lg-6">
                        <label class="sme-heading-title form-label mb-2" for="sme-new-title">{{ trans($smeTranslationBase . '.new_heading') }}</label>
                        <input id="sme-new-title" class="form-control" placeholder="{{ trans($smeTranslationBase . '.new_heading_placeholder') }}">
                    </div>
                    <div class="col-12 col-lg-3">
                        <label class="sme-heading-title form-label mb-2" for="sme-new-group">{{ trans($smeTranslationBase . '.target_group_label') }}</label>
                        <select id="sme-new-group" class="form-select">
                            @foreach ($editorGroups as $group)
                                <option value="{{ $group['id'] }}" @selected($defaultTargetGroup === $group['id'])>{{ $group['title'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-lg-3 d-grid">
                        <button type="button" id="sme-add" class="btn btn-primary">
                            <svg class="sme-action-icon" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M4 12h16"></path>
                                <path d="M12 4v16"></path>
                            </svg>
                            <span>{{ trans($smeTranslationBase . '.add_heading') }}</span>
                        </button>
                    </div>
                </div>
                <div class="sme-heading-hint">{{ trans($smeTranslationBase . '.heading_hint') }}</div>
            </div>

            <form method="POST" action="{{ route('settings-menu-editor.update') }}" id="sme-form">
                @csrf
                <input type="hidden" name="layout" id="sme-layout">

                <div class="sme-group-list d-flex flex-column gap-3">
                    @foreach ($editorGroups as $group)
                        <div class="card sme-group-card" data-group-id="{{ $group['id'] }}">
                            <div class="card-header d-flex align-items-center justify-content-between gap-2">
                                <h5 class="mb-0">{{ $group['title'] }}</h5>
                                <small class="text-muted">{{ trans($smeTranslationBase . '.group_help') }}</small>
                            </div>
                            <div class="card-body">
                                <div id="sme-sections-{{ $group['id'] }}" class="sme-sections" data-group-id="{{ $group['id'] }}">
                                    @foreach ($group['sections'] as $section)
                                        <div class="card sme-section {{ $section['hidden'] ? 'sme-section-hidden' : '' }}" data-group-id="{{ $group['id'] }}" data-section-id="{{ $section['id'] }}" data-is-custom="{{ $section['is_custom'] ? 1 : 0 }}" data-hidden="{{ $section['hidden'] ? 1 : 0 }}">
                                            <div class="card-header d-flex align-items-center justify-content-between gap-2">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="sme-section-handle" title="{{ trans($smeTranslationBase . '.drag_heading') }}"><i class="ti ti-grip-vertical"></i></span>
                                                    <p class="sme-section-title">{{ $section['title'] }}</p>
                                                </div>
                                                <div class="sme-section-header-controls">
                                                    <span class="badge bg-secondary-lt sme-item-count">{{ trans($smeTranslationBase . '.item_count', ['count' => count($section['items'])]) }}</span>
                                                    <div class="sme-section-actions d-flex gap-1">
                                                        <button type="button" class="btn btn-outline-secondary btn-sm sme-toggle-section" data-group-id="{{ $group['id'] }}" data-sid="{{ $section['id'] }}" data-hidden="{{ $section['hidden'] ? 1 : 0 }}" title="{{ $section['hidden'] ? trans($smeTranslationBase . '.show_heading_and_items') : trans($smeTranslationBase . '.hide_heading_and_items') }}" aria-label="{{ $section['hidden'] ? trans($smeTranslationBase . '.show_heading_and_items') : trans($smeTranslationBase . '.hide_heading_and_items') }}">
                                                            @if ($section['hidden'])
                                                                <svg class="sme-action-icon" viewBox="0 0 24 24" aria-hidden="true">
                                                                    <path d="M2 12s4-7 10-7c6 0 10 7 10 7s-4 7-10 7c-6 0-10-7-10-7"></path>
                                                                    <circle cx="12" cy="12" r="3"></circle>
                                                                    <path d="M3 3l18 18"></path>
                                                                </svg>
                                                            @else
                                                                <svg class="sme-action-icon" viewBox="0 0 24 24" aria-hidden="true">
                                                                    <path d="M2 12s4-7 10-7c6 0 10 7 10 7s-4 7-10 7c-6 0-10-7-10-7"></path>
                                                                    <circle cx="12" cy="12" r="3"></circle>
                                                                </svg>
                                                            @endif
                                                        </button>

                                                        @if ($section['is_custom'])
                                                            <button type="button" class="btn btn-outline-secondary btn-sm sme-edit" data-group-id="{{ $group['id'] }}" data-sid="{{ $section['id'] }}" title="{{ trans($smeTranslationBase . '.edit_heading') }}" aria-label="{{ trans($smeTranslationBase . '.edit_heading') }}">
                                                                <svg class="sme-action-icon" viewBox="0 0 24 24" aria-hidden="true">
                                                                    <path d="M12 20h9"></path>
                                                                    <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"></path>
                                                                </svg>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger btn-sm sme-del" data-group-id="{{ $group['id'] }}" data-sid="{{ $section['id'] }}" title="{{ trans($smeTranslationBase . '.delete_heading') }}" aria-label="{{ trans($smeTranslationBase . '.delete_heading') }}">
                                                                <svg class="sme-action-icon" viewBox="0 0 24 24" aria-hidden="true">
                                                                    <path d="M3 6h18"></path>
                                                                    <path d="M8 6V4h8v2"></path>
                                                                    <path d="M19 6l-1 14H6L5 6"></path>
                                                                </svg>
                                                            </button>
                                                        @endif
                                                    </div>
                                                    <select
                                                        class="form-select form-select-sm sme-section-group-select"
                                                        data-group-id="{{ $group['id'] }}"
                                                        data-sid="{{ $section['id'] }}"
                                                        title="{{ trans($smeTranslationBase . '.target_group_label') }}"
                                                        aria-label="{{ trans($smeTranslationBase . '.target_group_label') }}"
                                                    >
                                                        @foreach ($editorGroups as $groupOption)
                                                            <option value="{{ $groupOption['id'] }}" @selected($group['id'] === $groupOption['id'])>
                                                                {{ $groupOption['title'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row g-3 sme-items {{ count($section['items']) ? '' : 'sme-empty' }}" data-group-id="{{ $group['id'] }}" data-sid="{{ $section['id'] }}">
                                                    @foreach ($section['items'] as $item)
                                                        <div class="col-12 col-sm-6 col-lg-4 sme-item-col {{ !empty($item['hidden']) ? 'sme-item-hidden' : '' }}" data-item-id="{{ $item['id'] }}" data-hidden="{{ !empty($item['hidden']) ? 1 : 0 }}">
                                                            <div class="sme-item">
                                                                <div class="sme-item-row">
                                                                    <span class="sme-item-handle" title="{{ trans($smeTranslationBase . '.drag_card') }}"><i class="ti ti-grip-vertical"></i></span>
                                                                    <span class="sme-item-icon">{!! $item['icon_html'] ?: '<i class="ti ti-box"></i>' !!}</span>
                                                                    <div class="sme-item-content">
                                                                        <div class="sme-item-title">{{ $item['title'] }}</div>
                                                                        @if (! empty($item['description']))
                                                                            <div class="sme-item-description">{{ $item['description'] }}</div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="sme-item-actions">
                                                                        <button type="button" class="btn btn-outline-secondary btn-sm sme-item-visibility" data-group-id="{{ $group['id'] }}" data-item-id="{{ $item['id'] }}" data-hidden="{{ !empty($item['hidden']) ? 1 : 0 }}" title="{{ !empty($item['hidden']) ? trans($smeTranslationBase . '.show_menu_item') : trans($smeTranslationBase . '.hide_menu_item') }}" aria-label="{{ !empty($item['hidden']) ? trans($smeTranslationBase . '.show_menu_item') : trans($smeTranslationBase . '.hide_menu_item') }}">
                                                                            @if (!empty($item['hidden']))
                                                                                <svg class="sme-action-icon" viewBox="0 0 24 24" aria-hidden="true">
                                                                                    <path d="M2 12s4-7 10-7c6 0 10 7 10 7s-4 7-10 7c-6 0-10-7-10-7"></path>
                                                                                    <circle cx="12" cy="12" r="3"></circle>
                                                                                    <path d="M3 3l18 18"></path>
                                                                                </svg>
                                                                            @else
                                                                                <svg class="sme-action-icon" viewBox="0 0 24 24" aria-hidden="true">
                                                                                    <path d="M2 12s4-7 10-7c6 0 10 7 10 7s-4 7-10 7c-6 0-10-7-10-7"></path>
                                                                                    <circle cx="12" cy="12" r="3"></circle>
                                                                                </svg>
                                                                            @endif
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </form>

            <form method="POST" action="{{ route('settings-menu-editor.reset') }}" id="sme-reset-form" class="d-none">@csrf</form>
        </div>
    </div>
</div>

<style>
.sme-group-card .card-header{background:#f8fafc}.sme-sections{--sme-empty-drop-text:"{{ trans($smeTranslationBase . '.drop_cards_here') }}";display:flex;flex-direction:column;gap:1rem}.sme-heading-panel{border:1px solid var(--tblr-border-color,#dce1e7);border-radius:.75rem;padding:.85rem;background:linear-gradient(180deg,#ffffff,#fbfcff)}.sme-heading-title{font-weight:600}.sme-heading-hint{margin-top:.45rem;color:#6b7280;font-size:.82rem}.sme-section-handle,.sme-item-handle{cursor:grab;user-select:none;color:#6b7280}.sme-section .card-header{cursor:grab}.sme-section-hidden{opacity:.58}.sme-section-title{margin:0;font-size:1rem;font-weight:600}.sme-section-header-controls{display:flex;align-items:center;justify-content:flex-end;gap:.5rem;margin-left:auto;flex-wrap:nowrap;white-space:nowrap}.sme-section-group-select{min-width:8.75rem;max-width:11rem;order:3;flex:0 0 auto}.sme-item-count{order:1;white-space:nowrap;flex:0 0 auto}.sme-section-actions{order:2;flex:0 0 auto}.sme-items{position:relative;min-height:3.65rem;border:1px dashed transparent;border-radius:.65rem;padding:.5rem;margin-top:.35rem}.sme-items.sme-empty{border-color:#dce1e7;background:#fbfcff}.sme-items.sme-empty:before{content:var(--sme-empty-drop-text);position:absolute;inset:.35rem;display:flex;align-items:center;justify-content:center;color:#6b7280;font-size:.85rem;border:1px dashed #dce1e7;border-radius:.55rem;pointer-events:none;background:rgba(255,255,255,.7)}.sme-item{height:100%;border:1px solid var(--tblr-border-color,#dce1e7);border-radius:.5rem;padding:.75rem;background:#fff;cursor:grab}.sme-item-row{display:flex;align-items:flex-start;gap:.75rem}.sme-item-content{min-width:0;flex:1 1 auto}.sme-item-actions{display:flex;align-items:flex-start;margin-left:auto}.sme-item-col.sme-item-hidden .sme-item{opacity:.55;border-style:dashed;background:#f7f9fc}.sme-item-icon{width:2rem;height:2rem;border-radius:.5rem;background:#f8f9fb;border:1px solid var(--tblr-border-color,#dce1e7);display:inline-flex;align-items:center;justify-content:center;color:#6b7280;flex:0 0 auto}.sme-item-icon svg,.sme-item-icon i{width:1.1rem;height:1.1rem}.sme-item-title{font-weight:600;line-height:1.3}.sme-item-description{color:#6b7280;font-size:.875rem;line-height:1.3;margin-top:.15rem}.sme-ghost{opacity:.35}.sme-section-actions .btn,.sme-item-actions .btn{--bs-btn-padding-y:0;--bs-btn-padding-x:0;width:2rem;height:2rem;display:inline-flex;align-items:center;justify-content:center}.sme-toggle-section[data-hidden="1"],.sme-item-visibility[data-hidden="1"]{color:#9aa5b6}.sme-action-icon{width:1rem;height:1rem;stroke:currentColor;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;fill:none}
</style>
<script src="{{ asset('vendor/core/core/base/libraries/sortable/sortable.min.js') }}"></script>
<script>
(() => {
    const hosts = Array.from(document.querySelectorAll('.sme-sections[data-group-id]'));
    const form = document.getElementById('sme-form');
    const input = document.getElementById('sme-layout');
    const warn = document.getElementById('sme-warn');
    const resetBtn = document.getElementById('sme-reset');
    const resetForm = document.getElementById('sme-reset-form');
    const addBtn = document.getElementById('sme-add');
    const addTitle = document.getElementById('sme-new-title');
    const addGroup = document.getElementById('sme-new-group');

    const i18n = {!! json_encode([
        'show_heading_and_items' => trans($smeTranslationBase . '.show_heading_and_items'),
        'hide_heading_and_items' => trans($smeTranslationBase . '.hide_heading_and_items'),
        'show_menu_item' => trans($smeTranslationBase . '.show_menu_item'),
        'hide_menu_item' => trans($smeTranslationBase . '.hide_menu_item'),
        'item_count' => trans($smeTranslationBase . '.item_count', ['count' => ':count']),
        'drag_heading' => trans($smeTranslationBase . '.drag_heading'),
        'edit_heading' => trans($smeTranslationBase . '.edit_heading'),
        'delete_heading' => trans($smeTranslationBase . '.delete_heading'),
        'heading_title_prompt' => trans($smeTranslationBase . '.heading_title_prompt'),
        'delete_custom_heading_confirm' => trans($smeTranslationBase . '.delete_custom_heading_confirm'),
        'reset_saved_order_confirm' => trans($smeTranslationBase . '.reset_saved_order_confirm'),
        'groups' => [
            'settings' => trans('plugins/settings-menu-editor::settings-menu-editor.groups.settings'),
            'system' => trans('plugins/settings-menu-editor::settings-menu-editor.groups.system'),
        ],
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!};

    if (!hosts.length || !form || !input) {
        return;
    }

    const formatItemCount = (count) => i18n.item_count.replace(':count', String(count));
    const sectionSortables = [];
    const itemSortables = [];

    const escapeHtml = (value) => {
        const node = document.createElement('div');
        node.textContent = String(value ?? '');

        return node.innerHTML;
    };

    const editIcon = '<svg class="sme-action-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 20h9"></path><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"></path></svg>';
    const deleteIcon = '<svg class="sme-action-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h18"></path><path d="M8 6V4h8v2"></path><path d="M19 6l-1 14H6L5 6"></path></svg>';
    const eyeIcon = '<svg class="sme-action-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s4-7 10-7c6 0 10 7 10 7s-4 7-10 7c-6 0-10-7-10-7"></path><circle cx="12" cy="12" r="3"></circle></svg>';
    const eyeOffIcon = '<svg class="sme-action-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s4-7 10-7c6 0 10 7 10 7s-4 7-10 7c-6 0-10-7-10-7"></path><circle cx="12" cy="12" r="3"></circle><path d="M3 3l18 18"></path></svg>';

    const getHost = (groupId) => hosts.find((host) => (host.getAttribute('data-group-id') || '') === groupId) || null;

    const sectionElements = (groupId = null) => {
        if (!groupId) {
            return hosts.flatMap((host) => Array.from(host.querySelectorAll('.sme-section')));
        }

        const host = getHost(groupId);

        if (!host) {
            return [];
        }

        return Array.from(host.querySelectorAll('.sme-section'));
    };

    const findSectionById = (groupId, sectionId) => {
        return sectionElements(groupId).find((section) => (section.getAttribute('data-section-id') || '') === sectionId) || null;
    };

    const getGroupIds = () => hosts.map((host) => (host.getAttribute('data-group-id') || '').trim()).filter(Boolean);
    const sectionGroupOptions = getGroupIds().map((groupId) => ({
        id: groupId,
        title: i18n.groups?.[groupId] || groupId,
    }));

    const renderSectionGroupOptions = (selectedGroupId) => sectionGroupOptions
        .map((groupOption) => `<option value="${escapeHtml(groupOption.id)}"${groupOption.id === selectedGroupId ? ' selected' : ''}>${escapeHtml(groupOption.title)}</option>`)
        .join('');

    const applyGroupIdToSection = (section, targetGroupId) => {
        section.setAttribute('data-group-id', targetGroupId);

        section.querySelectorAll('[data-group-id]').forEach((node) => {
            node.setAttribute('data-group-id', targetGroupId);
        });

        const select = section.querySelector('.sme-section-group-select');

        if (select) {
            select.value = targetGroupId;
        }
    };

    const moveSectionToGroup = (section, targetGroupId) => {
        if (!section || !targetGroupId) {
            return false;
        }

        const targetHost = getHost(targetGroupId);

        if (!targetHost) {
            return false;
        }

        applyGroupIdToSection(section, targetGroupId);
        targetHost.appendChild(section);

        return true;
    };

    const setSectionHiddenState = (section, hidden) => {
        section.setAttribute('data-hidden', hidden ? '1' : '0');
        section.classList.toggle('sme-section-hidden', hidden);

        const button = section.querySelector('.sme-toggle-section');

        if (button) {
            button.setAttribute('data-hidden', hidden ? '1' : '0');
            button.setAttribute('title', hidden ? i18n.show_heading_and_items : i18n.hide_heading_and_items);
            button.setAttribute('aria-label', hidden ? i18n.show_heading_and_items : i18n.hide_heading_and_items);
            button.innerHTML = hidden ? eyeOffIcon : eyeIcon;
        }
    };

    const setItemHiddenState = (itemCol, hidden) => {
        itemCol.setAttribute('data-hidden', hidden ? '1' : '0');
        itemCol.classList.toggle('sme-item-hidden', hidden);

        const button = itemCol.querySelector('.sme-item-visibility');

        if (button) {
            button.setAttribute('data-hidden', hidden ? '1' : '0');
            button.setAttribute('title', hidden ? i18n.show_menu_item : i18n.hide_menu_item);
            button.setAttribute('aria-label', hidden ? i18n.show_menu_item : i18n.hide_menu_item);
            button.innerHTML = hidden ? eyeOffIcon : eyeIcon;
        }
    };

    const updateItemCounts = () => {
        sectionElements().forEach((section) => {
            const count = section.querySelectorAll('.sme-item-col').length;
            const badge = section.querySelector('.sme-item-count');

            if (badge) {
                badge.textContent = formatItemCount(count);
            }
        });
    };

    const updateEmptyStates = () => {
        hosts.forEach((host) => {
            host.querySelectorAll('.sme-items').forEach((row) => {
                row.classList.toggle('sme-empty', row.querySelectorAll('.sme-item-col').length === 0);
            });
        });
    };

    const serialize = () => {
        const payload = { groups: {} };

        hosts.forEach((host) => {
            const groupId = (host.getAttribute('data-group-id') || '').trim();

            if (!groupId) {
                return;
            }

            const sections = [];
            const items = {};
            const sectionMeta = {};
            const itemMeta = {};

            host.querySelectorAll('.sme-section').forEach((section) => {
                const sectionId = (section.getAttribute('data-section-id') || '').trim();

                if (!sectionId) {
                    return;
                }

                sections.push(sectionId);
                items[sectionId] = [];

                section.querySelectorAll('.sme-item-col').forEach((item) => {
                    const itemId = (item.getAttribute('data-item-id') || '').trim();

                    if (itemId) {
                        items[sectionId].push(itemId);
                    }
                });

                const titleElement = section.querySelector('.sme-section-title');
                const title = titleElement ? titleElement.textContent.trim() : sectionId;

                sectionMeta[sectionId] = {
                    title: title || sectionId,
                    is_custom: section.getAttribute('data-is-custom') === '1',
                    hidden: section.getAttribute('data-hidden') === '1',
                };

                section.querySelectorAll('.sme-item-col').forEach((item) => {
                    const itemId = (item.getAttribute('data-item-id') || '').trim();

                    if (!itemId) {
                        return;
                    }

                    itemMeta[itemId] = {
                        hidden: item.getAttribute('data-hidden') === '1',
                    };
                });
            });

            payload.groups[groupId] = {
                sections,
                items,
                section_meta: sectionMeta,
                item_meta: itemMeta,
            };
        });

        input.value = JSON.stringify(payload);
    };

    const refresh = () => {
        updateItemCounts();
        updateEmptyStates();
        serialize();
    };
    const findFallbackSectionId = (groupId, excludingId) => {
        const sections = sectionElements(groupId);
        const baseSection = sections.find((section) => {
            const sid = section.getAttribute('data-section-id');
            const custom = section.getAttribute('data-is-custom') === '1';

            return sid && sid !== excludingId && !custom;
        });

        if (baseSection) {
            return baseSection.getAttribute('data-section-id') || null;
        }

        const anySection = sections.find((section) => (section.getAttribute('data-section-id') || '') !== excludingId);

        return anySection ? anySection.getAttribute('data-section-id') || null : null;
    };

    const createSectionElement = (groupId, sectionId, title, isCustom) => {
        const safeId = escapeHtml(sectionId);
        const safeTitle = escapeHtml(title);
        const safeGroupId = escapeHtml(groupId);
        const section = document.createElement('div');
        section.className = 'card sme-section';
        section.setAttribute('data-group-id', groupId);
        section.setAttribute('data-section-id', sectionId);
        section.setAttribute('data-is-custom', isCustom ? '1' : '0');
        section.setAttribute('data-hidden', '0');

        section.innerHTML = `
            <div class="card-header d-flex align-items-center justify-content-between gap-2">
                <div class="d-flex align-items-center gap-2">
                    <span class="sme-section-handle" title="${escapeHtml(i18n.drag_heading)}"><i class="ti ti-grip-vertical"></i></span>
                    <p class="sme-section-title">${safeTitle}</p>
                </div>
                <div class="sme-section-header-controls">
                    <span class="badge bg-secondary-lt sme-item-count">${escapeHtml(formatItemCount(0))}</span>
                    <div class="sme-section-actions d-flex gap-1">
                        <button type="button" class="btn btn-outline-secondary btn-sm sme-toggle-section" data-group-id="${safeGroupId}" data-sid="${safeId}" data-hidden="0" title="${escapeHtml(i18n.hide_heading_and_items)}" aria-label="${escapeHtml(i18n.hide_heading_and_items)}">
                            ${eyeIcon}
                        </button>
                        ${isCustom ? `
                            <button type="button" class="btn btn-outline-secondary btn-sm sme-edit" data-group-id="${safeGroupId}" data-sid="${safeId}" title="${escapeHtml(i18n.edit_heading)}" aria-label="${escapeHtml(i18n.edit_heading)}">
                                ${editIcon}
                            </button>
                            <button type="button" class="btn btn-outline-danger btn-sm sme-del" data-group-id="${safeGroupId}" data-sid="${safeId}" title="${escapeHtml(i18n.delete_heading)}" aria-label="${escapeHtml(i18n.delete_heading)}">
                                ${deleteIcon}
                            </button>
                        ` : ''}
                    </div>
                    <select class="form-select form-select-sm sme-section-group-select" data-group-id="${safeGroupId}" data-sid="${safeId}" title="{{ trans($smeTranslationBase . '.target_group_label') }}" aria-label="{{ trans($smeTranslationBase . '.target_group_label') }}">
                        ${renderSectionGroupOptions(groupId)}
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-3 sme-items sme-empty" data-group-id="${safeGroupId}" data-sid="${safeId}"></div>
            </div>
        `;

        return section;
    };

    const bindSectionActions = () => {
        document.querySelectorAll('.sme-toggle-section').forEach((button) => {
            const sectionId = (button.getAttribute('data-sid') || '').trim();
            const groupId = (button.getAttribute('data-group-id') || '').trim();
            const section = findSectionById(groupId, sectionId);

            if (section) {
                setSectionHiddenState(section, section.getAttribute('data-hidden') === '1');
            }

            if (button.getAttribute('data-bound') === '1') {
                return;
            }

            button.setAttribute('data-bound', '1');
            button.addEventListener('click', () => {
                const sid = (button.getAttribute('data-sid') || '').trim();
                const gid = (button.getAttribute('data-group-id') || '').trim();
                const targetSection = findSectionById(gid, sid);

                if (!targetSection) {
                    return;
                }

                const nextHidden = targetSection.getAttribute('data-hidden') !== '1';
                setSectionHiddenState(targetSection, nextHidden);
                serialize();
            });
        });

        document.querySelectorAll('.sme-item-visibility').forEach((button) => {
            const itemCol = button.closest('.sme-item-col');

            if (itemCol) {
                setItemHiddenState(itemCol, itemCol.getAttribute('data-hidden') === '1');
            }

            if (button.getAttribute('data-bound') === '1') {
                return;
            }

            button.setAttribute('data-bound', '1');
            button.addEventListener('click', () => {
                const row = button.closest('.sme-item-col');

                if (!row) {
                    return;
                }

                const nextHidden = row.getAttribute('data-hidden') !== '1';
                setItemHiddenState(row, nextHidden);
                serialize();
            });
        });

        document.querySelectorAll('.sme-section-group-select').forEach((select) => {
            if (select.getAttribute('data-bound') === '1') {
                return;
            }

            select.setAttribute('data-bound', '1');
            select.addEventListener('change', () => {
                const section = select.closest('.sme-section');
                const currentGroupId = (section?.getAttribute('data-group-id') || '').trim();
                const targetGroupId = (select.value || '').trim();

                if (!section || !targetGroupId || targetGroupId === currentGroupId) {
                    return;
                }

                const moved = moveSectionToGroup(section, targetGroupId);

                if (!moved) {
                    select.value = currentGroupId;
                    return;
                }

                bindSectionActions();
                mountSortables();
                refresh();
            });
        });

        document.querySelectorAll('.sme-edit').forEach((button) => {
            if (button.getAttribute('data-bound') === '1') {
                return;
            }

            button.setAttribute('data-bound', '1');
            button.addEventListener('click', () => {
                const sectionId = (button.getAttribute('data-sid') || '').trim();
                const groupId = (button.getAttribute('data-group-id') || '').trim();
                const section = findSectionById(groupId, sectionId);

                if (!section || section.getAttribute('data-is-custom') !== '1') {
                    return;
                }

                const currentTitle = section.querySelector('.sme-section-title')?.textContent.trim() || '';
                const nextTitle = window.prompt(i18n.heading_title_prompt, currentTitle);

                if (nextTitle === null) {
                    return;
                }

                const cleaned = nextTitle.trim();

                if (!cleaned) {
                    return;
                }

                const titleElement = section.querySelector('.sme-section-title');

                if (titleElement) {
                    titleElement.textContent = cleaned;
                }

                serialize();
            });
        });

        document.querySelectorAll('.sme-del').forEach((button) => {
            if (button.getAttribute('data-bound') === '1') {
                return;
            }

            button.setAttribute('data-bound', '1');
            button.addEventListener('click', () => {
                const sectionId = (button.getAttribute('data-sid') || '').trim();
                const groupId = (button.getAttribute('data-group-id') || '').trim();
                const section = findSectionById(groupId, sectionId);

                if (!section || section.getAttribute('data-is-custom') !== '1') {
                    return;
                }

                if (!window.confirm(i18n.delete_custom_heading_confirm)) {
                    return;
                }

                const fallbackId = findFallbackSectionId(groupId, sectionId);
                const sourceRow = section.querySelector('.sme-items');
                const targetRow = fallbackId ? findSectionById(groupId, fallbackId)?.querySelector('.sme-items') : null;

                if (sourceRow && targetRow) {
                    Array.from(sourceRow.querySelectorAll('.sme-item-col')).forEach((item) => targetRow.appendChild(item));
                }

                section.remove();
                refresh();
            });
        });
    };

    const destroySortables = () => {
        sectionSortables.splice(0).forEach((sortable) => {
            if (sortable && typeof sortable.destroy === 'function') {
                sortable.destroy();
            }
        });

        itemSortables.splice(0).forEach((sortable) => {
            if (sortable && typeof sortable.destroy === 'function') {
                sortable.destroy();
            }
        });
    };

    const mountSortables = () => {
        destroySortables();

        if (typeof window.Sortable === 'undefined') {
            if (warn) {
                warn.classList.remove('d-none');
            }

            return;
        }

        if (warn) {
            warn.classList.add('d-none');
        }

        hosts.forEach((host) => {
            sectionSortables.push(window.Sortable.create(host, {
                animation: 180,
                draggable: '.sme-section',
                handle: '.card-header',
                filter: '.sme-section-actions,.sme-section-actions *,.sme-section-group-select,.sme-section-group-select *',
                preventOnFilter: false,
                ghostClass: 'sme-ghost',
                onEnd: refresh,
            }));

            host.querySelectorAll('.sme-items').forEach((row) => {
                itemSortables.push(window.Sortable.create(row, {
                    animation: 180,
                    group: {
                        name: 'sme-items-global',
                        pull: true,
                        put: true,
                    },
                    draggable: '.sme-item-col',
                    handle: '.sme-item',
                    filter: '.sme-item-actions,.sme-item-actions *',
                    preventOnFilter: false,
                    ghostClass: 'sme-ghost',
                    onAdd: refresh,
                    onUpdate: refresh,
                    onRemove: refresh,
                }));
            });
        });
    };

    const addHeading = () => {
        const title = addTitle ? addTitle.value.trim() : '';

        if (!title || !addTitle) {
            if (addTitle) {
                addTitle.focus();
            }

            return;
        }

        const groupId = (addGroup?.value || 'settings').trim() || 'settings';
        const host = getHost(groupId) || hosts[0];

        if (!host) {
            return;
        }

        const hostGroupId = (host.getAttribute('data-group-id') || groupId).trim();
        const sectionId = `sme-custom-${Date.now()}-${Math.floor(Math.random() * 100000)}`;

        host.appendChild(createSectionElement(hostGroupId, sectionId, title, true));
        addTitle.value = '';

        bindSectionActions();
        mountSortables();
        refresh();
    };

    form.addEventListener('submit', () => {
        serialize();
    });

    if (resetBtn && resetForm) {
        resetBtn.addEventListener('click', () => {
            if (window.confirm(i18n.reset_saved_order_confirm)) {
                resetForm.submit();
            }
        });
    }

    if (addBtn) {
        addBtn.addEventListener('click', addHeading);
    }

    if (addTitle) {
        addTitle.addEventListener('keydown', (event) => {
            if (event.key === 'Enter') {
                event.preventDefault();
                addHeading();
            }
        });
    }

    bindSectionActions();
    mountSortables();
    refresh();
})();
</script>
@endsection
