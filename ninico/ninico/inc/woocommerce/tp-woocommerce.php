<?php

// shop page hooks
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// content-product hooks--
// action remove
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

//single hook remove
remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating',10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart',30);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_sharing',50);


// compare_false
add_filter( 'woosc_button_position_archive', '__return_false' );
add_filter( 'woosc_button_position_single', '__return_false' );

// wishlist false
add_filter( 'woosw_button_position_archive', '__return_false' );
add_filter( 'woosw_button_position_single', '__return_false' );


// product-content single
if( !function_exists('ninico_content_single_details') ) {
    function ninico_content_single_details( ) {
        global $product;
        global $post;
        global $woocommerce;
        $rating = wc_get_rating_html($product->get_average_rating());
        $ratingcount = $product->get_review_count();

        $attachment_ids = $product->get_gallery_image_ids();

        foreach( $attachment_ids as $attachment_id ) {
            $image_link = wp_get_attachment_url( $attachment_id );
        }

        $categories = get_the_terms( $post->ID, 'product_cat' );
        $stock = $product->is_in_stock();

        ?>

    <div class="tpproduct-details__tag-area d-flex align-items-center mb-5">
        <span class="tpproduct-details__tag"><?php echo esc_html($categories[0]->name); ?></span>

        <?php if(!empty($rating)) : ?>
        <?php echo wp_kses_post($rating); ?>
        <a class="tpproduct-details__reviewers"><?php echo esc_html($ratingcount); ?> <?php echo esc_html($ratingcount) <= 1 ? 'Review' : 'Reviews'; ?></a>
        <?php else : ?>
            <div class="tpproduct-details__rating">
                <a href="#"><i class="fal fa-star"></i></a>
                <a href="#"><i class="fal fa-star"></i></a>
                <a href="#"><i class="fal fa-star"></i></a>
                <a href="#"><i class="fal fa-star"></i></a>
                <a href="#"><i class="fal fa-star"></i></a>
            </div>
            <a class="tpproduct-details__reviewers no-review"><?php echo esc_html__('No Review', 'ninico'); ?></a>
        <?php endif; ?>


    </div>
    <div class="tpproduct-details__title-area d-flex align-items-center flex-wrap mb-5">
        <h3 class="tpproduct-details__title"><?php the_title(); ?></h3>
        <?php if ( $stock ) : ?>
            <span class="tpproduct-details__stock"><?php echo esc_html__('In Stock', 'ninico');?></span>
        <?php else : ?>
            <span class="tpproduct-details__stock"><?php echo esc_html__('Out Of Stock', 'ninico');?></span>
        <?php endif; ?>
    </div>
    <div class="tpproduct-details__price mb-30">
        <?php woocommerce_template_single_price(); ?>
    </div>
    <div class="tpproduct-details__pera">
        <?php woocommerce_template_single_excerpt(); ?>
    </div>
    <div class="tpproduct-details__count d-flex align-items-center flex-wrap mb-15 product__action">

        <?php woocommerce_template_single_add_to_cart(); ?>

    </div>

    <?php woocommerce_template_single_meta(); ?>


<?php
    }
}
add_action( 'woocommerce_single_product_summary', 'ninico_content_single_details', 4 );



/*************************************************
## Free shipping progress bar.
*************************************************/
function ninico_shipping_progress_bar() {
        
        $total           = WC()->cart->get_displayed_subtotal();
        $limit           = get_theme_mod( 'shipping_progress_bar_amount' );
        $percent         = 100;


        if ( $total < $limit ) {
            $percent = floor( ( $total / $limit ) * 100 );
            $message = str_replace( '[remainder]', wc_price( $limit - $total ), get_theme_mod( 'shipping_progress_bar_message_initial') );
        } else {
            $message = get_theme_mod( 'shipping_progress_bar_message_success' );
        }
        
    ?>

<div class="tp-free-progress-bar">
    <div class="free-shipping-notice">
        <?php echo wp_kses( $message, 'post' ); ?>
    </div>
    <div class="tp-progress-bar">
        <span class="progress progress-bar progress-bar-striped progress-bar-animated"
            data-width="<?php echo esc_attr( $percent ); ?>%"></span>
    </div>
</div>

<?php
}
    
if(get_theme_mod( 'shipping_progress_bar_location_card_page',0) == '1'){
    add_action( 'woocommerce_before_cart_table',  'ninico_shipping_progress_bar' );
}

if(get_theme_mod( 'shipping_progress_bar_location_mini_cart',0) == '1'){
    add_action( 'woocommerce_before_mini_cart_contents', 'ninico_shipping_progress_bar' );
}

if(get_theme_mod( 'shipping_progress_bar_location_checkout',0) == '1'){
    add_action( 'woocommerce_checkout_before_customer_details', 'ninico_shipping_progress_bar' );
}


/*************************************************
## sale percentage
*************************************************/

function ninico_sale_percentage(){
   global $product;
   $output = '';

   if ( $product->is_on_sale() && $product->is_type( 'variable' ) ) {
      $percentage = ceil(100 - ($product->get_variation_sale_price() / $product->get_variation_regular_price( 'min' )) * 100);
      $output .= '<div class="product-percentage-badges"><span class="product__details-offer">'.$percentage.'%</span></div>';
   } elseif( $product->is_on_sale() && $product->get_regular_price()  && !$product->is_type( 'grouped' )) {
      $percentage = ceil(100 - ($product->get_sale_price() / $product->get_regular_price()) * 100);
      $output .= '<div class="product-percentage-badges">';
      $output .= '<span class="product__details-offer">'.$percentage.'%</span>';
      $output .= '</div>';
   }
   return $output;
}


// woocommerce mini cart content
add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
    ob_start();
    ?>
<div class="mini_shopping_cart_box">
    <?php woocommerce_mini_cart(); ?>
</div>
<?php $fragments['.mini_shopping_cart_box'] = ob_get_clean();
    return $fragments;
});

// woocommerce mini cart count icon
if ( ! function_exists( 'ninico_header_add_to_cart_fragment' ) ) {
    function ninico_header_add_to_cart_fragment( $fragments ) {
        ob_start();
        ?>
<span class="cart__count tp-cart-item">
    <?php echo esc_html( WC()->cart->cart_contents_count ); ?>
</span>
<?php
        $fragments['.tp-cart-item'] = ob_get_clean();

        return $fragments;
    }
}
add_filter( 'woocommerce_add_to_cart_fragments', 'ninico_header_add_to_cart_fragment' );


// product-content archive
if( !function_exists('ninico_content_product_grid') ) {
    function ninico_content_product_grid( ) {
        global $product;
        global $post;
        global $woocommerce;
        $rating = wc_get_rating_html($product->get_average_rating());
        $ratingcount = $product->get_review_count();

        $attachment_ids = $product->get_gallery_image_ids();

        foreach( $attachment_ids as $key => $attachment_id ) {
            $image_link =  wp_get_attachment_url( $attachment_id );
            $arr[] = $image_link;
        }
        
        ?>

<div class="col">
    <div class="tpproduct tpproductitem mb-15 p-relative">
        <div class="tpproduct__thumb">

            <?php if( has_post_thumbnail() ) : ?>
            <div class="tpproduct__thumbitem p-relative">
                <?php if( $product->is_on_sale()) : ?>
                <span class="tpproduct__thumb-topsall"><?php woocommerce_show_product_loop_sale_flash($post->ID); ?></span>
                <?php endif; ?>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                    <?php if(!empty($attachment_ids)) : ?>
                    <img class="thumbitem-secondary" src="<?php echo esc_url($arr[0]); ?>" alt="product-thumb">
                    <?php endif; ?>
                </a>

                <div class="tpproduct__thumb-bg">
                    <div class="tpproductactionbg product__action">
                        <?php woocommerce_template_loop_add_to_cart();?>
                        <?php if( function_exists( 'woosc_init' )) : ?>
                        <div class="product-action-btn ml-10 mr-10">
                            <?php echo do_shortcode('[woosc]');?>
                        </div>
                        <?php endif; ?>
                        <?php if( class_exists( 'WPCleverWoosq' )) : ?>
                        <?php echo do_shortcode('[woosq]'); ?>
                        <?php endif; ?>
                        <?php if( function_exists( 'woosw_init' )) : ?>
                        <div class="product-action-btn product-add-wishlist-btn mr-10 ml-10">
                            <?php echo do_shortcode('[woosw]'); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

        </div>
        <div class="tpproduct__content-area">
            <h3 class="tpproduct__title mb-5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="tpproduct__priceinfo p-relative">
                <div class="tpproduct__ammount">
                    <?php echo woocommerce_template_loop_price();?>
                </div>
            </div>
        </div>
        <div class="tpproduct__ratingarea">
            <div class="d-flex align-items-center justify-content-between">
                <div class="tpproduct__rating">
                    <ul>
                        <li>
                            <?php if(!empty($rating)) : ?>
                            <?php echo wp_kses_post($rating); ?>
                            <?php else : ?>
                            <a href="#"><i class="far fa-star"></i></a>
                            <a href="#"><i class="far fa-star"></i></a>
                            <a href="#"><i class="far fa-star"></i></a>
                            <a href="#"><i class="far fa-star"></i></a>
                            <a href="#"><i class="far fa-star"></i></a>
                            <?php endif; ?>
                        </li>
                        <li>
                            <span>(<?php echo esc_html($ratingcount); ?>)</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    }
}
add_action( 'woocommerce_before_shop_loop_item', 'ninico_content_product_grid', 10 );


// product-content
if( !function_exists('ninico_content_product_list') ) {
    function ninico_content_product_list( ) {
        global $product;
        global $post;
        global $woocommerce;
        $rating = wc_get_rating_html($product->get_average_rating());
        $ratingcount = $product->get_review_count();

        $attachment_ids = $product->get_gallery_image_ids();

        foreach( $attachment_ids as $key => $attachment_id ) {
            $image_link =  wp_get_attachment_url( $attachment_id );
            $arr[] = $image_link;
        }

        ?>

<div class="row mb-40">
    <div class="col-lg-4 col-md-12">
        <?php if(has_post_thumbnail() ) : ?>
        <div class="tpproduct__thumb">
            <div class="tpproduct__thumbitem p-relative">
                <?php if( $product->is_on_sale()) : ?>
                <span class="tpproduct__thumb-topsall"><?php woocommerce_show_product_loop_sale_flash($post->ID); ?></span>
                <?php endif; ?>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                    <?php if(!empty($image_link)) : ?>
                    <img class="thumbitem-secondary" src="<?php echo esc_url($arr[0]); ?>" alt="gallery-thumb">
                    <?php endif; ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <div class="col-lg-8 col-md-12">
        <div class="filter-product ml-20 pt-30">
            <h3 class="filter-product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="tpproduct__ammount">
                <?php echo woocommerce_template_loop_price();?>
            </div>
            <div class="tpproduct__rating mb-15">
                <ul>
                    <li>
                        <?php if(!empty($rating)) : ?>
                        <?php echo wp_kses_post($rating); ?>
                        <?php else : ?>
                        <a href="#"><i class="far fa-star"></i></a>
                        <a href="#"><i class="far fa-star"></i></a>
                        <a href="#"><i class="far fa-star"></i></a>
                        <a href="#"><i class="far fa-star"></i></a>
                        <a href="#"><i class="far fa-star"></i></a>
                        <?php endif; ?>
                    </li>
                    <li>
                        <span>(<?php echo esc_html($ratingcount); ?>)</span>
                    </li>
                </ul>
            </div>

            <?php if('' !== get_the_content()) : ?>
            <p><?php echo wp_trim_words( get_the_content(), 120, '...' ); ?></p>
            <?php elseif(!empty('woocommerce_template_single_excerpt')) : ?>
            <?php echo woocommerce_template_single_excerpt(); ?>
            <?php else : ?>
            <p><?php echo esc_html__('product content empty', 'ninico'); ?></p>
            <?php endif; ?>

            <div class="tpproduct__action product__action">
                <?php if( function_exists( 'woosc_init' )) : ?>
                <div class="product-action-btn comphare">
                    <?php echo do_shortcode('[woosc]');?>
                </div>
                <?php endif; ?>
                <?php if( class_exists( 'WPCleverWoosq' )) : ?>
                <?php echo do_shortcode('[woosq]'); ?>
                <?php endif; ?>
                <?php if( function_exists( 'woosw_init' )) : ?>
                <div class="product-action-btn product-add-wishlist-btn wishlist">
                    <?php echo do_shortcode('[woosw]'); ?>
                </div>
                <?php endif; ?>
                <?php woocommerce_template_loop_add_to_cart();?>
            </div>
        </div>
    </div>
</div>

<?php
    }
}
add_action( 'woocommerce_before_shop_loop_item_list', 'ninico_content_product_list', 10 );

// smart quickview
add_filter( 'woosq_button_html', 'gninico_woosq_button_html', 10, 2 );
function gninico_woosq_button_html( $output , $prodid ) {
    return $output = '<a href="#" class="icon-btn woosq-btn woosq-btn-' . esc_attr( $prodid ) . ' ' . get_option( 'woosq_button_class' ) . '" data-id="' . esc_attr( $prodid ) . '" data-effect="mfp-3d-unfold"><i class="fal fa-eye"></i></a>';
}



// product add to cart button
function woocommerce_template_loop_add_to_cart( $args = array() ) {
    global $product;

    $stock = $product->is_in_stock();

    $stock_class = $stock ? 'stock-available' : 'stock-out';

    $price = $product->get_regular_price();

    $price_class = $price ? NULL : 'price-empty';

        if ( $product ) {
            $defaults = array(
                'quantity'   => 1,
                'class'      => implode(
                    ' ',
                    array_filter(
                        array(
                            'cart-button icon-btn button '.$stock_class.' '.$price_class,
                            'product_type_' . $product->get_type(),
                            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                            $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                        )
                    )
                ),
                'attributes' => array(
                    'data-product_id'  => $product->get_id(),
                    'data-product_sku' => $product->get_sku(),
                    'aria-label'       => $product->add_to_cart_description(),
                    'rel'              => 'nofollow',
                ),
            );

            $args = wp_parse_args( $args, $defaults );

            if ( isset( $args['attributes']['aria-label'] ) ) {
                $args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
            }
        }


         // check product type 
         if( $product->is_type( 'simple' ) ){
            $btntext = esc_html__("Add to Cart",'ninico');
         } elseif( $product->is_type( 'variable' ) ){
            $btntext = esc_html__("Select Options",'ninico');
         } elseif( $product->is_type( 'external' ) ){
            $btntext = esc_html__("Buy Now",'ninico');
         } elseif( $product->is_type( 'grouped' ) ){
            $btntext = esc_html__("View Products",'ninico');
         }
         else{
            $btntext = "Add to Cart";
         } 

        echo sprintf( '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
            esc_url( $product->add_to_cart_url() ),
            esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
            esc_attr( isset( $args['class'] ) ? $args['class'] : 'cart-button icon-btn button '.$stock_class ),
            isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
            '<i class="fal fa-shopping-basket"></i>'
        );
}



add_action( 'wp_footer' , 'custom_quantity_fields_script' );

// custom_quantity_fields_script
function custom_quantity_fields_script(){
    ?>
<script type='text/javascript'>
jQuery(function($) {
    if (!String.prototype.getDecimals) {
        String.prototype.getDecimals = function() {
            var num = this,
                match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
            if (!match) {
                return 0;
            }
            return Math.max(0, (match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0));
        }
    }
    // Quantity "plus" and "minus" buttons
    $(document.body).on('click', '.plus, .minus', function() {
        var $qty = $(this).closest('.quantity').find('.qty'),
            currentVal = parseFloat($qty.val()),
            max = parseFloat($qty.attr('max')),
            min = parseFloat($qty.attr('min')),
            step = $qty.attr('step');

        // Format values
        if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
        if (max === '' || max === 'NaN') max = '';
        if (min === '' || min === 'NaN') min = 0;
        if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;

        // Change the value
        if ($(this).is('.plus')) {
            if (max && (currentVal >= max)) {
                $qty.val(max);
            } else {
                $qty.val((currentVal + parseFloat(step)).toFixed(step.getDecimals()));
            }
        } else {
            if (min && (currentVal <= min)) {
                $qty.val(min);
            } else if (currentVal > 0) {
                $qty.val((currentVal - parseFloat(step)).toFixed(step.getDecimals()));
            }
        }

        // Trigger change event
        $qty.trigger('change');
    });
});
</script>
<?php
}


// woocommerce_breadcrumb modilfy
if ( ! function_exists( 'woocommerce_breadcrumb' ) ) {

    /**
     * Output the WooCommerce Breadcrumb.
     *
     * @param array $args Arguments.
     */
    function woocommerce_breadcrumb( $args = array() ) {
        $args = wp_parse_args(
            $args,
            apply_filters(
                'woocommerce_breadcrumb_defaults',
                array(
                    'delimiter'   => '&nbsp;&#47;&nbsp;',
                    'wrap_before' => '<nav class="woocommerce-breadcrumb">',
                    'wrap_after'  => '</nav>',
                    'before'      => '',
                    'after'       => '',
                    'home'        => _x( 'Home', 'breadcrumb', 'ninico' ),
                )
            )
        );

        $breadcrumbs = new WC_Breadcrumb();

        if ( ! empty( $args['home'] ) ) {
            $breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
        }

        $args['breadcrumb'] = $breadcrumbs->generate();

        /**
         * WooCommerce Breadcrumb hook
         *
         * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
         */
        do_action( 'woocommerce_breadcrumb', $breadcrumbs, $args );

        wc_get_template( 'global/breadcrumb.php', $args );
    }
}