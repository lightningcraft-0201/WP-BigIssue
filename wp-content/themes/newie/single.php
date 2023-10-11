<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package newie
 */

get_header();


/**
* Hook - newie_breadcrumb_type.
*
* @hooked newie_breadcrumb_type
*/
do_action( 'newie_breadcrumb_type' );	


// define global variable
global $newie_theme_options;
$designlayout = $newie_theme_options['newie-layout'];
$side_col     = 'right-s-bar ';
if( 'left-sidebar' == $designlayout )
{
	$side_col = 'left-s-bar';
}
?>
	<div id="primary" class="content-area col-sm-8 col-md-8 <?php echo $side_col;?>">
		<main id="main" class="site-main" role="main">

			<?php

     		while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content','single');

				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'newie' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'newie' ),
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'newie' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'newie' ),
				) );

				 /**
                     * newie_related_posts hook
                     * @since Newie 1.0.0
                     *
                     * @hooked newie_related_posts
                     */
                    do_action('newie_related_posts' ,get_the_ID() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

		    endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
