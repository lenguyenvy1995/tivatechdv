@php
    $bgColor = $shortcode->background_color;
    $bgImage = $shortcode->background_image ? RvMedia::getImageUrl($shortcode->background_image) : null;

    $variablesStyle = [
        "--background-color: $bgColor" => $bgColor,
        "--background-image: url($bgImage)" => $bgImage,
    ];
    // dd($tabs);
@endphp
<section class="shortcode-categori-page shortcode-categori-page-style-1 shortcode-tivatech py-4" @style($variablesStyle)>
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
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 g-4">
            @foreach ($tabs as $item)
                @continue(!($title = Arr::get($item, 'title')))
                <div class="col">
                <div class="service-categories-item shine-animate-item">
                    <div class="service-categories-icon">
                        <a title="{!! BaseHelper::clean($title) !!}"
                           class="shine-animate"
                           href="{{ Arr::get($item, 'custom_url') }}">
            
                            @if ($iconImage = Arr::get($item, 'icon_image'))
                                {{ RvMedia::image($iconImage, 'icon') }}
                            @elseif($icon = Arr::get($item, 'icon'))
                                <x-core::icon :name="$icon" />
                            @endif
                        </a>
                    </div>
                    <div class="service-categories-content">
                        <h3 class="title mb-0">
                            <a class="truncate-1-custom"
                               title="{!! BaseHelper::clean($title) !!}"
                               href="{{ Arr::get($item, 'custom_url') }}">
                                {!! BaseHelper::clean($title) !!}
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </div>
</section>
