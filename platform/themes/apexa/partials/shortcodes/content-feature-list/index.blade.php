@php
    $items = Shortcode::fields()->getTabsData(['title', 'description', 'icon', 'icon_image'], $shortcode);
    $bgColor = $shortcode->background_color;
    $bgImage = $shortcode->background_image ? RvMedia::getImageUrl($shortcode->background_image) : null;
    $variablesStyle = [
        "--background-color: $bgColor" => $bgColor,
        "--background-image: url($bgImage)" => $bgImage,
    ];

@endphp
@if (count($items))
    <div class="services__details-list shortcode-content-feature-list shortcode-tivatech m-0 py-4" @style($variablesStyle)>
        <div class="container">
            @if ($title = $shortcode->title)
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="section-title mb-35 tg-heading-subheading animation-style3">
                            @if ($description = $shortcode->description)
                                <span class="sub-title text-center">{!! BaseHelper::clean($description) !!}</span>
                            @endif

                            @if ($title = $shortcode->title)
                                <h2 class="title tg-element-title  text-center">{!! BaseHelper::clean($title) !!}</h2>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                @foreach ($items as $item)
                    @continue(!($title = Arr::get($item, 'title')))
                    <div class="col-md-6">
                        <div class="services__details-list-box feature-item">
                            <div class="icon feature-icon">
                                @if ($iconImage = Arr::get($item, 'icon_image'))
                                    {{ RvMedia::image($iconImage, $title, 'thumb') }}
                                @elseif($icon = Arr::get($item, 'icon'))
                                    <x-core::icon :name="$icon" />
                                @endif
                            </div>
                            <div class="content">
                                <h4 class="title">{!! BaseHelper::clean($title) !!}</h4>
                                @if ($description = Arr::get($item, 'description'))
                                    <p class="truncate-2-custom">{!! BaseHelper::clean($description) !!}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
