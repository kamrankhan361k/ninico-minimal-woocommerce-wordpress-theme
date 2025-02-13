<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ninico
 */

get_header();

$ninico_404_thumb = get_theme_mod('ninico_404_bg', get_template_directory_uri() . '/assets/img/icon/error.png');
$ninico_error_title = get_theme_mod('ninico_error_title', __('Oops! Page not found', 'ninico'));
$ninico_error_link_text = get_theme_mod('ninico_error_link_text', __('Back To Home', 'ninico'));
$ninico_error_desc = get_theme_mod('ninico_error_desc', __('Whoops, this is embarassing. Looks like the page you were looking for was not found.', 'ninico'));

?>


<section class="erroe-area pt-70 pb-70">
   <div class="container">
      <div class="row">
         <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
            <div class="eperror__wrapper text-center">
               <?php if(!empty($ninico_404_thumb)) : ?>
               <div class="tperror__thumb mb-35">
                  <img src="<?php echo esc_url($ninico_404_thumb); ?>" alt="error_img">
               </div>
               <?php endif; ?>
               <div class="tperror__content">
                  <?php if(!empty($ninico_error_title)) : ?>
                  <h4 class="tperror__title mb-25"><?php echo esc_html($ninico_error_title); ?></h4>
                  <?php endif; ?>
                  <?php if(!empty($ninico_error_desc)) : ?>
                  <p><?php echo esc_html($ninico_error_desc); ?></p>
                  <?php endif; ?>
                  <?php if(!empty($ninico_error_link_text)) : ?>
                  <a href="<?php print esc_url(home_url('/'));?>" class="tpsecondary-btn tp-color-btn tp-error-btn"><i class="fal fa-long-arrow-left"></i> <?php print esc_html($ninico_error_link_text);?></a>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<?php
get_footer();
