@php
    $backgroundColor = theme_option('footer_background_color', '#FFFFFF');
    $textColor = theme_option('footer_text_color', theme_option('text_color', '#3E4073'));
    $headingColor = theme_option('footer_heading_color', theme_option('primary_color', '#14176C'));
    $backgroundImage = theme_option('footer_background_image');
    $borderColor = theme_option('footer_border_color', '#CFDDE2');
    $bottomBackgroundColor = theme_option('footer_bottom_background_color', '#ECF6FA');
    $backgroundImage = $backgroundImage ? RvMedia::getImageUrl($backgroundImage) : null;
@endphp
@php
$footerSidebar = dynamic_sidebar('footer_sidebar');
@endphp

{!! dynamic_sidebar('top_footer_sidebar') !!}

<footer id="footer" class="pb-5" @style([
    "--footer-background-color: $backgroundColor",
    "--footer-heading-color: $headingColor",
    "--footer-text-color: $textColor",
    "--footer-border-color: $borderColor",
    "--footer-bottom-background-color: $bottomBackgroundColor",
    "--footer-background-image: url($backgroundImage)" => $backgroundImage,
])>
    <div class="footer-area">
    
    
    @if (!empty(trim($footerSidebar)))
        <div class="footer-top py-5">
            <div class="container">
                <div class="row wrapper-footer-widgets">
                    {!! $footerSidebar !!}
                </div>
            </div>
        </div>
    @endif
  
        <div id="footer-copyright" class="footer-copyright py-4 bg-dark">
            <div class="container">
                <div class="d-flex gap-3 justify-content-center align-items-center text-center bottom-footer-wrapper">
                    <div class="copy">
                        <p class="m-0 text-white"> Copyright © {{ date('Y') }} <span class="text-uppercase text-white">{!! theme_option('copyright') !!} </span> </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
