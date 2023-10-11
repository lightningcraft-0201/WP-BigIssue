<?php
/*
 Plugin Name: Wordpress List Articles
 Plugin URI: www.interactiveitsolutions.com
 Description: This plugin is the most effective plugin which easily display your posts, pages, category and also sitemap.
 Version: 2.0.2
 Author: Abhishek Shukla
 Author URI: http://www.interactiveitsolutions.com/
 License: GPL
 */
 
 /**
 * Function for plugin.
 *
 * @since.
 */
 
function wordpress_list_articles() 
     {
	    wp_enqueue_style( 'wordpresslist', WP_PLUGIN_URL . '/wordpress-list-articles/css/admin.css');
     }

add_action('init', 'wordpress_list_articles');

add_action('admin_menu', 'custom_function');

function custom_function()
    {
	    add_options_page('wp-articles', 'wp-articles', 'manage_options', 'wp-articles-list', 'wparticleslist1');
    }

function wparticleslist1()
{
/**
 * Function for show the information of plugin.
 *
 * @since.
 */
           require_once('include/info.php');

}

/**
 * Function for show the Pages.
 *
 * @since.
 */
         require_once('include/pages.php'); 
		 
/**
 * Function for show the Posts.
 *
 * @since.
 */		 

         require_once('include/posts.php'); 
		 
/**
 * Function for show the Category.
 *
 * @since.
 */		 

         require_once('include/cats.php');
		 
/**
 * Function for show the SiteList.
 *
 * @since.
 */			 

         require_once('include/sitelist.php');

?>