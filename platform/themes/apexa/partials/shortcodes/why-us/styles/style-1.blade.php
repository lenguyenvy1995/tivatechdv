@php
    $bgColor = $shortcode->background_color;
    $bgImage = $shortcode->background_image ? RvMedia::getImageUrl($shortcode->background_image) : null;

    $variablesStyle = [
        "--background-color: $bgColor" => $bgColor,
        "--background-image: url($bgImage)" => $bgImage,
    ];
@endphp
<section class="shortcode-why-us  shortcode-why-us-style-1 shortcode-tivatech py-4" @style($variablesStyle)>
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

            @foreach ($tabs as $item)
                @continue(!($title = Arr::get($item, 'title')))

                <div class="col-6 col-md-3">
                    <div class="card">
                        <div class="card-icon">
                            @if ($iconImage = Arr::get($item, 'icon_image'))
                                {{ RvMedia::image($iconImage, 'icon') }}
                            @elseif($icon = Arr::get($item, 'icon'))
                                <x-core::icon :name="$icon" />
                            @endif
                        </div>
                        <div class="card-body">
                            <h3 class="card-title text-center">{!! BaseHelper::clean($title) !!}</h3>

                            @if ($description = Arr::get($item, 'description'))
                                <p class="card-text text-justify truncate-4-custom  mb-0">{!! BaseHelper::clean($description) !!}</p>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
