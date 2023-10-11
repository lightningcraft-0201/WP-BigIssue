<?php

/**

 * Dynamic css

 *

 * @package Paragon Themes

 * @subpackage Newie

 *

 * @param null

 * @return void

 *

 */

if ( !function_exists('newie_dynamic_css') ):

    function newie_dynamic_css(){

    $newie_theme_options  = newie_get_theme_options();
   
   /*====================Basic Color=====================*/

    $newie_primary_color     = $newie_theme_options['primary_color'];
    
    $slider_caption_color    = $newie_theme_options['slider_caption_bg_color'];
   
    

   $custom_css = '';




/*====================Primary Color =====================*/

$custom_css .= " .site-title a, p.site-description, .main-navigation ul li.current-menu-item a, .widget .widget-title, h1, h2, h3, h4, h5, h6

                  {

                      color: " . $newie_primary_color . ";

                   }

                  ";

$custom_css .= " #featured-slider .feature-description figcaption

                  {

                      background: " . $slider_caption_color . ";

                   }

                  ";                  


  





    /*------------------------------------------------------------------------------------------------- */


    /*custom css*/



    wp_add_inline_style('newie-style', $custom_css);



}

endif;

add_action('wp_enqueue_scripts', 'newie_dynamic_css', 99);