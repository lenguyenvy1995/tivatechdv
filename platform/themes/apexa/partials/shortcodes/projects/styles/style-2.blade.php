<section class="project__area shortcode-projects shortcode-projects-style-2" @style($variablesStyle)>
    <div class="container p-0">
        @if ($title = $shortcode->title)
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-title text-center mb-50 tg-heading-subheading animation-style3">
                        @if ($subtitle = $shortcode->subtitle)
                            <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                        @endif
                        <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                    </div>
                </div>
            </div>
        @endif
        <div class="swiper-container project-active-two">
            <div class="swiper-wrapper">
                @foreach ($projects as $project)
                    <div class="swiper-slide">
                        <div class="project__item-four">
                            <div class="project__thumb-four">
                                <a href="{{ $project->url }}">
                                    {{ RvMedia::image($project->image, $project->name, 'medium-square') }}
                                </a>
                            </div>
                            <div class="project__content-four">
                                <div class="left-content">
                                    <h3 class="title">
                                        <a class="truncate-2-custom" title="{{ $project->name }}"
                                            href="{{ $project->url }}">{{ $project->name }}</a>
                                    </h3>

                                    @if ($category = $project->getMetaData('category', true))
                                        <span>{!! BaseHelper::clean($category) !!}</span>
                                    @endif
                                </div>
                                <div class="right-btn">
                                    <a href="{{ $project->url }}" class="right-arrow"><i
                                            class="flaticon-arrow-button"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
