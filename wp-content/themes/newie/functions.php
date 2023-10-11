<?php
/**
 * newie functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package newie
 */

if ( ! function_exists( 'newie_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function newie_setup() 
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on newie, use a find and replace
	 * to change 'newie' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'newie');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

    add_image_size( 'newie-promo-post', 360, 261, array( 'left', 'bottom' ) ); //(cropped)
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'newie' ),
		'social' => esc_html__( 'Social', 'newie' ),
	) );

	/*
	 * Theme custom logo
	 */
	add_theme_support( 'custom-logo', array(
        'height'      => 70,
        'width'       => 250,
        'flex-width'  => true,
    ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'newie_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}

endif;
add_action( 'after_setup_theme', 'newie_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function newie_content_width() 
{
	$GLOBALS['content_width'] = apply_filters( 'newie_content_width', 640 );
}
add_action( 'after_setup_theme', 'newie_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function newie_widgets_init() 
{
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'newie' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'newie' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'newie' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here', 'newie' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'newie' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here', 'newie' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'newie' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here', 'newie' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Four', 'newie' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here', 'newie' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
}
add_action( 'widgets_init', 'newie_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function newie_scripts()
{
	/*google font  */
    wp_enqueue_style( 'newie-googleapis', '//fonts.googleapis.com/css?family=Hind:300,400,500|Libre+Franklin:400,500|Merriweather:400,700,700i,900', array(), null );
	
	/*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/framework/Font-Awesome/css/font-awesome.min.css', array(), '4.5.0' );
	
	/*Bootstrap CSS*/
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/framework/bootstrap/css/bootstrap.min.css', array(), '4.5.0' );
	
	/*Owl CSS*/
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/framework/owl-carousel/owl.carousel.css', array(), '4.5.0' );
	
	/*Fancybox CSS*/
    wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/assets/framework/fancybox/css/jquery.fancybox.css', array(), '4.5.0' );

	
	/*Style CSS*/
	wp_enqueue_style( 'newie-style', get_stylesheet_uri() );

	
	
    /*Bootstrap JS*/
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/framework/bootstrap/js/bootstrap.min.js', array('jquery'), '4.5.0' );
	
	
	/*navigation JS*/
	wp_enqueue_script( 'newie-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '20151215', true );

	/*owl*/
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/framework/owl-carousel/owl.carousel.min.js', array('jquery'), '4.5.0' );
	
    /*fancybox js*/
    wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/framework/fancybox/js/jquery.fancybox.pack.js', array('jquery'), '4.5.0' );

   /*Sticky Sidebar js*/
    wp_enqueue_script( 'sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array('jquery'), '4.5.0' );

	/*Custom JS*/
	wp_enqueue_script( 'newie-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '4.5.0' );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) 
	{
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'newie_scripts' );



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Loading related post file
 */

require get_template_directory() . '/inc/hooks/related-post.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Loading breadcrumbs File.
 */

if (!function_exists('breadcrumb_trail')) {
 
   require get_template_directory() . '/inc/library/breadcrumbs/breadcrumbs.php';

}

/**
 * Loading page-breadcrumbs in pages/posts
 */

require get_template_directory() . '/inc/hooks/page-breadcrumbs.php';


/**
 * Loading dyanmic css hook file
 */

require get_template_directory() . '/inc/hooks/dynamic-css.php';



/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Load theme-function  file.
 */
require get_template_directory() . '/inc/theme-function.php';

/**
 * Load Custom widget File.
 */
require get_template_directory() . '/inc/custom-widget/author-widget.php';

/**
 * Load Custom widget File.
 */
require get_template_directory() . '/inc/custom-widget/recent-posts.php';

require get_template_directory() . '/inc/custom-widget/social-widget.php';



/**
 * Exclude category in blog page
 *
 * @since Newie 1.0.0
 *
 * @param null
 * @return int
 */

global $newie_theme_options;
	$newie_theme_options    = newie_get_theme_options();
	$showpost = $newie_theme_options['hide-slider-post-at-category'];	
if( $showpost != 1 )
{
 if (!function_exists('newie_exclude_category_in_blog_page')) :
    function newie_exclude_category_in_blog_page($query)
    {   	

        if ($query->is_home && $query->is_main_query()  ) {
        	$newie_theme_options    = newie_get_theme_options();
            $catid = $newie_theme_options['newie-feature-cat'];
            $exclude_categories = $catid;
            if (!empty($exclude_categories)) {
                $cats = explode(',', $exclude_categories);
                $cats = array_filter($cats, 'is_numeric');
                $string_exclude = '';
                echo $string_exclude;
                if (!empty($cats)) {
                    $string_exclude = '-' . implode(',-', $cats);
                    $query->set('cat', $string_exclude);
                }
            }
        }
        return $query;
    }
endif;
add_filter('pre_get_posts', 'newie_exclude_category_in_blog_page');

}
/*
Function to load admin js
*/
if( !function_exists( 'newie_author_widgets_backend_enqueue' )):
function newie_author_widgets_backend_enqueue($hook){   

   if ( 'widgets.php' != $hook) {
            return;
        }

    wp_enqueue_script( 'newie-custom-widgets', get_template_directory_uri().'/assets/js/widgets-admin.js', array( 'jquery' ), true );
    wp_enqueue_media();

}

add_action( 'admin_enqueue_scripts', 'newie_author_widgets_backend_enqueue' );
endif;