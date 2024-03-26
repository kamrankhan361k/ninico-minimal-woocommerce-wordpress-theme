<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ninico
 */

/** 
 *
 * ninico header
 */

function ninico_check_header() {
    $ninico_header_style = function_exists( 'get_field' ) ? get_field( 'header_style' ) : NULL;
    $ninico_default_header_style = get_theme_mod( 'choose_default_header', 'header-style-1' );

    if ( $ninico_header_style == 'header-style-1' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-1' );
    } 
    elseif ( $ninico_header_style == 'header-style-2' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-2' );
    } 
    elseif ( $ninico_header_style == 'header-style-3' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-3' );
    } 
    elseif ( $ninico_header_style == 'header-style-4' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-4' );
    } 
    elseif ( $ninico_header_style == 'header-style-5' && empty($_GET['s']) ) {
        get_template_part( 'template-parts/header/header-5' );
    } 
    else {
        /** default header style **/
        if ( $ninico_default_header_style == 'header-style-2' ) {
            get_template_part( 'template-parts/header/header-2' );
        } 
        elseif ( $ninico_default_header_style == 'header-style-3' ) {
            get_template_part( 'template-parts/header/header-3' );
        }
        elseif ( $ninico_default_header_style == 'header-style-4' ) {
            get_template_part( 'template-parts/header/header-4' );
        }
        elseif ( $ninico_default_header_style == 'header-style-5' ) {
            get_template_part( 'template-parts/header/header-5' );
        }
        else {
            get_template_part( 'template-parts/header/header-1' );
        }
    }

}
add_action( 'ninico_header_style', 'ninico_check_header', 10 );


/**
 * [ninico_header_lang description]
 * @return [type] [description]
 */
function ninico_header_lang_defualt() {
    $ninico_header_lang = get_theme_mod( 'ninico_header_lang', false );
    if ( $ninico_header_lang ): ?>

    <ul>
        <li>
            <a href="#">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/lang-flag.png" alt="flag"><?php print esc_html__( 'English', 'ninico' );?>
                <span><i class="fal fa-angle-down"></i></span>
            </a>
            <?php do_action( 'ninico_language' );?>
        </li>
    </ul>

    <?php endif;?>
<?php
}


/**
 * [ninico_header_lang_2 description]
 * @return [type] [description]
 */
function ninico_header_lang_defualt_2() {
    $ninico_header_lang = get_theme_mod( 'ninico_header_lang', false );
    if ( $ninico_header_lang ): ?>

    <ul>
        <li>
            <a href="#">
                <?php print esc_html__( 'English', 'ninico' );?>
                <span><i class="fal fa-angle-down"></i></span>
            </a>
            <?php do_action( 'ninico_language' );?>
        </li>
    </ul>

    <?php endif;?>
<?php
}


/**
 * [ninico_language_list description]
 * @return [type] [description]
 */
function _ninico_language( $mar ) {
    return $mar;
}
function ninico_language_list() {

    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    if ( !empty( $languages ) ) {
        $mar = '<ul class="header-meta__lang-submenu">';
        foreach ( $languages as $lan ) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<ul class="header-meta__lang-submenu">';
        $mar .= '<li><a href="#">' . esc_html__( 'Russian', 'ninico' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'Spanish', 'ninico' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'French', 'ninico' ) . '</a></li>';
        $mar .= ' </ul>';
    }
    print _ninico_language( $mar );
}
add_action( 'ninico_language', 'ninico_language_list' );



/**
 * [ninico_language_list description]
 * @return [type] [description]
 */
function _ninico_footer_language( $mar ) {
    return $mar;
}
function ninico_footer_language_list() {
    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    if ( !empty( $languages ) ) {
        $mar = '<ul class="footer__lang-list tp-lang-list-2">';
        foreach ( $languages as $lan ) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['translated_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<ul class="footer__lang-list tp-lang-list-2">';
        $mar .= '<li><a href="#">' . esc_html__( 'English', 'ninico' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'Spanish', 'ninico' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'French', 'ninico' ) . '</a></li>';
        $mar .= ' </ul>';
    }
    print _ninico_footer_language( $mar );
}
add_action( 'ninico_footer_language', 'ninico_footer_language_list' );



// header logo
function ninico_header_logo() { ?>
      <?php
        $ninico_logo_on = function_exists( 'get_field' ) ? get_field( 'is_enable_sec_logo' ) : NULL;
        $ninico_logo = get_template_directory_uri() . '/assets/img/logo/logo.png';
        $ninico_logo_black = get_template_directory_uri() . '/assets/img/logo/logo-white.png';

        $ninico_site_logo = get_theme_mod( 'logo', $ninico_logo );
        $ninico_secondary_logo = get_theme_mod( 'seconday_logo', $ninico_logo_black );
      ?>

      <?php if ( !empty( $ninico_logo_on ) ) : ?>
         <a class="secondary-logo" href="<?php print esc_url( home_url( '/' ) );?>">
             <img src="<?php print esc_url( $ninico_secondary_logo );?>" alt="<?php print esc_attr__( 'logo', 'ninico' );?>" />
         </a>
      <?php else : ?>
         <a class="standard-logo" href="<?php print esc_url( home_url( '/' ) );?>">
             <img src="<?php print esc_url( $ninico_site_logo );?>" alt="<?php print esc_attr__( 'logo', 'ninico' );?>" />
         </a>
      <?php endif; ?>
   <?php
}

// header logo
function ninico_header_secondary_logo() {?>
    <?php
        $ninico_logo_black = get_template_directory_uri() . '/assets/img/logo/logo-black.png';
        $ninico_secondary_logo = get_theme_mod( 'seconday_logo', $ninico_logo_black );
    ?>
      <a class="sticky-logo" href="<?php print esc_url( home_url( '/' ) );?>">
          <img src="<?php print esc_url( $ninico_secondary_logo );?>" alt="<?php print esc_attr__( 'logo', 'ninico' );?>" />
      </a>
    <?php
}

// header logo
function ninico_header_sticky_logo() {?>
    <?php
        $ninico_logo = get_template_directory_uri() . '/assets/img/logo/logo-black-solid.svg';
        $ninico_logo_black = get_template_directory_uri() . '/assets/img/logo/logo.svg';
        $ninico_secondary_logo = get_theme_mod( 'seconday_logo', $ninico_logo_black );
    ?>
        <a href="<?php print esc_url( home_url( '/' ) );?>">
            <img class="logo-dark" src="<?php print esc_url( $ninico_logo );?>" alt="logo">
            <img class="logo-light" src="<?php print esc_url( $ninico_secondary_logo );?>" alt="logo">
        </a>
    <?php
}

function ninico_mobile_logo() {
    // side info
    $ninico_mobile_logo_hide = get_theme_mod( 'ninico_mobile_logo_hide', false );

    $ninico_site_logo = get_theme_mod( 'logo', get_template_directory_uri() . '/assets/img/logo/logo.png' );

    ?>

    <?php if ( !empty( $ninico_mobile_logo_hide ) ): ?>
    <div class="side__logo mb-25">
        <a class="sideinfo-logo" href="<?php print esc_url( home_url( '/' ) );?>">
            <img src="<?php print esc_url( $ninico_site_logo );?>" alt="<?php print esc_attr__( 'logo', 'ninico' );?>" />
        </a>
    </div>
    <?php endif;?>



<?php }

/**
 * [ninico_header_social_profiles description]
 * @return [type] [description]
 */
function ninico_header_social_profiles() {
    $ninico_topbar_fb_url = get_theme_mod( 'ninico_topbar_fb_url', __( '#', 'ninico' ) );
    $ninico_topbar_twitter_url = get_theme_mod( 'ninico_topbar_twitter_url', __( '#', 'ninico' ) );
    $ninico_topbar_behance_url = get_theme_mod( 'ninico_topbar_behance_url', __( '#', 'ninico' ) );
    $ninico_topbar_instagram_url = get_theme_mod( 'ninico_topbar_instagram_url', __( '#', 'ninico' ) );
    $ninico_topbar_youtube_url = get_theme_mod( 'ninico_topbar_youtube_url', __( '#', 'ninico' ) );
    $ninico_topbar_linkedin_url = get_theme_mod( 'ninico_topbar_linkedin_url', __( '#', 'ninico' ) );

    $ninico_social_switch = get_theme_mod( 'ninico_social_switch', false );
    ?>

        <?php if(!empty($ninico_social_switch)) : ?>
        <div class="menu-top-social">
            
            <?php if ( !empty( $ninico_topbar_fb_url ) ): ?>
                <a href="<?php print esc_url( $ninico_topbar_fb_url );?>"><i class="fab fa-facebook-f"></i></a>
            <?php endif;?>

            <?php if ( !empty( $ninico_topbar_twitter_url ) ): ?>
                <a href="<?php print esc_url( $ninico_topbar_twitter_url );?>"><i class="fab fa-twitter"></i></a>
            <?php endif;?>

            <?php if ( !empty( $ninico_topbar_behance_url ) ): ?>
                <a href="<?php print esc_url( $ninico_topbar_behance_url );?>"><i class="fab fa-behance"></i></a>
            <?php endif;?>

            <?php if ( !empty( $ninico_topbar_instagram_url ) ): ?>
                <a href="<?php print esc_url( $ninico_topbar_instagram_url );?>"><i class="fab fa-instagram"></i></a>
            <?php endif;?>

            <?php if ( !empty( $ninico_topbar_youtube_url ) ): ?>
                <a href="<?php print esc_url( $ninico_topbar_youtube_url );?>"><i class="fab fa-youtube"></i></a>
            <?php endif;?>

            <?php if ( !empty( $ninico_topbar_linkedin_url ) ): ?>
                <a href="<?php print esc_url( $ninico_topbar_linkedin_url );?>"><i class="fab fa-linkedin"></i></a>
            <?php endif;?>

        </div>
        <?php endif; ?>

<?php
}

/**
 * [ninico_header_social_profiles_2 description]
 * @return [type] [description]
 */
function ninico_header_social_profiles_2() {
    $ninico_topbar_fb_url = get_theme_mod( 'ninico_topbar_fb_url', __( '#', 'ninico' ) );
    $ninico_topbar_twitter_url = get_theme_mod( 'ninico_topbar_twitter_url', __( '#', 'ninico' ) );
    $ninico_topbar_behance_url = get_theme_mod( 'ninico_topbar_behance_url', __( '#', 'ninico' ) );
    $ninico_topbar_instagram_url = get_theme_mod( 'ninico_topbar_instagram_url', __( '#', 'ninico' ) );
    $ninico_topbar_youtube_url = get_theme_mod( 'ninico_topbar_youtube_url', __( '#', 'ninico' ) );
    $ninico_topbar_linkedin_url = get_theme_mod( 'ninico_topbar_linkedin_url', __( '#', 'ninico' ) );

    $ninico_social_switch = get_theme_mod( 'ninico_social_switch', false );
    ?>

        <?php if(!empty($ninico_social_switch)) : ?>
        <div class="menu-top-social">
            
            <?php if ( !empty( $ninico_topbar_fb_url ) ): ?>
                <a href="<?php print esc_url( $ninico_topbar_fb_url );?>">Fb.</a>
            <?php endif;?>

            <?php if ( !empty( $ninico_topbar_twitter_url ) ): ?>
                <a href="<?php print esc_url( $ninico_topbar_twitter_url );?>">Tw.</a>
            <?php endif;?>

            <?php if ( !empty( $ninico_topbar_behance_url ) ): ?>
                <a href="<?php print esc_url( $ninico_topbar_behance_url );?>">Be.</a>
            <?php endif;?>

            <?php if ( !empty( $ninico_topbar_instagram_url ) ): ?>
                <a href="<?php print esc_url( $ninico_topbar_instagram_url );?>">Ig.</a>
            <?php endif;?>

            <?php if ( !empty( $ninico_topbar_youtube_url ) ): ?>
                <a href="<?php print esc_url( $ninico_topbar_youtube_url );?>">Yu.</a>
            <?php endif;?>

            <?php if ( !empty( $ninico_topbar_linkedin_url ) ): ?>
                <a href="<?php print esc_url( $ninico_topbar_linkedin_url );?>">Ln.</a>
            <?php endif;?>

        </div>
        <?php endif; ?>

<?php
}

/**
 * [ninico_offcanvas_social_profiles description]
 * @return [type] [description]
 */
function ninico_offcanvas_social_profiles() {

    $ninico_offcanvas_fb_url = get_theme_mod( 'ninico_offcanvas_fb_url', __( '#', 'ninico' ) );
    $ninico_offcanvas_twitter_url = get_theme_mod( 'ninico_offcanvas_twitter_url', __( '#', 'ninico' ) );
    $ninico_offcanvas_instagram_url = get_theme_mod( 'ninico_offcanvas_instagram_url', __( '#', 'ninico' ) );
    $ninico_offcanvas_linkedin_url = get_theme_mod( 'ninico_offcanvas_linkedin_url', __( '#', 'ninico' ) );
    $ninico_offcanvas_youtube_url = get_theme_mod( 'ninico_offcanvas_youtube_url', __( '#', 'ninico' ) );
    ?>
        <?php if ( !empty( $ninico_offcanvas_fb_url ) ): ?>
            <a href="<?php print esc_url( $ninico_offcanvas_fb_url );?>"><span><i class="fab fa-facebook-f"></i></span></a>
        <?php endif;?>

        <?php if ( !empty( $ninico_offcanvas_twitter_url ) ): ?>
            <a href="<?php print esc_url( $ninico_offcanvas_twitter_url );?>"><span><i class="fab fa-twitter"></i></span></a>
        <?php endif;?>

        <?php if ( !empty( $ninico_offcanvas_instagram_url ) ): ?>
            <a href="<?php print esc_url( $ninico_offcanvas_instagram_url );?>"><span><i class="fab fa-instagram"></i></span></a>
        <?php endif;?>

        <?php if ( !empty( $ninico_offcanvas_linkedin_url ) ): ?>
            <a href="<?php print esc_url( $ninico_offcanvas_linkedin_url );?>"><span><i class="fab fa-linkedin"></i></span></a>
        <?php endif;?>

        <?php if ( !empty( $ninico_offcanvas_youtube_url ) ): ?>
            <a href="<?php print esc_url( $ninico_offcanvas_youtube_url );?>"><span><i class="fab fa-youtube"></i></span></a>
        <?php endif;?>
<?php
}

function ninico_footer_social_profiles() {
    $ninico_footer_fb_url = get_theme_mod( 'ninico_footer_fb_url', __( '#', 'ninico' ) );
    $ninico_footer_twitter_url = get_theme_mod( 'ninico_footer_twitter_url', __( '#', 'ninico' ) );
    $ninico_footer_instagram_url = get_theme_mod( 'ninico_footer_instagram_url', __( '#', 'ninico' ) );
    $ninico_footer_linkedin_url = get_theme_mod( 'ninico_footer_linkedin_url', __( '#', 'ninico' ) );
    $ninico_footer_youtube_url = get_theme_mod( 'ninico_footer_youtube_url', __( '#', 'ninico' ) );
    ?>

        <?php if ( !empty( $ninico_footer_fb_url ) ): ?>
            <a href="<?php print esc_url( $ninico_footer_fb_url );?>">
                <i class="fab fa-facebook-f"></i>
            </a>
        <?php endif;?>

        <?php if ( !empty( $ninico_footer_twitter_url ) ): ?>
            <a href="<?php print esc_url( $ninico_footer_twitter_url );?>">
                <i class="fab fa-twitter"></i>
            </a>
        <?php endif;?>

        <?php if ( !empty( $ninico_footer_instagram_url ) ): ?>
            <a href="<?php print esc_url( $ninico_footer_instagram_url );?>">
                <i class="fab fa-instagram"></i>
            </a>
        <?php endif;?>

        <?php if ( !empty( $ninico_footer_linkedin_url ) ): ?>
            <a href="<?php print esc_url( $ninico_footer_linkedin_url );?>">
                <i class="fab fa-linkedin"></i>
            </a>
        <?php endif;?>

        <?php if ( !empty( $ninico_footer_youtube_url ) ): ?>
            <a href="<?php print esc_url( $ninico_footer_youtube_url );?>">
                <i class="fab fa-youtube"></i>
            </a>
        <?php endif;?>
<?php
}

/**
 * [ninico_header_menu description]
 * @return [type] [description]
 */
function ninico_header_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'main-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'Ninico_Navwalker_Class::fallback',
            'walker'         => new Ninico_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [ninico_header_top_menu description]
 * @return [type] [description]
 */
function ninico_header_top_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'header-top-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'Ninico_Navwalker_Class::fallback',
            'walker'         => new Ninico_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [ninico_header_ofcanvas_menu description]
 * @return [type] [description]
 */
function ninico_offcanvas_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'offcanvas-menu',
            'menu_class'     => '',
            'container'      => '',
            'fallback_cb'    => 'Ninico_Navwalker_Class::fallback',
            'walker'         => new Ninico_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 * [ninico_header_pcat_menu description]
 * @return [type] [description]
 */
function product_cat_menu() {
    ?>
    <?php
        wp_nav_menu( [
            'theme_location' => 'product-cat-menu',
            'menu_class'     => 'cat-menu__list',
            'container'      => '',
            'fallback_cb'    => 'Ninico_Navwalker_Class::fallback',
            'walker'         => new Ninico_Navwalker_Class,
        ] );
    ?>
    <?php
}

/**
 *
 * ninico footer
 */
add_action( 'ninico_footer_style', 'ninico_check_footer', 10 );

function ninico_check_footer() {
    $ninico_footer_style = function_exists( 'get_field' ) ? get_field( 'footer_style' ) : NULL;
    $ninico_default_footer_style = get_theme_mod( 'choose_default_footer', 'footer-style-1' );

    if ( $ninico_footer_style == 'footer-style-1' ) {
        get_template_part( 'template-parts/footer/footer-1' );
    } 
    elseif ( $ninico_footer_style == 'footer-style-2' ) {
        get_template_part( 'template-parts/footer/footer-2' );
    } 
    elseif ( $ninico_footer_style == 'footer-style-3' ) {
        get_template_part( 'template-parts/footer/footer-3' );
    }
     else {

        /** default footer style **/
        if ( $ninico_default_footer_style == 'footer-style-2' ) {
            get_template_part( 'template-parts/footer/footer-2' );
        } 
        elseif ( $ninico_default_footer_style == 'footer-style-3' ) {
            get_template_part( 'template-parts/footer/footer-3' );
        } 
        else {
            get_template_part( 'template-parts/footer/footer-1' );
        }

    }
}

// ninico_copyright_text
function ninico_copyright_text() {
   print get_theme_mod( 'ninico_copyright', esc_html__( 'Copyright © 2023 Theme_Pure. All Rights Reserved', 'ninico' ) );
}



/**
 *
 * pagination
 */
if ( !function_exists( 'ninico_pagination' ) ) {

    function _ninico_pagi_callback( $pagination ) {
        return $pagination;
    }

    //page navegation
    function ninico_pagination( $prev, $next, $pages, $args ) {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ( $pages == '' ) {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if ( !$pages ) {
                $pages = 1;
            }

        }

        $pagination = [
            'base'      => add_query_arg( 'paged', '%#%' ),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ( $wp_rewrite->using_permalinks() ) {
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
        }

        if ( !empty( $wp_query->query_vars['s'] ) ) {
            $pagination['add_args'] = ['s' => get_query_var( 's' )];

            
        }     

        $pagi = '';
        if ( paginate_links( $pagination ) != '' ) {
            $paginations = paginate_links( $pagination );
            $pagi .= '<ul>';
            foreach ( $paginations as $key => $pg ) {
                $pagi .= '<li>' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _ninico_pagi_callback( $pagi );
    }
}


// header top bg color
function ninico_breadcrumb_bg_color() {
    $color_code = get_theme_mod( 'ninico_breadcrumb_bg_color', '#e1e1e1' );
    wp_enqueue_style( 'ninico-custom', NINICO_THEME_CSS_DIR . 'ninico-custom.css', [] );
    if ( $color_code != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-bg.gray-bg{ background: " . $color_code . "}";

        wp_add_inline_style( 'ninico-breadcrumb-bg', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'ninico_breadcrumb_bg_color' );

// breadcrumb-spacing top
function ninico_breadcrumb_spacing() {
    $padding_px = get_theme_mod( 'ninico_breadcrumb_spacing', '160px' );
    wp_enqueue_style( 'ninico-custom', NINICO_THEME_CSS_DIR . 'ninico-custom.css', [] );
    if ( $padding_px != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-top: " . $padding_px . "}";

        wp_add_inline_style( 'ninico-breadcrumb-top-spacing', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'ninico_breadcrumb_spacing' );

// breadcrumb-spacing bottom
function ninico_breadcrumb_bottom_spacing() {
    $padding_px = get_theme_mod( 'ninico_breadcrumb_bottom_spacing', '160px' );
    wp_enqueue_style( 'ninico-custom', NINICO_THEME_CSS_DIR . 'ninico-custom.css', [] );
    if ( $padding_px != '' ) {
        $custom_css = '';
        $custom_css .= ".breadcrumb-spacing{ padding-bottom: " . $padding_px . "}";

        wp_add_inline_style( 'ninico-breadcrumb-bottom-spacing', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'ninico_breadcrumb_bottom_spacing' );

// scrollup
function ninico_scrollup_switch() {
    $scrollup_switch = get_theme_mod( 'ninico_scrollup_switch', false );
    wp_enqueue_style( 'ninico-custom', NINICO_THEME_CSS_DIR . 'ninico-custom.css', [] );
    if ( $scrollup_switch ) {
        $custom_css = '';
        $custom_css .= "#scrollUp{ display: none !important;}";

        wp_add_inline_style( 'ninico-scrollup-switch', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'ninico_scrollup_switch' );

// theme color
function ninico_custom_color() {
    $ninico_theme_color_1 = get_theme_mod( 'ninico_theme_color_1', '#d51243' );
    $ninico_theme_color_2 = get_theme_mod( 'ninico_theme_color_2', '#040404' );
    $ninico_body_color = get_theme_mod( 'ninico_body_color', '#777777' );

    wp_enqueue_style( 'ninico-custom', NINICO_THEME_CSS_DIR . 'ninico-custom.css', [] );
    
    if ( !empty($ninico_theme_color_1) || !empty($ninico_theme_color_2) || !empty($ninico_body_color) ) {
        $custom_css = '';
        $custom_css .= "html:root{
            --tp-text-primary: " . $ninico_theme_color_1 . ";
            --tp-text-body: " . $ninico_theme_color_2 . ";
            --tp-text-secondary: " . $ninico_body_color . ";
        }";

        wp_add_inline_style( 'ninico-custom', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'ninico_custom_color' );


// ninico_kses_intermediate
function ninico_kses_intermediate( $string = '' ) {
    return wp_kses( $string, ninico_get_allowed_html_tags( 'intermediate' ) );
}

function ninico_get_allowed_html_tags( $level = 'basic' ) {
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}



// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function ninico_kses($raw){

   $allowed_tags = array(
      'a'                         => array(
         'class'   => array(),
         'href'    => array(),
         'rel'  => array(),
         'title'   => array(),
         'target' => array(),
      ),
      'abbr'                      => array(
         'title' => array(),
      ),
      'b'                         => array(),
      'blockquote'                => array(
         'cite' => array(),
      ),
      'cite'                      => array(
         'title' => array(),
      ),
      'code'                      => array(),
      'del'                    => array(
         'datetime'   => array(),
         'title'      => array(),
      ),
      'dd'                     => array(),
      'div'                    => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'dl'                     => array(),
      'dt'                     => array(),
      'em'                     => array(),
      'h1'                     => array(),
      'h2'                     => array(),
      'h3'                     => array(),
      'h4'                     => array(),
      'h5'                     => array(),
      'h6'                     => array(),
      'i'                         => array(
         'class' => array(),
      ),
      'img'                    => array(
         'alt'  => array(),
         'class'   => array(),
         'height' => array(),
         'src'  => array(),
         'width'   => array(),
      ),
      'li'                     => array(
         'class' => array(),
      ),
      'ol'                     => array(
         'class' => array(),
      ),
      'p'                         => array(
         'class' => array(),
      ),
      'q'                         => array(
         'cite'    => array(),
         'title'   => array(),
      ),
      'span'                      => array(
         'class'   => array(),
         'title'   => array(),
         'style'   => array(),
      ),
      'iframe'                 => array(
         'width'         => array(),
         'height'     => array(),
         'scrolling'     => array(),
         'frameborder'   => array(),
         'allow'         => array(),
         'src'        => array(),
      ),
      'strike'                 => array(),
      'br'                     => array(),
      'strong'                 => array(),
      'data-wow-duration'            => array(),
      'data-wow-delay'            => array(),
      'data-wallpaper-options'       => array(),
      'data-stellar-background-ratio'   => array(),
      'ul'                     => array(
         'class' => array(),
      ),
      'svg' => array(
           'class' => true,
           'aria-hidden' => true,
           'aria-labelledby' => true,
           'role' => true,
           'xmlns' => true,
           'width' => true,
           'height' => true,
           'viewbox' => true, // <= Must be lower case!
       ),
       'g'     => array( 'fill' => true ),
       'title' => array( 'title' => true ),
       'path'  => array( 'd' => true, 'fill' => true,  ),
      );

   if (function_exists('wp_kses')) { // WP is here
      $allowed = wp_kses($raw, $allowed_tags);
   } else {
      $allowed = $raw;
   }

   return $allowed;
}

// / This code filters the Archive widget to include the post count inside the link /
add_filter( 'get_archives_link', 'ninico_archive_count_span' );
function ninico_archive_count_span( $links ) {
    $links = str_replace('</a>&nbsp;(', '<span > (', $links);
    $links = str_replace(')', ')</span></a> ', $links);
    return $links;
}


// / This code filters the Category widget to include the post count inside the link /
add_filter('wp_list_categories', 'ninico_cat_count_span');
function ninico_cat_count_span($links) {
  $links = str_replace('</a> (', '<span> (', $links);
  $links = str_replace(')', ')</span></a>', $links);
  return $links;
}



