<?php

namespace FurkanKalafat\SettingsMenuEditor;

use Botble\PluginManagement\Abstracts\PluginOperationAbstract;

class Plugin extends PluginOperationAbstract
{
    public static function remove(): void
    {
        self::cleanup();
    }

    public static function delete(): void
    {
        self::cleanup();
    }

    public static function uninstall(): void
    {
        self::cleanup();
    }

    public function deleted(): void
    {
        self::cleanup();
    }

    protected static function cleanup(): void
    {
        $key = 'settings_menu_editor_layout';

        try {
            if (function_exists('setting')) {
                $repo = setting();

                if (is_object($repo)) {
                    foreach (['delete', 'remove', 'forget'] as $method) {
                        if (method_exists($repo, $method)) {
                            $repo->{$method}($key);
                        }
                    }

                    if (method_exists($repo, 'set')) {
                        $repo->set($key, '');
                    }

                    if (method_exists($repo, 'save')) {
                        $repo->save();
                    }
                }
            }
        } catch (\Throwable) {
            // ignore
        }

        try {
            if (class_exists('Botble\\Setting\\Models\\Setting')) {
                \Botble\Setting\Models\Setting::query()->where('key', $key)->delete();
            }
        } catch (\Throwable) {
            // ignore
        }

        try {
            \Illuminate\Support\Facades\Cache::forget($key);
        } catch (\Throwable) {
            // ignore
        }
    }
}
