@php
    $style = $shortcode->style;

    // Validate style nằm trong range cho phép, fallback về 'style-1' nếu không hợp lệ
    $allowedStyles = collect(range(1, 2))->map(fn($i) => "style-$i")->toArray();
    $style = in_array($style, $allowedStyles) ? $style : 'style-1';

    // Lấy màu và ảnh nền
    $bgColor = $shortcode->background_color;
    $bgImage = $shortcode->background_image ? RvMedia::getImageUrl($shortcode->background_image) : null;

    // Gán vào biến CSS nếu có giá trị
    $variablesStyle = [];
    if ($bgColor) {
        $variablesStyle['--background-color'] = $bgColor;
    }
    if ($bgImage) {
        $variablesStyle['--background-image'] = "url($bgImage)";
    }
@endphp

{!! Theme::partial("shortcodes.categori-page.styles.$style", compact('shortcode', 'tabs', 'variablesStyle')) !!}