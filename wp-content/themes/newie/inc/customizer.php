<?php
/**
 * newie Theme Customizer.
 *
 * @package newie
 */


/**
 * Sanitizing the select callback example
 *
 * @since newie 1.0.0
 *
 * @see sanitize_key()https://developer.wordpress.org/reference/functions/sanitize_key/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('newie_sanitize_select') ) :
    function newie_sanitize_select( $input, $setting ) 
   {

        // Ensure input is a slug.
        $input = sanitize_key( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }
endif;


/**
 * Sanitize checkbox field
 *
 * @since Newie 1.0.0
 *
 * @param $checked
 * @return Boolean
 */
if ( !function_exists('newie_sanitize_checkbox') ) :
    function newie_sanitize_checkbox( $checked ) {
        // Boolean check.
        return ( ( isset( $checked ) && true == $checked ) ? true : false );
    }
endif;
/**
 * Sanitize RGBA color field
 *
 * @since Newie 1.0.0
 *
 * @param $checked
 * @return Boolean
 */
function newie_sanitize_rgba( $color ) {
    if ( empty( $color ) || is_array( $color ) )
        return 'rgba(0,0,0,0)';

    // If string does not start with 'rgba', then treat as hex
    // sanitize the hex color and finally convert hex to rgba
    if ( false === strpos( $color, 'rgba' ) ) {
        return sanitize_hex_color( $color );
    }

    // By now we know the string is formatted as an rgba color so we need to further sanitize it.
    $color = str_replace( ' ', '', $color );
    sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
    return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';
}

/**
 * Sidebar layout options
 *
 * @since newie 1.0.0
 *
 * @param null
 * @return array $newie_sidebar_layout
 *
 */
if ( !function_exists('newie_sidebar_layout') ) :
    function newie_sidebar_layout()
    {
        $newie_sidebar_layout =  array(
            'right-sidebar' => __( 'Right Sidebar', 'newie'),
            'left-sidebar'  => __( 'Left Sidebar' , 'newie'),
            'no-sidebar'    => __( 'No Sidebar', 'newie')
        );
        return apply_filters( 'newie_sidebar_layout', $newie_sidebar_layout );
    }
endif;




/**
 *  Default Theme options
 *
 * @since newie 1.0.0
 *
 * @param null
 * @return array $newie_theme_layout
 *
 */
if ( !function_exists('newie_default_theme_options') ) :
    function newie_default_theme_options() 
   {

        $default_theme_options = array(
            /*feature section options*/
            'newie-feature-cat'             => 0,
            'newie-promo-cat'               => 0,
            'newie-footer-copyright'        => esc_html__( 'Newie WordPress Theme, Copyright 2017', 'newie'),
            'newie-layout'                  => 'right-sidebar',   
            'breadcrumb_option'             => 'simple',
            'newie-realted-post'            => 0,
            'newie-realted-post-title'      => esc_html__( 'Related Posts', 'newie' ),
            'hide-breadcrumb-at-home'       => 1 ,
            'primary_color'                 => '#222222',
            'slider_caption_bg_color'       => 'rgba(249,244,242,0.64)',
            'hide-slider-post-at-category'  => 1,


        ); 

        return apply_filters( 'newie_default_theme_options', $default_theme_options );
    }
endif;

/**
 *  Get theme options
 *
 * @since newie 1.0.0
 *
 * @param null
 * @return array newie_theme_options
 *
 */
if ( !function_exists('newie_get_theme_options') ) :
    function newie_get_theme_options()
    {

        $newie_default_theme_options = newie_default_theme_options();
        

        $newie_get_theme_options = get_theme_mod( 'newie_theme_options');
        
        if( is_array( $newie_get_theme_options )){
          
            return array_merge( $newie_default_theme_options, $newie_get_theme_options );
        }

        else{

            return $newie_default_theme_options;
        }

    }
endif;


/**
     * Load Update to Pro section
     */
     require get_template_directory() . '/inc/customizer-pro/class-customize.php';



/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function newie_customize_register( $wp_customize )
{
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


     $wp_customize->add_section( 'theme_detail', array(
            'title'    => __( 'About Theme', 'newie' ),
            'priority' => 9
        ) );
    
        
        $wp_customize->add_setting( 'upgrade_text', array(
            'default' => '',
            'sanitize_callback' => '__return_false'
        ) );
        
        $wp_customize->add_control( new Newie_Customize_Static_Text_Control( $wp_customize, 'upgrade_text', array(
            'section'     => 'theme_detail',
            'label'       => __( 'Upgrade to PRO', 'newie' ),
            'description' => array('')
        ) ) );


	/*defaults options*/
    $defaults = newie_get_theme_options();

    
       
    
       
    /**
     * Load customizer custom-controls
     */
    require get_template_directory() . '/inc/customizer-inc/custom-controls.php';

    /**
     * Load customizer feature section
     */
    require get_template_directory() . '/inc/customizer-inc/newie-theme-options.php';

}
add_action( 'customize_register', 'newie_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function newie_customize_preview_js() 
{
	wp_enqueue_script( 'newie_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151216', true );
}
add_action( 'customize_preview_init', 'newie_customize_preview_js' );


function newie_customizer_script() {
  
    wp_enqueue_style( 'newie-customizer-style', get_template_directory_uri() .'/inc/css/customizer-style.css'); 

   wp_enqueue_script( 'newie-alpha-color-picker', get_template_directory_uri() .'/inc/js/alpha-color-picker.js',array( 'jquery', 'wp-color-picker' ),
            time());  
}
add_action( 'customize_controls_enqueue_scripts', 'newie_customizer_script' );




