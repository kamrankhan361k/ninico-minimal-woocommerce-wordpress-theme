<?php

/**
 * ninico_scripts description
 * @return [type] [description]
 */
function ninico_scripts() {

    /**
     * all css files
    */

    wp_enqueue_style( 'ninico-fonts', ninico_fonts_url(), array(), time() );
    if( is_rtl() ){
        wp_enqueue_style( 'bootstrap-rtl', NINICO_THEME_CSS_DIR.'bootstrap-rtl.css', array() );
    }else{
        wp_enqueue_style( 'bootstrap', NINICO_THEME_CSS_DIR.'bootstrap.min.css', array() );
    }

    wp_enqueue_style( 'animate', NINICO_THEME_CSS_DIR . 'animate.css', [] );
    wp_enqueue_style( 'swiper-bundle', NINICO_THEME_CSS_DIR . 'swiper-bundle.css', [] );
    wp_enqueue_style( 'slick', NINICO_THEME_CSS_DIR . 'slick.css', [] );
    wp_enqueue_style( 'nice-select', NINICO_THEME_CSS_DIR . 'nice-select.css', [] );
    wp_enqueue_style( 'font-awesome-pro', NINICO_THEME_CSS_DIR . 'font-awesome-pro.css', [] );
    wp_enqueue_style( 'magnific-popup', NINICO_THEME_CSS_DIR . 'magnific-popup.css', [] );
    wp_enqueue_style( 'meanmenu', NINICO_THEME_CSS_DIR . 'meanmenu.css', [] );
    wp_enqueue_style( 'spacing', NINICO_THEME_CSS_DIR . 'spacing.css', [] );
    wp_enqueue_style( 'ninico-core', NINICO_THEME_CSS_DIR . 'ninico-core.css', [], time() );
    wp_enqueue_style( 'ninico-unit', NINICO_THEME_CSS_DIR . 'ninico-unit.css', [], time() );
    wp_enqueue_style( 'ninico-custom', NINICO_THEME_CSS_DIR . 'ninico-custom.css', [] );
    wp_enqueue_style( 'ninico-style', get_stylesheet_uri() );

    // all js
    wp_enqueue_script( 'waypoints', NINICO_THEME_JS_DIR . 'waypoints.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'bootstrap-bundle', NINICO_THEME_JS_DIR . 'bootstrap.bundle.min.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'swiper-bundle', NINICO_THEME_JS_DIR . 'swiper-bundle.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'slick', NINICO_THEME_JS_DIR . 'slick.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'magnific-popup', NINICO_THEME_JS_DIR . 'magnific-popup.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'nice-select', NINICO_THEME_JS_DIR . 'nice-select.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'counterup', NINICO_THEME_JS_DIR . 'counterup.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'wow', NINICO_THEME_JS_DIR . 'wow.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'isotope-pkgd', NINICO_THEME_JS_DIR . 'isotope-pkgd.js', [ 'imagesloaded' ], false, true );
    wp_enqueue_script( 'countdown', NINICO_THEME_JS_DIR . 'countdown.js', [ 'jquery' ], '', true );
    wp_enqueue_script( 'meanmenu', NINICO_THEME_JS_DIR . 'meanmenu.js', [ 'jquery' ], false, true );
    wp_enqueue_script( 'knob', NINICO_THEME_JS_DIR . 'jquery.knob.js', [ 'jquery' ], false, true );

    wp_enqueue_script( 'ninico-main', NINICO_THEME_JS_DIR . 'main.js', [ 'jquery' ], time(), true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'ninico_scripts' );

/*
Register Fonts
 */
function ninico_fonts_url() {
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'ninico' ) ) {
        $font_url = 'https://fonts.googleapis.com/css2?'. urlencode('family=Jost:wght@300;400;500;600;700&display=swap');
    }
    return $font_url;
}
