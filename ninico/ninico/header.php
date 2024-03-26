<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ninico
 */
?>

<!doctype html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo( 'charset' );?>">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ): ?>
    <?php endif;?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head();?>
</head>

<body <?php body_class();?>>

    <?php wp_body_open();?>


    <?php
         $ninico_preloader = get_theme_mod( 'ninico_preloader_switch', false );
         $ninico_backtotop = get_theme_mod( 'ninico_backtotop', false );

    ?>

    <?php if ( !empty( $ninico_preloader ) ): ?>
      <!-- pre loader area start -->
      <div id="preloader">
         <div class="preloader">
               <span></span>
               <span></span>
         </div>
      </div>
      <!-- pre loader area end -->
    <?php endif;?>

    <?php if ( !empty( $ninico_backtotop ) ): ?>
      <!-- back to top start -->
      <button class="scroll-top scroll-to-target" data-target="html">
         <i class="fas fa-angle-up"></i>
      </button>
      <!-- back to top end -->
    <?php endif;?>

    <!-- header start -->
    <?php do_action( 'ninico_header_style' );?>
    <!-- header end -->
    
    <!-- wrapper-box start -->
    <?php do_action( 'ninico_before_main_content' );?>