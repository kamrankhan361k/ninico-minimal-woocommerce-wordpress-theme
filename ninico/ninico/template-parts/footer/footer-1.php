<?php 

/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ninico
*/

$footer_bg_img = get_theme_mod( 'ninico_footer_bg' );
$ninico_footer_logo = get_theme_mod( 'ninico_footer_logo' );
$ninico_footer_top_space = function_exists('get_field') ? get_field('ninico_footer_top_space') : '0';
$ninico_footer_bottom_menu = get_theme_mod( 'ninico_footer_bottom_menu' );
$ninico_copyright_center = $ninico_footer_bottom_menu ? 'col-sm-6' : 'col-sm-12 text-center';
$ninico_footer_bg_url_from_page = function_exists( 'get_field' ) ? get_field( 'ninico_footer_bg' ) : '';
$ninico_footer_bg_color_from_page = function_exists( 'get_field' ) ? get_field( 'ninico_footer_bg_color' ) : '';
$footer_bg_color = get_theme_mod( 'ninico_footer_bg_color', '#f8f8f8' );
$ninico_footer_left_link = get_theme_mod( 'ninico_footer_left_link');
$ninico_footer_right_link = get_theme_mod( 'ninico_footer_right_link');
$ninico_footer_payment = get_theme_mod( 'ninico_footer_payment');
$ninico_footer_bottom_color = get_theme_mod( 'ninico_footer_bottom_color', '#ededed' );
$ninico_footer_bottom_color_page = function_exists( 'get_field' ) ? get_field( 'ninico_footer_bottom_color' ) : '';

// bg image
$bg_img = !empty( $ninico_footer_bg_url_from_page['url'] ) ? $ninico_footer_bg_url_from_page['url'] : $footer_bg_img;

// bg color
$bg_color = !empty( $ninico_footer_bg_color_from_page ) ? $ninico_footer_bg_color_from_page : $footer_bg_color;

// bottom bg
$footer_bottom_bg = $ninico_footer_bottom_color_page ? $ninico_footer_bottom_color_page : $ninico_footer_bottom_color;

// footer_columns
$footer_columns = 0;
$footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

for ( $num = 1; $num <= $footer_widgets; $num++ ) {
    if ( is_active_sidebar( 'footer-' . $num ) ) {
        $footer_columns++;
    }
}

switch ( $footer_columns ) {
case '1':
    $footer_class[1] = 'col-lg-12';
    break;
case '2':
    $footer_class[1] = 'col-lg-6 col-md-6';
    $footer_class[2] = 'col-lg-6 col-md-6';
    break;
case '3':
    $footer_class[1] = 'col-xl-4 col-lg-6 col-md-5';
    $footer_class[2] = 'col-xl-4 col-lg-6 col-md-7';
    $footer_class[3] = 'col-xl-4 col-lg-6';
    break;
case '4':
    $footer_class[1] = 'col-lg-3 col-md-6 col-sm-6';
    $footer_class[2] = 'col-lg-3 col-md-6 col-sm-6';
    $footer_class[3] = 'col-lg-3 col-md-6 col-sm-6';
    $footer_class[4] = 'col-lg-3 col-md-6';
    break;
case '5':
    $footer_class[1] = 'col-lg-3 col-md-4 col-sm-6';
    $footer_class[2] = 'col-lg-2 col-md-4 col-sm-6';
    $footer_class[3] = 'col-lg-2 col-md-4 col-sm-6';
    $footer_class[4] = 'col-lg-2 col-md-4 col-sm-6';
    $footer_class[5] = 'col-lg-3 col-md-4';
    break;
default:
    $footer_class = 'col-xl-3 col-lg-3 col-md-6';
    break;
}

?>

<!-- footer-area-start -->
<footer>
    <div class="footer-area theme-bg" data-bg-color="<?php print esc_attr( $bg_color );?>" data-background="<?php print esc_url( $bg_img );?>">

        <?php if ( is_active_sidebar('footer-1') OR is_active_sidebar('footer-2') OR is_active_sidebar('footer-3') OR is_active_sidebar('footer-4') ): ?>
        <div class="container pt-65">
            <div class="main-footer pb-15 mb-30">
                <div class="row">

                    <?php
                        if ( $footer_columns < 6 ) {
                            print '<div class="col-lg-3 col-md-6 col-sm-6">';
                            dynamic_sidebar( 'footer-1' );
                            print '</div>';

                            print '<div class="col-lg-3 col-md-6 col-sm-6">';
                            dynamic_sidebar( 'footer-2' );
                            print '</div>';

                            print '<div class="col-lg-3 col-md-6 col-sm-6">';
                            dynamic_sidebar( 'footer-3' );
                            print '</div>';

                            print '<div class="col-lg-3 col-md-6 col-sm-6">';
                            dynamic_sidebar( 'footer-4' );
                            print '</div>';
                        } else {
                            for ( $num = 1; $num <= $footer_columns; $num++ ) {
                                if ( !is_active_sidebar( 'footer-col-' . $num ) ) {
                                    continue;
                                }
                                print '<div class="' . esc_attr( $footer_class[$num] ) . '">';
                                dynamic_sidebar( 'footer-col-' . $num );
                                print '</div>';
                            }
                        }
                    ?>

                </div>
            </div>
            <?php if(!empty($ninico_footer_left_link) || !empty($ninico_footer_right_link)) : ?>
            <div class="footer-cta pb-20">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6">
                        <?php if(!empty($ninico_footer_left_link)) : ?>
                        <div class="footer-cta__contact">
                            <?php echo ninico_kses($ninico_footer_left_link); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-xl-6 col-lg-8 col-md-8 col-sm-6">
                        <?php if(!empty($ninico_footer_right_link)) : ?>
                        <div class="footer-cta__source">
                            <?php echo ninico_kses($ninico_footer_right_link); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <div class="footer-copyright footer-bg" data-bg-color="<?php print esc_attr( $footer_bottom_bg );?>">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-md-5 col-sm-12">
                        <div class="footer-copyright__content">
                            <span><?php echo ninico_copyright_text(); ?></span>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 col-md-7 col-sm-12">
                        <?php if(!empty($ninico_footer_payment)) : ?>
                        <div class="footer-copyright__brand">
                            <img src="<?php echo esc_url($ninico_footer_payment); ?>" alt="footer-brand">
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-area-end -->
