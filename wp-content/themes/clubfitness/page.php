<?php
/**
 * The template for displaying all pages
 *
 * @package ClubFitness
 */

get_header(); ?>

<section class="content content-page">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-md-5 col-content">
				<div class="content-right">
					<?php get_template_part( 'inc/content-right' ); ?>
				</div>
			</div>
			<div class="col-xs-12 col-md-7 col-content">
				<div class="content-left">
					<div class="row">
						<div class="col-xs-12">
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>	
							<div class="page-title">
								<h1><?php the_title(); ?></h1>
							</div>
							<div class="page-message">
								<?php the_content(); ?>
								<?php
								wp_link_pages( array(
									'before' => '<div class="page-link">' . __( 'Pages:', 'clubfitness' ),
									'after' => '</div>',
								) );
								?>
							</div>
							<div class="page-edit clearfix">
								<?php edit_post_link( __( 'Edit', 'clubfitness' ), '<span class="edit-link">', '</span>' ); ?>
							</div>
							<?php if ( comments_open() || '0' !== get_comments_number() ) : ?>
								<?php comments_template( '', true ); ?>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
