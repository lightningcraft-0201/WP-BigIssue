<?php
/**
 * The template for displaying all the posts
 *
 * @package ClubFitness
 */

?>
<div class="posts">
	<div class="row">
	<?php $i = 1; ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php if ( 1 === $i ) : ?>
		<div class="col-xs-12 col-sm-6 col-md-12 col-lg-5">
		<?php elseif ( 2 === $i ) : ?>
		<div class="col-xs-12 col-sm-6 col-md-12 col-lg-7">
		<?php else : ?>
		<div class="col-xs-12 col-sm-6 col-md-12 col-lg-6">
		<?php endif; ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php $backgroundimg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium_large' ); ?>
				<?php if ( 2 === $i ) : ?>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="post-item post-item-<?php echo esc_attr( $i ); ?>" style="background-image: url('<?php echo esc_url( $backgroundimg[0] ); ?>');">
					<?php else : ?>
						<div class="post-item post-item-<?php echo esc_attr( $i ); ?>">
					<?php endif; ?>
				<?php else : ?>
				<div class="post-item post-item-<?php echo esc_attr( $i ); ?>">
				<?php endif; ?>
					<?php if ( has_post_thumbnail() ) : ?>
					<?php if ( 1 !== $i && 2 !== $i ) : ?>
					<div class="post-image">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail( 'medium_large' ); ?>
							<span>...</span>
						</a>
					<?php endif; ?>
					<?php endif; ?>
						<div class="post-categories-list">
							<?php echo wp_kses_post( get_the_category_list() ); ?>
						</div>
					<?php if ( has_post_thumbnail() ) : ?>
					<?php if ( 1 !== $i && 2 !== $i ) : ?>
					</div>
					<?php endif; ?>
					<?php endif; ?>
					<div class="post-info">
						<div class="post-title">
							<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						</div>
						<?php get_template_part( 'inc/post', 'meta' ); ?>
						<?php if ( 1 !== $i ) : ?>
						<div class="post-message">
							<?php the_excerpt(); ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php $i++; ?>
		<?php endwhile; ?>
	<?php else : ?>
		<?php get_template_part( 'no-results' ); ?>
	<?php endif; ?>
	</div>
</div>
<div class="page-nav">
	<?php the_posts_pagination(); ?>
</div>
