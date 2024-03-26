<?php
/**
 * ninico customizer
 *
 * @package ninico
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Added Panels & Sections
 */
function ninico_customizer_panels_sections( $wp_customize ) {

    //Add panel
    $wp_customize->add_panel( 'ninico_customizer', [
        'priority' => 10,
        'title'    => esc_html__( 'Ninico Customizer', 'ninico' ),
    ] );

    /**
     * Customizer Section
     */
    $wp_customize->add_section( 'header_top_setting', [
        'title'       => esc_html__( 'Header Top Setting', 'ninico' ),
        'description' => '',
        'priority'    => 10,
        'capability'  => 'edit_theme_options',
        'panel'       => 'ninico_customizer',
    ] );

    $wp_customize->add_section( 'header_social', [
        'title'       => esc_html__( 'Header Social', 'ninico' ),
        'description' => '',
        'priority'    => 11,
        'capability'  => 'edit_theme_options',
        'panel'       => 'ninico_customizer',
    ] );

    $wp_customize->add_section( 'section_header_logo', [
        'title'       => esc_html__( 'Header Setting', 'ninico' ),
        'description' => '',
        'priority'    => 12,
        'capability'  => 'edit_theme_options',
        'panel'       => 'ninico_customizer',
    ] );

    $wp_customize->add_section( 'section_preloader', [
        'title'       => esc_html__( 'Preloader Setting', 'ninico' ),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'ninico_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'ninico' ),
        'description' => '',
        'priority'    => 13,
        'capability'  => 'edit_theme_options',
        'panel'       => 'ninico_customizer',
    ] );

    $wp_customize->add_section( 'header_side_setting', [
        'title'       => esc_html__( 'Offcanvas Settings', 'ninico' ),
        'description' => '',
        'priority'    => 14,
        'capability'  => 'edit_theme_options',
        'panel'       => 'ninico_customizer',
    ] );

    $wp_customize->add_section( 'breadcrumb_setting', [
        'title'       => esc_html__( 'Breadcrumb Setting', 'ninico' ),
        'description' => '',
        'priority'    => 15,
        'capability'  => 'edit_theme_options',
        'panel'       => 'ninico_customizer',
    ] );

    $wp_customize->add_section( 'blog_setting', [
        'title'       => esc_html__( 'Blog Setting', 'ninico' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'ninico_customizer',
    ] );

    $wp_customize->add_section( 'footer_setting', [
        'title'       => esc_html__( 'Footer Settings', 'ninico' ),
        'description' => '',
        'priority'    => 16,
        'capability'  => 'edit_theme_options',
        'panel'       => 'ninico_customizer',
    ] );

    $wp_customize->add_section( 'color_setting', [
        'title'       => esc_html__( 'Color Setting', 'ninico' ),
        'description' => '',
        'priority'    => 17,
        'capability'  => 'edit_theme_options',
        'panel'       => 'ninico_customizer',
    ] );

    $wp_customize->add_section( '404_page', [
        'title'       => esc_html__( '404 Page', 'ninico' ),
        'description' => '',
        'priority'    => 18,
        'capability'  => 'edit_theme_options',
        'panel'       => 'ninico_customizer',
    ] );

    $wp_customize->add_section( 'shop_sections', [
        'title'       => esc_html__( 'Shop Settings ', 'ninico' ),
        'description' => '',
        'priority'    => 19,
        'capability'  => 'edit_theme_options',
        'panel'       => 'ninico_customizer',
    ] );

    $wp_customize->add_section( 'typo_setting', [
        'title'       => esc_html__( 'Typography Setting', 'ninico' ),
        'description' => '',
        'priority'    => 21,
        'capability'  => 'edit_theme_options',
        'panel'       => 'ninico_customizer',
    ] );

    $wp_customize->add_section( 'slug_setting', [
        'title'       => esc_html__( 'Slug Settings', 'ninico' ),
        'description' => '',
        'priority'    => 22,
        'capability'  => 'edit_theme_options',
        'panel'       => 'ninico_customizer',
    ] );
}

add_action( 'customize_register', 'ninico_customizer_panels_sections' );

function _header_top_fields( $fields ) {

    // header top
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_topbar_switch',
        'label'    => esc_html__( 'Topbar Swicher', 'ninico' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];

    // topbar text
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'ninico_header_top_text',
        'label'    => esc_html__( 'Header Top Text', 'ninico' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( 'Enjoy free shipping on orders $100 & up.', 'ninico' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'ninico_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ]
        ],
    ];

    // topbar right text
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'ninico_header_top_right_text',
        'label'    => esc_html__( 'Header Top Right Text', 'ninico' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( 'Header Right Text Here.', 'ninico' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'ninico_topbar_switch',
                'operator' => '==',
                'value'    => true,
            ]
        ],
    ];

    // preloader switch
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_preloader_switch',
        'label'    => esc_html__( 'Preloader On/Off', 'ninico' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];  

    // back to top
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_backtotop',
        'label'    => esc_html__( 'Back To Top On/Off', 'ninico' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];

    // right enable disable
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_header_right',
        'label'    => esc_html__( 'Header Right On/Off', 'ninico' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];    

    // search on off
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_header_search',
        'label'    => esc_html__( 'Header Search On/Off', 'ninico' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];

    // Language on off
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_header_lang',
        'label'    => esc_html__( 'Language On/Off', 'ninico' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];
    
    // multicurrency on off
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_header_multicurrency',
        'label'    => esc_html__( 'Multicurrency On/Off', 'ninico' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];
    
    
    // multicurrency shortcode
    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_header_multicurrency_shortcode',
        'label'    => esc_html__( 'Insert Language Short', 'ninico' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( '[short here]', 'ninico' ),
        'description' => esc_html__('this theme suggest to use "FOX - Currency Switcher Professional for WooCommerce" plugin"s shortcode.', 'ninico'),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'ninico_header_multicurrency',
                'operator' => '==',
                'value'    => true,
            ]
        ],
    ];

    // login on off
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_header_login',
        'label'    => esc_html__( 'Login On/Off', 'ninico' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];

    // cart on off
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_header_cart',
        'label'    => esc_html__( 'Cart On/Off', 'ninico' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];

    // wishlist on off
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_header_wishlist',
        'label'    => esc_html__( 'Wishlist On/Off', 'ninico' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];

    // wishlist link
    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_header_wishlist_link',
        'label'    => esc_html__( 'Wishlist Link', 'ninico' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( '#', 'ninico' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'ninico_header_wishlist',
                'operator' => '==',
                'value'    => true,
            ]
        ],
    ];

    // avatar
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_header_avatar',
        'label'    => esc_html__( 'Header Avatar On/Off', 'ninico' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ]; 

    // product category menu
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_header_pcat_menu',
        'label'    => esc_html__( 'Header Category Menu On/Off', 'ninico' ),
        'section'  => 'header_top_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];    

    // cat title
    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_header_pcat_title',
        'label'    => esc_html__( 'Category Title', 'ninico' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( 'Categories', 'ninico' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'ninico_header_pcat_menu',
                'operator' => '==',
                'value'    => true,
            ]
        ],
    ];

    // cat bottom text
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'ninico_header_pcat_text',
        'label'    => esc_html__( 'Category Bottom Text', 'ninico' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( 'New Arrival', 'ninico' ),
        'priority' => 10,
        'active_callback' => [
            [
                'setting'  => 'ninico_header_pcat_menu',
                'operator' => '==',
                'value'    => true,
            ]
        ],
    ];

    // phone
    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_phone_num',
        'label'    => esc_html__( 'Phone', 'ninico' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( '+964 742 44 763', 'ninico' ),
        'priority' => 10,
    ];

    // address
    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_header_address',
        'label'    => esc_html__( 'Address', 'ninico' ),
        'section'  => 'header_top_setting',
        'default'  => esc_html__( 'New York.', 'ninico' ),
        'priority' => 10,
    ];        


    return $fields;

}
add_filter( 'kirki/fields', '_header_top_fields' );

/*
Header Social
 */
function _header_social_fields( $fields ) {

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_social_switch',
        'label'    => esc_html__( 'Social On/Off', 'ninico' ),
        'section'  => 'header_social',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];

    // header section social
    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_topbar_fb_url',
        'label'    => esc_html__( 'Facebook Url', 'ninico' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'ninico' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_topbar_twitter_url',
        'label'    => esc_html__( 'Twitter Url', 'ninico' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'ninico' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_topbar_behance_url',
        'label'    => esc_html__( 'Behance Url', 'ninico' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'ninico' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_topbar_instagram_url',
        'label'    => esc_html__( 'Instagram Url', 'ninico' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'ninico' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_topbar_youtube_url',
        'label'    => esc_html__( 'Youtube Url', 'ninico' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'ninico' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_topbar_linkedin_url',
        'label'    => esc_html__( 'Linkedin Url', 'ninico' ),
        'section'  => 'header_social',
        'default'  => esc_html__( '#', 'ninico' ),
        'priority' => 10,
    ];


    return $fields;
}
add_filter( 'kirki/fields', '_header_social_fields' );

/*
Header Settings
 */
function _header_header_fields( $fields ) {
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_header',
        'label'       => esc_html__( 'Select Header Style', 'ninico' ),
        'section'     => 'section_header_logo',
        'placeholder' => esc_html__( 'Select an option...', 'ninico' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'header-style-1'   => get_template_directory_uri() . '/inc/img/header/header-1.png',
            'header-style-2' => get_template_directory_uri() . '/inc/img/header/header-2.png',
            'header-style-3'  => get_template_directory_uri() . '/inc/img/header/header-3.png',
            'header-style-4'  => get_template_directory_uri() . '/inc/img/header/header-4.png',
            'header-style-5'  => get_template_directory_uri() . '/inc/img/header/header-5.png',
        ],
        'default'     => 'header-style-1',
    ]; 

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'logo',
        'label'       => esc_html__( 'Header Logo', 'ninico' ),
        'description' => esc_html__( 'Upload Your Logo.', 'ninico' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo.png',
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'seconday_logo',
        'label'       => esc_html__( 'Header Secondary Logo', 'ninico' ),
        'description' => esc_html__( 'Header Logo Black', 'ninico' ),
        'section'     => 'section_header_logo',
        'default'     => get_template_directory_uri() . '/assets/img/logo/logo-white.png',
    ];
    return $fields;
}
add_filter( 'kirki/fields', '_header_header_fields' );

/*
Header Side Info
 */
function _header_side_fields( $fields ) {

    // side info settings
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_offcanvas_hide',
        'label'    => esc_html__( 'Offcanvas Info On/Off', 'ninico' ),
        'section'  => 'header_side_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];  

    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_offcanvas_desc_title',
        'label'    => esc_html__( 'Description Title', 'ninico' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( 'We help to create visual strategies.', 'ninico' ),
        'priority' => 10,
    ];

    // side btn 1
    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_side_btn_title',
        'label'    => esc_html__( 'Button Title 1', 'ninico' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( 'Login / Register', 'ninico' ),
        'priority' => 10,
    ];

    // side btn 1 url
    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_side_btn_url',
        'label'    => esc_html__( 'Button URL 1', 'ninico' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( '#', 'ninico' ),
        'priority' => 10,
    ];

    // side btn 2
    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_side_btn_title_2',
        'label'    => esc_html__( 'Button Title 2', 'ninico' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( 'Wishlist', 'ninico' ),
        'priority' => 10,
    ];

    // side btn 2 url
    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_side_btn_url_2',
        'label'    => esc_html__( 'Button URL 2', 'ninico' ),
        'section'  => 'header_side_setting',
        'default'  => esc_html__( '#', 'ninico' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', '_header_side_fields' );

/*
_header_page_title_fields
 */
function _header_page_title_fields( $fields ) {

    // Breadcrumb Setting
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'breadcrumb_bg_img',
        'label'       => esc_html__( 'Breadcrumb Background Image', 'ninico' ),
        'description' => esc_html__( 'Breadcrumb Background Image', 'ninico' ),
        'section'     => 'breadcrumb_setting',
    ];
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'ninico_breadcrumb_bg_color',
        'label'       => __( 'Breadcrumb BG Color', 'ninico' ),
        'description' => esc_html__( 'This is a Breadcrumb bg color control.', 'ninico' ),
        'section'     => 'breadcrumb_setting',
        'default'     => '#F0F1F3',
        'priority'    => 10,
    ];

    return $fields;
}
add_filter( 'kirki/fields', '_header_page_title_fields' );

/*
Header Social
 */
function _header_blog_fields( $fields ) {
// Blog Setting
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_blog_btn_switch',
        'label'    => esc_html__( 'Blog BTN On/Off', 'ninico' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_blog_single_social',
        'label'    => esc_html__( 'Blog Share On/Off', 'ninico' ),
        'section'  => 'blog_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_blog_cat',
        'label'    => esc_html__( 'Blog Category Meta On/Off', 'ninico' ),
        'section'  => 'blog_setting',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_blog_author',
        'label'    => esc_html__( 'Blog Author Meta On/Off', 'ninico' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_blog_date',
        'label'    => esc_html__( 'Blog Date Meta On/Off', 'ninico' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];
    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_blog_comments',
        'label'    => esc_html__( 'Blog Comments Meta On/Off', 'ninico' ),
        'section'  => 'blog_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_blog_btn',
        'label'    => esc_html__( 'Blog Button text', 'ninico' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Read More', 'ninico' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title',
        'label'    => esc_html__( 'Blog Title', 'ninico' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog', 'ninico' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'breadcrumb_blog_title_details',
        'label'    => esc_html__( 'Blog Details Title', 'ninico' ),
        'section'  => 'blog_setting',
        'default'  => esc_html__( 'Blog Details', 'ninico' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', '_header_blog_fields' );

/*
Footer
 */
function _header_footer_fields( $fields ) {
    // Footer Setting
    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'choose_default_footer',
        'label'       => esc_html__( 'Choose Footer Style', 'ninico' ),
        'section'     => 'footer_setting',
        'default'     => '5',
        'placeholder' => esc_html__( 'Select an option...', 'ninico' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'footer-style-1'   => get_template_directory_uri() . '/inc/img/footer/footer-1.png',
            'footer-style-2' => get_template_directory_uri() . '/inc/img/footer/footer-2.png',
        ],
        'default'     => 'footer-style-1',
    ];

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'footer_widget_number',
        'label'       => esc_html__( 'Widget Number', 'ninico' ),
        'section'     => 'footer_setting',
        'default'     => '4',
        'placeholder' => esc_html__( 'Select an option...', 'ninico' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            '4' => esc_html__( 'Widget Number 4', 'ninico' ),
            '3' => esc_html__( 'Widget Number 3', 'ninico' ),
            '2' => esc_html__( 'Widget Number 2', 'ninico' ),
        ],
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'ninico_footer_bg',
        'label'       => esc_html__( 'Footer Background Image.', 'ninico' ),
        'description' => esc_html__( 'Footer Background Image.', 'ninico' ),
        'section'     => 'footer_setting',
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'ninico_footer_bg_color',
        'label'       => __( 'Footer BG Color', 'ninico' ),
        'description' => esc_html__( 'This is a Footer bg color control.', 'ninico' ),
        'section'     => 'footer_setting',
        'default'     => '#f8f8f8',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'        => 'color',
        'settings'    => 'ninico_footer_bottom_color',
        'label'       => __( 'Footer Bottom Color', 'ninico' ),
        'description' => esc_html__( 'This is a Footer bottom color control.', 'ninico' ),
        'section'     => 'footer_setting',
        'default'     => '#ededed',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'        => 'textarea',
        'settings'    => 'ninico_footer_left_link',
        'label'       => __( 'Footer Bottom Left Links', 'ninico' ),
        'description' => esc_html__( 'Example: <a href="your-link">Link Text</a>.', 'ninico' ),
        'section'     => 'footer_setting',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'        => 'textarea',
        'settings'    => 'ninico_footer_right_link',
        'label'       => __( 'Footer Bottom Right Links', 'ninico' ),
        'description' => esc_html__( 'Example: <a href="your-link">Link Text</a>.', 'ninico' ),
        'section'     => 'footer_setting',
        'priority'    => 10,
    ];

    $fields[] = [
        'type'        => 'image',
        'settings'    => 'ninico_footer_payment',
        'label'       => esc_html__( 'Footer Payment Image.', 'ninico' ),
        'description' => esc_html__( 'Footer Payment Image.', 'ninico' ),
        'section'     => 'footer_setting',
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'footer_style_2_switch',
        'label'    => esc_html__( 'Footer Style 2 On/Off', 'ninico' ),
        'section'  => 'footer_setting',
        'default'  => '1',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_copyright',
        'label'    => esc_html__( 'Copyright', 'ninico' ),
        'section'  => 'footer_setting',
        'default'  => esc_html__( 'Copyright &copy; 2023 Theme_Pure. All Rights Reserved', 'ninico' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', '_header_footer_fields' );

// color
function ninico_color_fields( $fields ) {
    // Color Settings 1
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'ninico_theme_color_1',
        'label'       => __( 'Theme Color', 'ninico' ),
        'description' => esc_html__( 'This is a Theme color control.', 'ninico' ),
        'section'     => 'color_setting',
        'default'     => '#d51243',
        'priority'    => 10,
    ];

    // Color Settings 2
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'ninico_theme_color_2',
        'label'       => __( 'Theme Heading Color', 'ninico' ),
        'description' => esc_html__( 'This is a Theme color control.', 'ninico' ),
        'section'     => 'color_setting',
        'default'     => '#040404',
        'priority'    => 10,
    ];
    
    // Color Settings body
    $fields[] = [
        'type'        => 'color',
        'settings'    => 'ninico_body_color',
        'label'       => __( 'Theme Body Color', 'ninico' ),
        'description' => esc_html__( 'This is a Theme color control.', 'ninico' ),
        'section'     => 'color_setting',
        'default'     => '#777777',
        'priority'    => 10,
    ];

    return $fields;
}
add_filter( 'kirki/fields', 'ninico_color_fields' );

// 404
function ninico_404_fields( $fields ) {
    // 404 settings
    $fields[] = [
        'type'        => 'image',
        'settings'    => 'ninico_404_bg',
        'label'       => esc_html__( '404 Image.', 'ninico' ),
        'description' => esc_html__( '404 Image.', 'ninico' ),
        'section'     => '404_page',
        'default'     => get_template_directory_uri() . '/assets/img/icon/error.png'
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_error_title',
        'label'    => esc_html__( 'Not Found Title', 'ninico' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Oops! Page not found', 'ninico' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'textarea',
        'settings' => 'ninico_error_desc',
        'label'    => esc_html__( '404 Description Text', 'ninico' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Whoops, this is embarassing. Looks like the page you were looking for was not found.', 'ninico' ),
        'priority' => 10,
    ];
    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_error_link_text',
        'label'    => esc_html__( '404 Link Text', 'ninico' ),
        'section'  => '404_page',
        'default'  => esc_html__( 'Back To Home', 'ninico' ),
        'priority' => 10,
    ];
    return $fields;
}
add_filter( 'kirki/fields', 'ninico_404_fields' );

// course_settings
function ninico_learndash_fields( $fields ) {

    $fields[] = [
        'type'     => 'number',
        'settings' => 'ninico_learndash_post_number',
        'label'    => esc_html__( 'Learndash Post Per page', 'ninico' ),
        'section'  => 'learndash_course_settings',
        'default'  => 6,
        'priority' => 10,
    ];

    $fields[] = [
        'type'        => 'select',
        'settings'    => 'ninico_learndash_order',
        'label'       => esc_html__( 'Post Order', 'ninico' ),
        'section'     => 'learndash_course_settings',
        'default'     => 'DESC',
        'placeholder' => esc_html__( 'Select an option...', 'ninico' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'ASC' => esc_html__( 'ASC', 'ninico' ),
            'DESC' => esc_html__( 'DESC', 'ninico' ),
        ],
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_learndash_related',
        'label'    => esc_html__( 'Show Related?', 'ninico' ),
        'section'  => 'learndash_course_settings',
        'default'  => 1,
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];

    return $fields;

}

if ( class_exists( 'SFWD_LMS' ) ) {
add_filter( 'kirki/fields', 'ninico_learndash_fields' );
}


// shopsettings
function ninico_shop_fields( $fields ) {
    $fields[] = [
        'type' => 'toggle',
        'settings' => 'bacola_free_shipping',
        'label' => esc_attr__( 'Free shipping bar', 'ninico' ),
        'section' => 'shop_sections',
        'default' => '0',
    ];     

    $fields[] = [
        'type' => 'text',
        'settings' => 'shipping_progress_bar_amount',
        'label' => esc_attr__( 'Goal Amount', 'ninico' ),
        'description' => esc_attr__( 'Amount to reach 100% defined in your currency absolute value. For example: 300', 'ninico' ),
        'section' => 'shop_sections',
        'default' => '100',
        'required' => array(
            array(
              'setting'  => 'bacola_free_shipping',
              'operator' => '==',
              'value'    => '1',
            ),
        ),
    ];     

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'shipping_progress_bar_location_mini_cart',
        'label' => esc_attr__( 'Mini cart', 'ninico' ),
        'section' => 'shop_sections',
        'default' => '0',
        'required' => array(
            array(
              'setting'  => 'bacola_free_shipping',
              'operator' => '==',
              'value'    => '1',
            ),
        ),
    ];  

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'shipping_progress_bar_location_card_page',
        'label' => esc_attr__( 'Cart page', 'ninico' ),
        'section' => 'shop_sections',
        'default' => '0',
        'required' => array(
            array(
              'setting'  => 'bacola_free_shipping',
              'operator' => '==',
              'value'    => '1',
            ),
        ),
    ];      

    $fields[] = [
        'type' => 'toggle',
        'settings' => 'shipping_progress_bar_location_checkout',
        'label' => esc_attr__( 'Checkout page', 'ninico' ),
        'section' => 'shop_sections',
        'default' => '0',
        'required' => array(
            array(
              'setting'  => 'bacola_free_shipping',
              'operator' => '==',
              'value'    => '1',
            ),
        ),
    ];   

    $fields[] = [
        'type' => 'textarea',
        'settings' => 'shipping_progress_bar_message_initial',
        'label' => esc_attr__( 'Initial Message', 'ninico' ),
        'description' => esc_attr__( 'Message to show before reaching the goal. Use shortcode [remainder] to display the amount left to reach the minimum.', 'ninico' ),
        'section' => 'shop_sections',
        'default' => 'Add [remainder] to cart and get free shipping!',
        'required' => array(
            array(
              'setting'  => 'bacola_free_shipping',
              'operator' => '==',
              'value'    => '1',
            ),
        ),
    ];    

    $fields[] = [
        'type' => 'textarea',
        'settings' => 'shipping_progress_bar_message_success',
        'label' => esc_attr__( 'Success message', 'ninico' ),
        'description' => esc_attr__( 'Message to show after reaching 100%.', 'ninico' ),
        'section' => 'shop_sections',
        'default' => 'Your order qualifies for free shipping!',
        'required' => array(
            array(
              'setting'  => 'bacola_free_shipping',
              'operator' => '==',
              'value'    => '1',
            ),
        ),
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'ninico_g_switch',
        'label'    => esc_html__( 'Active Product Details Feature', 'ninico' ),
        'section'  => 'shop_sections',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
    ];

    // repeater start
    $fields[] = [
        'type'     => 'repeater',
        'label'    => esc_html__( 'Product Special Features', 'ninico' ),
        'section'  => 'shop_sections',
        'row_label'=> [
        'type'     => 'text',
        'value'    => esc_html__( 'Features Number', 'ninico' ),
    ],
        
    'button_label' => esc_html__('Add new Gallery Item', 'ninico' ),

    'settings'     => 'ninico_side_gallery_items',
        'fields' => [
            'ninico_g_image' => [
                'type'         => 'image',
                'label'        => esc_html__( 'Icon Image', 'ninico' ),
                'description'  => esc_attr__( 'Upload Icon Image', 'ninico' ),
            ],
            'ninico_g_icon' => [
                'type'         => 'text',
                'label'        => esc_html__( 'Icon Class', 'ninico' ),
                'description'  => esc_attr__( 'Insert Icon Class', 'ninico' ),
            ],
            'ninico_g_txt' => [
                'type'         => 'textarea',
                'label'        => esc_html__( 'Features Title', 'ninico' ),
                'description'  => esc_attr__( 'write feature content..', 'ninico' ),
            ]
        ]
    ];
    // repeater end

    return $fields;
}

if (  class_exists( 'WooCommerce' ) ) {
    add_filter( 'kirki/fields', 'ninico_shop_fields' );
}


/**
 * Added Fields
 */
function ninico_typo_fields( $fields ) {
    // typography settings
    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_body_setting',
        'label'       => esc_html__( 'Body Font', 'ninico' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'body',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h_setting',
        'label'       => esc_html__( 'Heading h1 Fonts', 'ninico' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h1',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h2_setting',
        'label'       => esc_html__( 'Heading h2 Fonts', 'ninico' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h2',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h3_setting',
        'label'       => esc_html__( 'Heading h3 Fonts', 'ninico' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h3',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h4_setting',
        'label'       => esc_html__( 'Heading h4 Fonts', 'ninico' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h4',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h5_setting',
        'label'       => esc_html__( 'Heading h5 Fonts', 'ninico' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h5',
            ],
        ],
    ];

    $fields[] = [
        'type'        => 'typography',
        'settings'    => 'typography_h6_setting',
        'label'       => esc_html__( 'Heading h6 Fonts', 'ninico' ),
        'section'     => 'typo_setting',
        'default'     => [
            'font-family'    => '',
            'variant'        => '',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '0',
            'color'          => '',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h6',
            ],
        ],
    ];
    return $fields;
}

add_filter( 'kirki/fields', 'ninico_typo_fields' );


// course_settings
function ninico_course_fields( $fields ) {

    $fields[] = [
        'type'        => 'radio-image',
        'settings'    => 'course_style',
        'label'       => esc_html__( 'Select Course Style', 'ninico' ),
        'section'     => 'tutor_course_settings',
        'default'     => '5',
        'placeholder' => esc_html__( 'Select an option...', 'ninico' ),
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => [
            'standard'   => get_template_directory_uri() . '/inc/img/course/course-1.jpg',
            'course_with_sidebar' => get_template_directory_uri() . '/inc/img/course/course-2.jpg',
            'course_solid'  => get_template_directory_uri() . '/inc/img/course/course-3.jpg',
        ],
        'default'     => 'standard',
    ];

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'course_search_switch',
        'label'    => esc_html__( 'Show search?', 'ninico' ),
        'section'  => 'tutor_course_settings',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
        'active_callback' => [
            [
                'setting'  => 'course_with_sidebar',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];    

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'course_latest_post_switch',
        'label'    => esc_html__( 'Show latest post?', 'ninico' ),
        'section'  => 'tutor_course_settings',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
        'active_callback' => [
            [
                'setting'  => 'course_with_sidebar',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];    

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'course_category_switch',
        'label'    => esc_html__( 'Show category filter?', 'ninico' ),
        'section'  => 'tutor_course_settings',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
        'active_callback' => [
            [
                'setting'  => 'course_with_sidebar',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];    

    $fields[] = [
        'type'     => 'switch',
        'settings' => 'course_skill_switch',
        'label'    => esc_html__( 'Show skill filter?', 'ninico' ),
        'section'  => 'tutor_course_settings',
        'default'  => '0',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'ninico' ),
            'off' => esc_html__( 'Disable', 'ninico' ),
        ],
        'active_callback' => [
            [
                'setting'  => 'course_with_sidebar',
                'operator' => '==',
                'value'    => true,
            ],
        ],
    ];

    return $fields;

}

add_filter( 'kirki/fields', 'ninico_course_fields' );




/**
 * Added Fields
 */
function ninico_slug_setting( $fields ) {
    // slug settings
    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_ev_slug',
        'label'    => esc_html__( 'Event Slug', 'ninico' ),
        'section'  => 'slug_setting',
        'default'  => esc_html__( 'ourevent', 'ninico' ),
        'priority' => 10,
    ];

    $fields[] = [
        'type'     => 'text',
        'settings' => 'ninico_port_slug',
        'label'    => esc_html__( 'Portfolio Slug', 'ninico' ),
        'section'  => 'slug_setting',
        'default'  => esc_html__( 'ourportfolio', 'ninico' ),
        'priority' => 10,
    ];

    return $fields;
}

add_filter( 'kirki/fields', 'ninico_slug_setting' );


/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function ninico_THEME_option( $name ) {
    $value = '';
    if ( class_exists( 'ninico' ) ) {
        $value = Kirki::get_option( ninico_get_theme(), $name );
    }

    return apply_filters( 'ninico_THEME_option', $value, $name );
}

/**
 * Get config ID
 *
 * @return string
 */
function ninico_get_theme() {
    return 'ninico';
}