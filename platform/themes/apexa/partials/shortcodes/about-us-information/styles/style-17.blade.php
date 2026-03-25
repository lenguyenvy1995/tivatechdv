@php
$layoutPosition = $shortcode->layout_position ?? 'left';
$mobilePosition = $shortcode->mobile_position ?? 'top';
$imageDesktopOrder = $layoutPosition === 'right' ? 'order-lg-2' : 'order-lg-1';
$contentDesktopOrder = $layoutPosition === 'right' ? 'order-lg-1' : 'order-lg-2';

$imageMobileOrder = $mobilePosition === 'bottom' ? 'order-1' : 'order-0';
$contentMobileOrder = $mobilePosition === 'bottom' ? 'order-0' : 'order-1';
@endphp
<section
    class="shortcode-about-us-information shortcode-about-us-information-style-17 py-4"
    @style($variablesStyle)>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            {{-- IMAGE COLUMN --}}
            <div class="col-lg-6 col-md-9 {{ $imageDesktopOrder }} {{ $imageMobileOrder }}">
                <div class="about__img-wrap-seven">
                    @if ($image = $shortcode->image)
                        {{ RvMedia::image($image, 'about-us') }}
                    @endif
                    @if ($image1 = $shortcode->image_1)
                        <div class="about__award-box about__award-box-two2">
                            {{ RvMedia::image($image1, 'about-us') }}
                        </div>
                    @endif
                </div>
            </div>
            {{-- CONTENT COLUMN --}}
            <div class="col-lg-6 {{ $contentDesktopOrder }} {{ $contentMobileOrder }}">
                <div class="about__content-seven">
                    <div class="section-title mb-25">
                        @if ($subtitle = $shortcode->subtitle)
                            <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                        @endif
        
                        @if ($title = $shortcode->title)
                            <h2 class="title wow">{!! BaseHelper::clean($title) !!}</h2>
                        @endif
                    </div>
                    @if ($description = $shortcode->description)
                        <p class="text-justify">{!! BaseHelper::clean($description) !!}</p>
                    @endif
                    @if (count($tabs))
                        <div class="about__list-box">
                            <ul class="list-wrap">
                                @foreach ($tabs as $tab)
                                    @continue(!($title = Arr::get($tab, 'title')))
                                    <li>
                                        <i class="flaticon-arrow-button"></i>
                                        {!! BaseHelper::clean($title) !!}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (($buttonLabel = $shortcode->button_label) && ($buttonUrl = $shortcode->button_url))
                        <a href="{{ $buttonUrl }}" class="btn btn-two">
                            {!! BaseHelper::clean($buttonLabel) !!}
                        </a>
                    @endif
                </div>
            </div>
        
        </div>
    </div>
</section>
