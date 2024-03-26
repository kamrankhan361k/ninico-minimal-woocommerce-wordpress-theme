<?php 

	/**
	 * Template part for displaying header layout one
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
   $ninico_header_wishlist_link = get_theme_mod( 'ninico_header_wishlist_link', '#' );


?>


<header>

    <?php if(!empty($ninico_topbar_switch)) : ?>
    <div class="header-top theme-bg-2 red-header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 d-none  d-lg-block">
                    <div class="headertoplag ">
                        <div class="menu-top-social">
                            <?php ninico_header_top_menu(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php if(!empty($ninico_header_top_text)) : ?>
                    <div class="header-welcome-text text-end">
                        <span><?php echo ninico_kses($ninico_header_top_text); ?></span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div id="header-sticky" class="logo-area d-none d-xl-block mainmenu-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-3">
                    <div class="logo">
                        <?php ninico_header_logo();?>
                    </div>
                </div>
                <div class="<?php echo esc_attr($ninico_menu_col); ?>">
                    <div class="main-menu">
                        <nav id="mobile-menu">
                            <?php ninico_header_menu();?>
                        </nav>
                    </div>
                </div>
                <?php if(!empty($ninico_header_right)) : ?>
                <div class="col-xl-4 col-lg-9">
                    <div class="header-meta-info d-flex align-items-center justify-content-end">
                        <div class="header-meta__social  d-flex align-items-center">

                            <?php if ( class_exists( 'WooCommerce' ) && !empty($ninico_header_cart) ) : ?>
                            <span class="tp-mini-card header-cart p-relative tp-cart-toggle cartmini-open-btn">
                                <i class="fal fa-shopping-cart"></i>
                                <span class="tp-item-count tp-header-icon cart__count tp-product-count tp-cart-item"><?php echo esc_html(WC()->cart->cart_contents_count); ?></span>   
                                <div class="mini_shopping_cart_box"><?php woocommerce_mini_cart(); ?></div>
                            </span>
                            <?php endif; ?>

                            <?php if( class_exists( 'WooCommerce' ) && !empty($ninico_header_avatar)) : ?>
                            <a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>"><i class="fal fa-user"></i></a>
                            <?php endif; ?>

                            <?php if( class_exists( 'WooCommerce' ) && !empty($ninico_header_wishlist)) : ?>
                            <a href="<?php echo esc_url($ninico_header_wishlist_link); ?>"><i class="fal fa-heart"></i></a>
                            <?php endif; ?>
                        </div>

                        <?php if(!empty($ninico_header_search)) : ?>
                           <?php ninico_search_form(); ?>
                        <?php endif; ?>

                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

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
                  <?php if(!empty($ninico_header_right)) : ?>
                  <div class="header-meta-info d-flex align-items-center justify-content-between">
                     
                     <?php if(!empty($ninico_header_search)) : ?>
                        <?php ninico_search_form_2(); ?>
                     <?php endif; ?>

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
                <div class="header-meta-info d-flex align-items-center justify-content-end">
                    <div class="header-meta m-0 d-flex align-items-center">
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