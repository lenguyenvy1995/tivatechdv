@php
    $isFloatingBlockEnabled = $shortcode->floating_block_title || $shortcode->floating_block_description;
@endphp

<section class="faqs__area-six shortcode-faq">
    <div class="circle" data-parallax='{"x" : 100 , "y" : 100 }'></div>
    <div class="container">
        <div class="row align-items-center">

            <div @class([
                'mb-30',
                'col-lg-7' => $isFloatingBlockEnabled,
                'col-lg-12' => !$isFloatingBlockEnabled,
            ])>
                <div class="box-faq-right">
                    <div class="section-title mb-3 tg-heading-subheading animation-style3">
                        @if ($title = $shortcode->title)
                            <h2 class="title tg-element-title mb-20">{!! BaseHelper::clean($title) !!}</h2>
                        @endif
                    </div>

                    @if ($description = $shortcode->description)
                        <p class="tg-element-title mb-40">{!! BaseHelper::clean($description) !!}</p>
                    @endif

                    <div class="block-faqs">
                        <div class="accordion wow fadeInUp" id="accordionFAQ">
                            @foreach ($faqs as $faq)
                                @php
                                    $id = 'faq-item-' . $faq->getKey();
                                    $headingId = 'heading-faq-item-' . $faq->getKey();
                                @endphp
                                <div class="accordion-item">
                                    <h5 class="accordion-header" id="{{ $headingId }}">
                                        <button class="accordion-button text-heading-5 collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#{{ $id }}"
                                            aria-expanded="true" aria-controls="{{ $id }}">
                                            {!! BaseHelper::clean($faq->question) !!}
                                        </button>
                                    </h5>
                                    <div class="accordion-collapse collapse" id="{{ $id }}"
                                        aria-labelledby="{{ $headingId }}" data-bs-parent="#{{ $headingId }}">
                                        <div class="accordion-body">
                                            {!! BaseHelper::clean($faq->answer) !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @if ($image = $shortcode->image)
                <div class="col-lg-5 mb-30">
                    <div class="box-need-help">
                        {{ RvMedia::image($image, 'w-100 image ') }}
                    </div>
            @endif
        </div>
    </div>
    </div>
</section>
