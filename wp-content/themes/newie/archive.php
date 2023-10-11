<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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

global $newie_theme_options;
$designlayout = $newie_theme_options['newie-layout'];
$side_col     = 'right-s-bar ';
if( 'left-sidebar' == $designlayout ){
	$side_col = 'left-s-bar';
}
?>
	<div id="primary" class="content-area col-sm-8 col-md-8 <?php echo $side_col;?>">
		<main id="main" class="site-main" role="main">
      <?php
		
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->



  <?php get_sidebar(); ?>


<?php

get_footer();
