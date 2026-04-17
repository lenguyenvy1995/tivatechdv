@if ($content = $shortcode->content_text)
    <section class="content-quote py-4">
        <div class="container">
            <div class="row">
                <blockquote
                    class="shortcode-content-quote mb-0"
                    @style(["--background-color: $shortcode->background_color" => $shortcode->background_color])
                >
                    <div class="content-quote-inner">
                        {!! BaseHelper::clean($content) !!}
                    </div>
                </blockquote>
            </div>
        </div>
    </section>
@endif
