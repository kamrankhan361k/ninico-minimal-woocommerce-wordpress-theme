<?php 

	/**
	 * Template part for displaying header layout three
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package ninico
	*/


    // header styles
    $ninico_topbar_switch = get_theme_mod( 'ninico_topbar_switch', false );
    $ninico_header_top_text = get_theme_mod( 'ninico_header_top_text', __('Enjoy free shipping on orders $100 & up.', 'ninico') );
    // header right
    $ninico_header_right = get_theme_mod( 'ninico_header_right', false );
    $ninico_header_cart = get_theme_mod( 'ninico_header_cart', false );
    $ninico_menu_col = $ninico_header_right ? 'col-xl-6 col-lg-6' : 'col-xl-10 col-lg-9 text-end';
    $ninico_header_search = get_theme_mod( 'ninico_header_search', false );
    $ninico_header_wishlist = get_theme_mod( 'ninico_header_wishlist', false );
    $ninico_header_avatar = get_theme_mod( 'ninico_header_avatar', false );
    $ninico_header_pcat_menu = get_theme_mod( 'ninico_header_pcat_menu', false );
    $ninico_header_wishlist_link = get_theme_mod( 'ninico_header_wishlist_link', '#' );
    $ninico_phone_num = get_theme_mod( 'ninico_phone_num', __('+964 742 44 763', 'ninico') );
    $ninico_header_pcat_title = get_theme_mod( 'ninico_header_pcat_title', __('Categories', 'ninico') );
    $ninico_header_address = get_theme_mod( 'ninico_header_address', __('New York.', 'ninico') );
    $ninico_header_pcat_text = get_theme_mod( 'ninico_header_pcat_text', __('New Arrival', 'ninico') );
    $ninico_header_lang = get_theme_mod( 'ninico_header_lang', false );
    $ninico_header_multicurrency = get_theme_mod( 'ninico_header_multicurrency', false );
    $ninico_header_multicurrency_shortcode = get_theme_mod( 'ninico_header_multicurrency_shortcode', __('[shortcode here]', 'ninico') );

?>

<!-- header-area-start -->
<header>
   <?php if(!empty($ninico_topbar_switch)) : ?>
   <div class="header-top space-bg">
      <div class="container">
         <div class="row align-items-center">
               <div class="col-xl-8 col-lg-12 col-md-12">
                  <?php if(!empty($ninico_header_top_text)) : ?>
                  <div class="header-welcome-text ">
                     <span><?php echo ninico_kses($ninico_header_top_text); ?></span>
                  </div>
                  <?php endif; ?>
               </div>
               <div class="col-xl-4 d-none d-xl-block">
                  <div class="headertoplag d-flex align-items-center justify-content-end">

                     <?php if(!empty($ninico_header_lang)) : ?>
                     <div class="headertoplag__lang">
                        <?php ninico_header_lang_defualt_2(); ?>
                     </div>
                     <?php endif; ?>

                     <?php ninico_header_social_profiles(); ?>
                  </div>
               </div>
         </div>
      </div>
   </div>
   <?php endif; ?>
    <div class="mainmenuarea d-none d-xl-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9">
                    <div class="mainmenu d-flex align-items-center">
                     
                        <?php if(!empty($ninico_header_search)) : ?>
                           <?php ninico_search_form_3(); ?>
                        <?php endif; ?>

                        <div class="mainmenu__main d-flex align-items-center p-relative">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <?php ninico_header_menu();?>
                                </nav>
                            </div>
                            <div class="mainmenu__logo">
                              <?php ninico_header_logo();?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                     <?php if(!empty($ninico_header_right)) : ?>
                    <div class="header-meta d-flex align-items-center justify-content-end">

                        <?php if(!empty($ninico_header_multicurrency)) : ?>
                        <div class="header-meta__value mr-15 header3-currency">
                            <?php if(!empty($ninico_header_multicurrency_shortcode)) : ?>
                                <?php echo do_shortcode("$ninico_header_multicurrency_shortcode"); ?>
                            <?php else : ?>
                            <select>
                                <option><?php echo esc_html__('USD', 'ninico'); ?></option>
                                <option><?php echo esc_html__('YEAN', 'ninico'); ?></option>
                                <option><?php echo esc_html__('EURO', 'ninico'); ?></option>
                            </select>
                            <?php endif; ?>
                        </div>
                        <?php endif ; ?>

                        <div class="header-meta__social d-flex align-items-center ml-25">
                            <?php if ( class_exists( 'WooCommerce' ) && !empty($ninico_header_cart) ) : ?>
                            <span class="tp-mini-card header-cart p-relative tp-cart-toggle cartmini-open-btn">
                                <i class="fal fa-shopping-cart"></i>
                                <span class="tp-item-count tp-header-icon cart__count tp-product-count tp-cart-item"><?php echo esc_html(WC()->cart->cart_contents_count); ?></span>   
                                <div class="mini_shopping_cart_box"><?php woocommerce_mini_cart(); ?></div>
                            </span>
                            <?php endif; ?>

                            <?php if(!empty($ninico_header_avatar)) : ?>
                            <a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>"><i class="fal fa-user"></i></a>
                            <?php endif; ?>

                            <?php if(!empty($ninico_header_wishlist)) : ?>
                            <a href="<?php echo esc_url($ninico_header_wishlist_link); ?>"><i class="fal fa-heart"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-area-end -->

<!-- header-xl-sticky-area -->
<div id="header-sticky" class="logo-area tp-sticky-one mainmenu-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-2 col-lg-3">
                <div class="logo">
                  <?php ninico_header_logo();?>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="main-menu">
                  <?php ninico_header_menu();?>
                </div>
            </div>
            <div class="col-xl-4 col-lg-9">
                  <?php if(!empty($ninico_header_right)) : ?>
                <div class="header-meta-info d-flex align-items-center justify-content-end">
                    <div class="header-meta__social  d-flex align-items-center">
                        <?php if ( class_exists( 'WooCommerce' ) && !empty($ninico_header_cart) ) : ?>
                        <span class="tp-mini-card header-cart p-relative tp-cart-toggle cartmini-open-btn">
                            <i class="fal fa-shopping-cart"></i>
                            <span class="tp-item-count tp-header-icon cart__count tp-product-count tp-cart-item"><?php echo esc_html(WC()->cart->cart_contents_count); ?></span>   
                            <div class="mini_shopping_cart_box"><?php woocommerce_mini_cart(); ?></div>
                        </span>
                        <?php endif; ?>

                        <?php if(!empty($ninico_header_avatar)) : ?>
                        <a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>"><i class="fal fa-user"></i></a>
                        <?php endif; ?>

                        <?php if(!empty($ninico_header_wishlist)) : ?>
                        <a href="<?php echo esc_url($ninico_header_wishlist_link); ?>"><i class="fal fa-heart"></i></a>
                        <?php endif; ?>

                    </div>
                     <?php if(!empty($ninico_header_search)) : ?>
                        <?php ninico_search_form(); ?>
                     <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- header-xl-sticky-end -->

<!-- header-md-lg-area -->
<div id="header-tab-sticky" class="tp-md-lg-header d-none d-md-block d-xl-none pt-30 pb-30">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 d-flex align-items-center">
                <div class="header-canvas flex-auto">
                    <button class="tp-menu-toggle"><i class="far fa-bars"></i></button>
                </div>
                <div class="logo">
                  <?php ninico_header_logo();?>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="header-meta-info d-flex align-items-center justify-content-between">

                     <?php if(!empty($ninico_header_search)) : ?>
                        <?php ninico_search_form_2(); ?>
                     <?php endif; ?>

                     <?php if(!empty($ninico_header_right)) : ?>
                    <div class="header-meta__social d-flex align-items-center ml-25">
                        <?php if ( class_exists( 'WooCommerce' ) && !empty($ninico_header_cart) ) : ?>
                        <span class="tp-mini-card header-cart p-relative tp-cart-toggle cartmini-open-btn">
                            <i class="fal fa-shopping-cart"></i>
                            <span class="tp-item-count tp-header-icon cart__count tp-product-count tp-cart-item"><?php echo esc_html(WC()->cart->cart_contents_count); ?></span>   
                            <div class="mini_shopping_cart_box"><?php woocommerce_mini_cart(); ?></div>
                        </span>
                        <?php endif; ?>
                        <?php if(!empty($ninico_header_avatar)) : ?>
                        <a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>"><i class="fal fa-user"></i></a>
                        <?php endif; ?>

                        <?php if(!empty($ninico_header_wishlist)) : ?>
                        <a href="<?php echo esc_url($ninico_header_wishlist_link); ?>"><i class="fal fa-heart"></i></a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<div id="header-mob-sticky" class="tp-md-lg-header d-md-none pt-20 pb-20">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-3 d-flex align-items-center">
                <div class="header-canvas flex-auto">
                    <button class="tp-menu-toggle"><i class="far fa-bars"></i></button>
                </div>
            </div>
            <div class="col-6">
                <div class="logo text-center">
                  <?php ninico_header_logo();?>
                </div>
            </div>
            <div class="col-3">

               <?php if(!empty($ninico_header_right)) : ?>
               <div class="header-meta-info d-flex align-items-center justify-content-end ml-25">
                  <div class="header-meta m-0 d-flex align-items-center">
                        <div class="header-meta__social d-flex align-items-center">
                            <?php if ( class_exists( 'WooCommerce' ) && !empty($ninico_header_cart) ) : ?>
                            <span class="tp-mini-card header-cart p-relative tp-cart-toggle cartmini-open-btn">
                                <i class="fal fa-shopping-cart"></i>
                                <span class="tp-item-count tp-header-icon cart__count tp-product-count tp-cart-item"><?php echo esc_html(WC()->cart->cart_contents_count); ?></span>   
                                <div class="mini_shopping_cart_box"><?php woocommerce_mini_cart(); ?></div>
                            </span>
                            <?php endif; ?>
                           <?php if(!empty($ninico_header_avatar)) : ?>
                           <a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>"><i class="fal fa-user"></i></a>
                           <?php endif; ?>
                        </div>
                  </div>
               </div>
               <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<!-- header-md-lg-area -->


<?php get_template_part( 'template-parts/header/header-offcanvas' ); ?>