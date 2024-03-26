<?php 

   /**
    * Template part for displaying header side information
    *
    * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
    *
    * @package ninico
   */


  $ninico_offcanvas_hide = get_theme_mod( 'ninico_offcanvas_hide', false );
  $ninico_offcanvas_desc_title = get_theme_mod( 'ninico_offcanvas_desc_title', __( 'We help to create visual strategies.', 'ninico' ) );
  // side btn 1
  $ninico_side_btn_title = get_theme_mod( 'ninico_side_btn_title', __( 'Login / Register', 'ninico' ) );
  $ninico_side_btn_url = get_theme_mod( 'ninico_side_btn_url', __( '#', 'ninico' ) );
  // side btn 2
  $ninico_side_btn_title_2 = get_theme_mod( 'ninico_side_btn_title_2', __( 'Wishlist', 'ninico' ) );
  $ninico_side_btn_url_2 = get_theme_mod( 'ninico_side_btn_url_2', __( '#', 'ninico' ) );
  $ninico_header_search = get_theme_mod( 'ninico_header_search', false );
  

?>

<div class="tpsideinfo">
    <button class="tpsideinfo__close"><?php echo esc_html__('Close', 'ninico'); ?><i class="fal fa-times ml-10"></i></button>
    <div class="tpsideinfo__search text-center pt-35">

        <?php if(!empty($ninico_offcanvas_hide)) : ?>
        <span class="tpsideinfo__search-title mb-20"><?php echo ninico_kses($ninico_offcanvas_desc_title); ?></span>
        <?php endif; ?>

        <?php if(!empty($ninico_header_search)) : ?>
            <?php ninico_offcanvas_search(); ?>
        <?php endif; ?>
    </div>
    <div class="tpsideinfo__nabtab">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            
            <?php if(has_nav_menu('main-menu')) : ?>
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true"><?php echo esc_html__('Menu', 'ninico'); ?></button>
            </li>
            <?php endif; ?>
            <?php if(has_nav_menu('offcanvas-menu')) : ?>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                    type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><?php echo esc_html__('Categories', 'ninico'); ?></button>
            </li>
            <?php endif; ?>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                tabindex="0">
                <div class="mobile-menu"></div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                tabindex="0">
                <div class="tpsidebar-categories">
                    <?php ninico_offcanvas_menu(); ?>
                </div>
            </div>
        </div>
    </div>

    <?php if(!empty($ninico_offcanvas_hide)) : ?>
    <?php if(!empty($ninico_side_btn_title)) : ?>
    <div class="tpsideinfo__account-link">
        <a href="<?php echo esc_url($ninico_side_btn_url); ?>"><i class="fal fa-user"></i> <?php echo esc_html($ninico_side_btn_title); ?></a>
    </div>
    <?php endif; ?>
    <?php if(!empty($ninico_side_btn_title_2)) : ?>
    <div class="tpsideinfo__wishlist-link">
        <a href="<?php echo esc_url($ninico_side_btn_url_2); ?>" target="_parent"><i class="fal fa-heart"></i> <?php echo esc_html($ninico_side_btn_title_2); ?></a>
    </div>
    <?php endif; ?>
    <?php endif; ?>

</div>
<div class="body-overlay"></div>

