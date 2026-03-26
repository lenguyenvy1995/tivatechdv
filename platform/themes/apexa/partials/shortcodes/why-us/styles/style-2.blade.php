@php
    $bgColor = $shortcode->background_color;
    $bgImage = $shortcode->background_image ? RvMedia::getImageUrl($shortcode->background_image) : null;

    $variablesStyle = [
        "--background-color: $bgColor" => $bgColor,
        "--background-image: url($bgImage)" => $bgImage,
    ];
@endphp
<section class="shortcode-why-us  shortcode-why-us-style-2 shortcode-tivatech py-4" @style($variablesStyle)>
    <div class="container-fluid">
        @if ($title = $shortcode->title)
            <div class="row">

                <div class="col-12">
                    <h2 class="text-capitalize text-center"> {!! BaseHelper::clean($title) !!}
                    </h2>
                </div>
                @if ($description = $shortcode->description)
                    <div class="col-12">
                        <p class="text-center"> {!! BaseHelper::clean($description) !!}</p>
                    </div>
                @endif

            </div>
        @endif
        <div class="row row-cols-xxl-5 row-cols-lg-4 row-cols-md-3 row-cols-1 justify-content-center g-2">

            @foreach ($tabs as $item)
                @continue(!($title = Arr::get($item, 'title')))

                <div class="col my-auto py-2">
                    <div class="card">
                        <div class="card-icon">
                            @if ($iconImage = Arr::get($item, 'icon_image'))
                                {{ RvMedia::image($iconImage, 'icon') }}
                            @elseif($icon = Arr::get($item, 'icon'))
                                <x-core::icon :name="$icon" />
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{!! BaseHelper::clean($title) !!}</h5>

                            @if ($description = Arr::get($item, 'description'))
                                <p class="card-text text-justify truncate-3-custom  mb-0">{!! BaseHelper::clean($description) !!}</p>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
