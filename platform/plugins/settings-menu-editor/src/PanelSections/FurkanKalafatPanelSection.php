<?php

namespace FurkanKalafat\SettingsMenuEditor\PanelSections;

use Botble\Base\PanelSections\PanelSection;

class FurkanKalafatPanelSection extends PanelSection
{
    public function setup(): void
    {
        $this
            ->setId('settings.furkan-kalafat')
            ->setTitle('Furkan Kalafat')
            ->withPriority(99997)
            ->withPermissions(['settings.index']);
    }
}
