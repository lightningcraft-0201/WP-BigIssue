<?php
/**
 * The template for displaying all single posts
 *
 * @package ClubFitness
 */

get_header(); ?>

<section class="content content-single">
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
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="post-item">
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="post-image">	
										<?php the_post_thumbnail( 'large' ); ?>
									<?php endif; ?>
										<div class="post-categories-list">
											<?php echo wp_kses_post( get_the_category_list() ); ?>
										</div>
									<?php if ( has_post_thumbnail() ) : ?>
									</div>
								<?php endif; ?>
									<div class="post-info">
										<div class="post-title">
											<h1><?php the_title(); ?></h1>
										</div>
										<?php get_template_part( 'inc/post', 'meta' ); ?>
										<div class="post-message">
											<?php the_content(); ?>
											<?php
											wp_link_pages( array(
												'before' => '<div class="page-link">' . __( 'Pages:', 'clubfitness' ),
												'after' => '</div>',
											) );
											?>
										</div>
										<div class="post-edit clearfix">
											<?php edit_post_link( __( 'Edit', 'clubfitness' ), '<span class="edit-link">', '</span>' ); ?>
										</div>
										<div class="post-tags">
											<?php the_tags( '<p class="tags">', ' ', '</p>' ); ?>
										</div>
									</div>
									<?php if ( comments_open() || '0' !== get_comments_number() ) : ?>
										<?php comments_template( '', true ); ?>
									<?php endif; ?>
									<div class="post-navigation">
										<div class="row">
											<div class="col-xs-12 col-sm-6">
												<?php previous_post_link(); ?>
											</div>
											<div class="col-xs-12 col-sm-6 text-right">
												<?php next_post_link(); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
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
