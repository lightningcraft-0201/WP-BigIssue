<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Canyon Themes
 * @subpackage Newie
 */

if (!function_exists('newie_breadcrumb_type')) :

    function newie_breadcrumb_type($post_id)
    {
       $newie_theme_options   = newie_get_theme_options();
       $breadcrumb_type       = $newie_theme_options['breadcrumb_option'];

        if(  $breadcrumb_type == 'simple' )
        {
?>    
<!--breadcrumb-->
<div class="col-sm-12 col-md-12 ">
  <div class="breadcrumb">
    <?php  breadcrumb_trail(); ?>
  </div>
</div>
<!--end breadcrumb-->    
<?php  
        }  
    }
endif;

add_action('newie_breadcrumb_type', 'newie_breadcrumb_type', 10, 1);    