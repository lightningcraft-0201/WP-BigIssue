<?php
/**
 * ClubFitness functions and definitions
 *
 * @package ClubFitness
 */

/**
 * ClubFitness Theme Setup
 */
function clubfitness_setup() {
	// Meta Title.
	add_theme_support( 'title-tag' );

	// Automatic Feed Links.
	add_theme_support( 'automatic-feed-links' );

	// Logo Support.
	add_theme_support( 'custom-logo', array(
		'width'       => 215,
		'height'      => 38,
		'flex-width'  => true,
		'flex-height' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	// Featured Image.
	add_theme_support( 'post-thumbnails' );

	// Language Support.
	load_theme_textdomain( 'clubfitness', get_template_directory() . '/languages' );

	// Header Image.
	$clubfitness_args = array(
		'flex-width'    		=> true,
		'width'         		=> 1500,
		'flex-height'   		=> true,
		'height'        		=> 900,
		'default-text-color'	=> '#fff',
	);
	add_theme_support( 'custom-header', $clubfitness_args );

	// Content Width.
	if ( ! isset( $content_width ) ) {
		$content_width = 1170;
	}
}
add_action( 'after_setup_theme', 'clubfitness_setup' );

/**
 * Color / Social Customizer
 *
 * @param array $clubfitness_wp_customize Theme Colors & Social Media.
 */
function clubfitness_customize_register( $clubfitness_wp_customize ) {
	$clubfitness_colors 	= array();
	$clubfitness_colors[] 	= array(
		'slug' => 'default_color',
		'default' => '#63e7bc',
		'label' => __( 'Default Color ', 'clubfitness' ),
	);
	$clubfitness_colors[] = array(
		'slug' => 'content_right_color',
		'default' => '#597b49',
		'label' => __( 'Content Right Color ', 'clubfitness' ),
	);

	foreach ( $clubfitness_colors as $clubfitness_color ) {
		$clubfitness_wp_customize->add_setting( $clubfitness_color['slug'], array(
			'default' => $clubfitness_color['default'],
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$clubfitness_wp_customize->add_control( new WP_Customize_Color_Control( $clubfitness_wp_customize, $clubfitness_color['slug'], array(
			'label' => $clubfitness_color['label'],
			'section' => 'colors',
			'settings' => $clubfitness_color['slug'],
		) ) );
	}

	$clubfitness_wp_customize->add_section( 'sociallinks', array(
		'title' => __( 'Social Links','clubfitness' ),
		'description' => __( 'Add Your Social Links Here.','clubfitness' ),
		'priority' => '900',
	) );

	$clubfitness_wp_customize->add_setting( 'clubfitness_facebooklink', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$clubfitness_wp_customize->add_control( 'clubfitness_facebooklink', array(
		'label' => __( 'Facebook URL', 'clubfitness' ),
		'section' => 'sociallinks',
	) );
	$clubfitness_wp_customize->add_setting( 'clubfitness_twitterlink', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$clubfitness_wp_customize->add_control( 'clubfitness_twitterlink', array(
		'label' => __( 'Twitter URL', 'clubfitness' ),
		'section' => 'sociallinks',
	) );
	$clubfitness_wp_customize->add_setting( 'clubfitness_pinterestlink', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$clubfitness_wp_customize->add_control( 'clubfitness_pinterestlink', array(
		'label' => __( 'Pinterest URL', 'clubfitness' ),
		'section' => 'sociallinks',
	) );
	$clubfitness_wp_customize->add_setting( 'clubfitness_instagramlink', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$clubfitness_wp_customize->add_control( 'clubfitness_instagramlink', array(
		'label' => __( 'Instagram URL', 'clubfitness' ),
		'section' => 'sociallinks',
	) );
	$clubfitness_wp_customize->add_setting( 'clubfitness_linkedinlink', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$clubfitness_wp_customize->add_control( 'clubfitness_linkedinlink', array(
		'label' => __( 'LinkedIn URL', 'clubfitness' ),
		'section' => 'sociallinks',
	) );
	$clubfitness_wp_customize->add_setting( 'clubfitness_googlepluslink', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$clubfitness_wp_customize->add_control( 'clubfitness_googlepluslink', array(
		'label' => __( 'Google+ URL', 'clubfitness' ),
		'section' => 'sociallinks',
	) );
	$clubfitness_wp_customize->add_setting( 'clubfitness_youtubelink', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$clubfitness_wp_customize->add_control( 'clubfitness_youtubelink', array(
		'label' => __( 'YouTube URL', 'clubfitness' ),
		'section' => 'sociallinks',
	) );
	$clubfitness_wp_customize->add_setting( 'clubfitness_vimeo', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$clubfitness_wp_customize->add_control( 'clubfitness_vimeo', array(
		'label' => __( 'Vimeo URL', 'clubfitness' ),
		'section' => 'sociallinks',
	) );
	$clubfitness_wp_customize->add_setting( 'clubfitness_tumblrlink', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$clubfitness_wp_customize->add_control( 'clubfitness_tumblrlink', array(
		'label' => __( 'Tumblr URL', 'clubfitness' ),
		'section' => 'sociallinks',
	) );
	$clubfitness_wp_customize->add_setting( 'clubfitness_flickrlink', array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$clubfitness_wp_customize->add_control( 'clubfitness_flickrlink', array(
		'label' => __( 'Flickr URL', 'clubfitness' ),
		'section' => 'sociallinks',
	) );
}
add_action( 'customize_register', 'clubfitness_customize_register' );

/**
 * Includes Plugin Admin
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 * Bootstrap 3.3.7
 */
function clubfitness_bootstrap() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'clubfitness-googlefonts', clubfitness_google_fonts_url(), array(), null );
	wp_enqueue_style( 'clubfitness-style', get_stylesheet_uri() );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'clubfitness-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'clubfitness_bootstrap' );

/**
 * Google Font
 */
function clubfitness_google_fonts_url() {
	$font_families = array( 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i','Playfair Display:400,400i,700,700i,900,900' );
	$query_args = array(
		'family' => rawurlencode( implode( '|', $font_families ) ),
		'subset' => rawurlencode( 'latin,latin-ext' ),
	);
	$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	return apply_filters( 'clubfitness_google_fonts_url', $fonts_url );
}

/**
 * Navigation
 */
function clubfitness_register_menu() {
	register_nav_menus( array(
		'primary' => esc_html__( 'Top Primary Menu', 'clubfitness' ),
	) );
}
add_action( 'init', 'clubfitness_register_menu' );

/**
 * Bootstrap Navigation
 */
function clubfitness_bootstrap_menu() {
	wp_nav_menu(array(
		'theme_location'    => 'primary',
		'depth'             => 2,
		'menu_class'        => 'nav navbar-nav',
		'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
		'walker'            => new WP_Bootstrap_Navwalker(),
	));
}
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * WooCommerce Support
 */
function clubfitness_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'clubfitness_woocommerce_support' );

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10 );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display', 10 );

/**
 * WooCommerce Cart Count
 */
function clubfitness_woocommerce_cart_count() {
	if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
		$clubfitness_count = WC()->cart->cart_contents_count;
		?>
		<a href="<?php echo esc_html( WC()->cart->get_cart_url() ); ?>" title="<?php esc_html( 'View your shopping cart', 'clubfitness' ); ?>">
			<i class="fa fa-shopping-basket" aria-hidden="true"></i>
		<?php if ( $clubfitness_count > 0 ) { ?>
			<span class="woocommerce-cart-contents-count"><?php echo esc_html( $clubfitness_count ); ?></span>
		<?php } ?>
		</a>
		<?php
	}
}
add_action( 'clubfitness_header_top', 'clubfitness_woocommerce_cart_count' );

/**
 * WooCommerce Cart Count
 *
 * @param array $clubfitness_fragments Cart Count.
 */
function clubfitnesss_add_to_cart_fragment( $clubfitness_fragments ) {
	ob_start();
	$clubfitness_count = WC()->cart->cart_contents_count;
	?>
	<a href="<?php echo esc_html( WC()->cart->get_cart_url() ); ?>" title="<?php esc_html( 'View your shopping cart', 'clubfitness' ); ?>">
		<i class="fa fa-shopping-basket" aria-hidden="true"></i>
	<?php if ( $clubfitness_count > 0 ) { ?>
		<span class="woocommerce-cart-contents-count"><?php echo esc_html( $clubfitness_count ); ?></span>
	<?php } ?>
	</a>
	<?php
	$clubfitness_fragments['.woocommerce-cart-contents a'] = ob_get_clean();
	return $clubfitness_fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'clubfitnesss_add_to_cart_fragment' );

/**
 * Header Style
 */
function clubfitness_header_style() {
	if ( ! display_header_text() ) {
		echo'
		<style type="text/css">
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px 1px 1px 1px);
				clip: rect(1px, 1px, 1px, 1px);
			}
		</style>
		';
	}
}
add_action( 'wp_head', 'clubfitness_header_style' );

/**
 * Custom Colors
 */
function clubfitness_customizer_css() {
	$clubfitness_default_color 			= get_theme_mod( 'default_color' );
	$clubfitness_content_right_color 	= get_theme_mod( 'content_right_color' );
	$clubfitness_header_text_color 		= get_header_textcolor();
	?>
	<style type="text/css">
		.content .content-right {
			background-image: url('<?php header_image(); ?>');
			background-color: <?php echo esc_attr( $clubfitness_content_right_color ); ?>;
		}

		.content .content-right .brand a {
			color: #<?php echo esc_attr( $clubfitness_header_text_color ); ?>;
		}

		.btn-search,
		.btn-submit,
		.navbar-default .navbar-toggle .icon-frame,
		.navbar-default .collapse,
		.post-item .post-categories-list .post-categories li a,
		.post-item .post-tags .tags a,
		.post-item .post-info .post-message .more-link,
		.nav-links .page-numbers.current,
		.post-item-1,
		.comment .reply a,
		.woocommerce-cart-contents,
		.woocommerce span.onsale,
		.woocommerce .products .product .button,
		.woocommerce .products .product a.added_to_cart,
		.woocommerce #respond input#submit.alt,
		.woocommerce a.button.alt,
		.woocommerce a.button.alt:hover,
		.woocommerce a.button.alt:focus,
		.woocommerce button.button.alt,
		.woocommerce button.button.alt:hover,
		.woocommerce button.button.alt:focus,
		.woocommerce input.button.alt,
		.woocommerce #respond input#submit,
		.woocommerce a.button,
		.woocommerce button.button,
		.woocommerce input.button,
		.wpcf7-form input[type="submit"],
		.back-to-top,
		.tooltip-inner {
			background-color: <?php echo esc_attr( $clubfitness_default_color ); ?>;
		}

		.tooltip.top .tooltip-arrow,
		.woocommerce-info,
		.woocommerce-message {
			border-top-color: <?php echo esc_attr( $clubfitness_default_color ); ?>;
		}

		a:hover,
		a:focus,
		.sidebar .sidebar-button .btn-sidebar,
		.woocommerce div.product p.price,
		.woocommerce div.product span.price,
		.woocommerce-info:before,
		.woocommerce-message:before,
		.copyright a {
			color: <?php echo esc_attr( $clubfitness_default_color ); ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'clubfitness_customizer_css' );

/**
 * Widgets
 */
function clubfitness_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'clubfitness' ),
		'id'            => 'primary_sidebar',
		'before_widget' => '<div class="sidebar-item">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'clubfitness_widgets_init' );

/**
 * Post Read More
 *
 * @param array $link Show more link.
 */
function clubfitness_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		// translators: %s containing the title of the post or page.
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'clubfitness' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'clubfitness_excerpt_more' );

/**
 * Bootstrap Images img-responsive
 *
 * @param array $html Html code for image with Bootstrap class.
 */
function clubfitness_bootstrap_responsive_images( $html ) {
	$classes = 'img-responsive';
	if ( preg_match( '/<img.*? class="/', $html ) ) {
		$html = preg_replace( '/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . ' $2', $html );
	} else {
		$html = preg_replace( '/(<img.*?)(\/>)/', '$1 class="' . $classes . '" $2', $html );
	}
	return $html;
}
add_filter( 'the_content','clubfitness_bootstrap_responsive_images',10 );
add_filter( 'post_thumbnail_html', 'clubfitness_bootstrap_responsive_images', 10 );

/**
 * Comment Reply
 */
function clubfitness_comment_reply() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'clubfitness_comment_reply' );

/**
 * Bootstrap Comment Form
 *
 * @param array $clubfitness_fields Comment Form Fields.
 */
function clubfitness_comment_form_fields( $clubfitness_fields ) {
	$clubfitness_commenter 	= wp_get_current_commenter();
	$clubfitness_req      	= get_option( 'require_name_email' );
	$clubfitness_aria_req 	= ( $clubfitness_req ? " aria-required='true'" : '' );
	$clubfitness_html5    	= current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
	$clubfitness_fields   	= array(
		'author' 	=> '<div class="form-group comment-form-author"><input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $clubfitness_commenter['comment_author'] ) . '" placeholder="' . ( $clubfitness_req ? '* ' : '' ) . __( 'Name', 'clubfitness' ) . '..." size="30"' . $clubfitness_aria_req . ' /></div>',
		'email'  	=> '<div class="form-group comment-form-email"><input class="form-control" id="email" name="email" ' . ( $clubfitness_html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $clubfitness_commenter['comment_author_email'] ) . '" placeholder="' . ( $clubfitness_req ? '* ' : '' ) . __( 'Email', 'clubfitness' ) . '..." size="30"' . $clubfitness_aria_req . ' /></div>',
		'url'    	=> '<div class="form-group comment-form-url"><input class="form-control" id="url" name="url" ' . ( $clubfitness_html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $clubfitness_commenter['comment_author_url'] ) . '" placeholder="' . __( 'Website', 'clubfitness' ) . '..." size="30" /></div>',
	);
	return $clubfitness_fields;
}
add_filter( 'comment_form_default_fields', 'clubfitness_comment_form_fields' );

/**
 * Bootstrap Comment Form
 *
 * @param array $clubfitness_args Comment Form Fields.
 */
function clubfitness_comment_form( $clubfitness_args ) {
	$clubfitness_args['comment_field'] = '<div class="form-group comment-form-comment"><textarea class="form-control" id="comment" name="comment" cols="45" rows="8" placeholder="' . esc_attr__( 'Comment', 'clubfitness' ) . '..." aria-required="true"></textarea></div>';
	$clubfitness_args['class_submit'] = 'btn btn-default btn-submit';
	return $clubfitness_args;
}
add_filter( 'comment_form_defaults', 'clubfitness_comment_form' );

?>
