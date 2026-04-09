@php
    $bgColor = $shortcode->background_color;
    $bgImage = $shortcode->background_image ? RvMedia::getImageUrl($shortcode->background_image) : null;

    $variablesStyle = [
        "--background-color: $bgColor" => $bgColor,
        "--background-image: url($bgImage)" => $bgImage,
    ];
@endphp
<section class="shortcode-categori-page  shortcode-categori-page-style-2 shortcode-tivatech py-4" @style($variablesStyle)>
    <div class="container-fluid">
        @if ($title = $shortcode->title)
            <div class="row justify-content-center">

                <div class="col-xl-8">
                    <div class="section-title mb-35 tg-heading-subheading animation-style3">


                        @if ($title = $shortcode->title)
                            <h2 class="title tg-element-title  text-center">{!! BaseHelper::clean($title) !!}</h2>
                        @endif
                        @if ($description = $shortcode->description)
                            <span class="sub-title text-center">{!! BaseHelper::clean($description) !!}</span>
                        @endif
                    </div>
                </div>

            </div>
        @endif
        <div class="row row-cols-xxl-5 row-cols-lg-4 row-cols-md-3 row-cols-1 justify-content-center g-2">
            @foreach ($tabs as $item)
                @continue(!($title = Arr::get($item, 'title')))
                <div class="col">
                    <div class="service-categories-item shine-animate-item">
                        <a title="{!! BaseHelper::clean($title) !!}"
                            href="{{ Arr::get($item, 'custom_url') }}">
                            <div class="service-categories-icon shine-animate">

                                @if ($iconImage = Arr::get($item, 'icon_image'))
                                    {{ RvMedia::image($iconImage, 'icon') }}
                                @elseif($icon = Arr::get($item, 'icon'))
                                    <x-core::icon :name="$icon" />
                                @endif

                            </div>
                            <div class="service-categories-content">
                                <h3 class="title mb-0 truncate-1-custom">
                                    {!! BaseHelper::clean($title) !!}
                                </h3>

                                @if ($description = Arr::get($item, 'description'))
                                    <p class="description text-justify truncate-3-custom">
                                        {!! BaseHelper::clean($description) !!}
                                    </p>
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
