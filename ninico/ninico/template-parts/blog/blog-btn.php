<?php

/**
 * Template part for displaying post btn
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ninico
 */

$ninico_blog_btn = get_theme_mod( 'ninico_blog_btn', 'Read More' );
$ninico_blog_btn_switch = get_theme_mod( 'ninico_blog_btn_switch', true );

?>

<?php if ( !empty( $ninico_blog_btn_switch ) ): ?>
<div class="postbox__read-more">
    <a href="<?php the_permalink();?>" class="tp-btn tp-color-btn banner-animation"><?php print esc_html( $ninico_blog_btn );?></a>                               
</div>
<?php endif;?>

