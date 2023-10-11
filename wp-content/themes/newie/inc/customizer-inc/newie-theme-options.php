<?php

/* Hide/Show Breadcrumb Section */
$wp_customize          -> add_setting( 'newie_theme_options[hide-breadcrumb-at-home]',
 array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['hide-breadcrumb-at-home'],
        'sanitize_callback' => 'newie_sanitize_checkbox'
      ) );

$wp_customize           -> add_control('newie_theme_options[hide-breadcrumb-at-home]',
            array(
                    'label'     => __( 'Hide/Show Breadcrumb On Home Page', 'newie'),
                    'section'   => 'static_front_page',
                    'type'      => 'checkbox',
                    'priority'  => 10
                 )
    );



// Setting site primary color.
$wp_customize->add_setting( 'newie_theme_options[primary_color]',
    array(
        'default'           => $defaults['primary_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'newie_theme_options[primary_color]',
        array(
            'label'       => esc_html__( 'Primary Color', 'newie' ),
            'description' => esc_html__( 'Applied to main color of site.', 'newie' ),
            'section'     => 'colors',  
        )
    )
);

    // Overlay Color Picker control. 
        $wp_customize->add_setting(           
             'newie_separator',
                array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                )
        );
        $wp_customize->add_control(new Newie_Customize_Section_Separator(
            $wp_customize, 
                'newie_separator', 
                array(
                    'type'      => 'newie_separator',
                    'label' => esc_html__( 'Slider Caption Background Color', 'newie' ),
                    'section'   => 'colors',
                    'priority'  => 110,
                )                   
            )
        );

    // Overlay Color Picker control. 
     $wp_customize->add_setting(
        'newie_theme_options[slider_caption_bg_color]',
        array(
           'default'     =>  $defaults['slider_caption_bg_color'],
           'type'       => 'theme_mod',
           'capability'  => 'edit_theme_options',
           'sanitize_callback' => 'newie_sanitize_rgba',
          

        )
    );
    $wp_customize->add_control(
        new Newie_Color_Control(
            $wp_customize,
             'newie_theme_options[slider_caption_bg_color]',
            array(
              
                'section' => 'colors',
                'priority' => 110,
                
            )
        )
    );

/**
 * Theme Option
 *
 * @since 1.0.0
 */
$wp_customize->add_panel(
    'newie_theme_options', 
    	array(
        		'priority'       => 200,
            	'capability'     => 'edit_theme_options',
            	'theme_supports' => '',
            	'title'          => esc_html__( 'Theme Option', 'newie' ),
             ) 
);


   /*adding sections for Breadcrumbs for pages/posts*/
$wp_customize->add_section( 'breadcrumb_type',
 array(
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'title'          => __( 'Breadcrumbs Section', 'newie' ),
        'panel'          => 'newie_theme_options',
      

      ) );

/* breadcrumb_option*/
$wp_customize->add_setting( 'newie_theme_options[breadcrumb_option]',
 array(
            'capability'        => 'edit_theme_options',
            'default'           => $defaults['breadcrumb_option'],
            'sanitize_callback' => 'newie_sanitize_select'
      ) );

$wp_customize->add_control('newie_theme_options[breadcrumb_option]',
    array(
        'label' => esc_html__('Breadcrumb Options', 'newie'),
         'section'   => 'breadcrumb_type',
        'settings'  => 'newie_theme_options[breadcrumb_option]',
        'choices'   => array(
        'simple'     => esc_html__('Simple', 'newie'),
        'disable'    => esc_html__('Disable', 'newie'),
          ),
        'type' => 'select',
        'priority' => 10
    )
);


    /*adding sections for category section in front page*/
$wp_customize->add_section( 'newie-feature-category',
 array(
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'title'          => __( 'Featured Section', 'newie' ),
        'panel'          => 'newie_theme_options',
        'description'    => __( 'Recommended image for slider is 1920*700', 'newie' )

      ) );

/* feature cat selection */
$wp_customize->add_setting( 'newie_theme_options[newie-feature-cat]',
 array(
            'capability'		=> 'edit_theme_options',
            'default'			=> $defaults['newie-feature-cat'],
            'sanitize_callback' => 'absint'
      ) );

$wp_customize->add_control(
    new Newie_Customize_Category_Dropdown_Control(
        $wp_customize,
        'newie_theme_options[newie-feature-cat]',
        array(
                'label'		=> __( 'Select Category', 'newie' ),
                'section'   => 'newie-feature-category',
                'settings'  => 'newie_theme_options[newie-feature-cat]',
                'type'	  	=> 'category_dropdown',
                'priority'  => 10
             )
    )
);


/* Hide/Show Slider Post in Category Section */

$wp_customize          -> add_setting( 'newie_theme_options[hide-slider-post-at-category]',
 array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['hide-slider-post-at-category'],
        'sanitize_callback' => 'newie_sanitize_checkbox'
      ) );

$wp_customize           -> add_control('newie_theme_options[hide-slider-post-at-category]',
            array(
                    'label'     => __( 'Show Slider Post on Category Post', 'newie'),
                    'section'   => 'newie-feature-category',
                    'type'      => 'checkbox',
                    'priority'  => 10
                 )
    );




/*adding sections for category selection for promo section in homepage*/
$wp_customize->add_section( 'newie-promo-category', 
    array(
            'priority'       => 160,
            'capability'     => 'edit_theme_options',
            'title'          => __( 'Promo Section', 'newie' ),
            'panel'          => 'newie_theme_options',
            'description'    => __( 'Recommended image for col section is 600*600', 'newie' )
         ) );

/* feature cat selection */
$wp_customize->add_setting( 'newie_theme_options[newie-promo-cat]',
 array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $defaults['newie-promo-cat'],
        'sanitize_callback' => 'absint'
       ) );

$wp_customize->add_control(
    new Newie_Customize_Category_Dropdown_Control(
        $wp_customize,
        'newie_theme_options[newie-promo-cat]',
        array(
            'label'		=> __( 'Select Category', 'newie' ),
            'section'   => 'newie-promo-category',
            'settings'  => 'newie_theme_options[newie-promo-cat]',
            'type'	  	=> 'category_dropdown',
            'priority'  => 10
        )
    )
);


/*adding sections for category selection for promo section in homepage*/
$wp_customize        -> add_section( 'newie-site-layout',
 array(
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'panel'          => 'newie_theme_options',
        'title'          => __( 'Design Layout', 'newie' )
      ) );

/* Sidebar selection */
$wp_customize          -> add_setting( 'newie_theme_options[newie-layout]',
 array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $defaults['newie-layout'],
        'sanitize_callback' => 'newie_sanitize_select'
      ) );

$choices                = newie_sidebar_layout();
$wp_customize           -> add_control('newie_theme_options[newie-layout]',
            array(
                    'choices'   => $choices,
                    'label'		=> __( 'Select Design Layout', 'newie'),
                    'section'   => 'newie-site-layout',
                    'settings'  => 'newie_theme_options[newie-layout]',
                    'type'	  	=> 'select',
                    'priority'  => 10
                 )
    );

  /**
     * Related Posts title
     */
    $wp_customize->add_setting(
        'newie_theme_options[newie-realted-post-title]',
        array(
                'default'           => $defaults['newie-realted-post-title'],
                'sanitize_callback' => 'sanitize_text_field',
             )
    );
    $wp_customize->add_control('newie_theme_options[newie-realted-post-title]',
        array(
                'label'      => esc_html__('Related Posts title ','newie'),
                'section'   => 'newie-site-layout',
                'settings'  => 'newie_theme_options[newie-realted-post-title]',
                'type'      => 'text',
                'priority'  => 10
             )
    );



/* Related post Section */
$wp_customize          -> add_setting( 'newie_theme_options[newie-realted-post]',
 array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['newie-realted-post'],
        'sanitize_callback' => 'newie_sanitize_checkbox'
      ) );

$wp_customize           -> add_control('newie_theme_options[newie-realted-post]',
            array(
                    'label'     => __( 'Hide/Show Related Post', 'newie'),
                    'section'   => 'newie-site-layout',
                    'settings'  => 'newie_theme_options[newie-realted-post]',
                    'type'      => 'checkbox',
                    'priority'  => 10
                 )
    );


/*adding sections for footer options*/
    $wp_customize        -> add_section( 'newie-footer-option', 
        array(
                'priority'       => 170,
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'panel'          => 'newie_theme_options',
                'title'          => __( 'Footer Option', 'newie' )
             ) );

    /*copyright*/
    $wp_customize           -> add_setting( 'newie_theme_options[newie-footer-copyright]',
      array(
                'capability'        => 'edit_theme_options',
                'default'           => $defaults['newie-footer-copyright'],
                'sanitize_callback' => 'wp_kses_post'
            ) );
    $wp_customize   -> 
    add_control( 'newie-footer-copyright',
     array(
            'label'     => __( 'Copyright Text', 'newie' ),
            'section'   => 'newie-footer-option',
            'settings'  => 'newie_theme_options[newie-footer-copyright]',
            'type'      => 'text',
            'priority'  => 10
          ) );


