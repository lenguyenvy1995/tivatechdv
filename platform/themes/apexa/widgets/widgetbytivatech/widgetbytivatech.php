<?php

use Botble\Widget\AbstractWidget;
use Illuminate\Support\Collection;

class WidgetbytivatechWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Widget By Tivatech'),
            'ifame_url' => __('Iframe URL'),
            'description' => __('Widget description'),
        ]);
    }

    protected function data(): array|Collection
    {
        return [];
    }
}
