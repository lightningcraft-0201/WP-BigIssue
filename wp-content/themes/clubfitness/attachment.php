<?php
/**
 * The template for displaying attachments
 *
 * @package ClubFitness
 */

get_header(); ?>

<section class="content content-attachment">
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
									<div class="post-title">
										<h1><?php the_title(); ?></h1>
									</div>
									<?php get_template_part( 'inc/post', 'meta' ); ?>
									<div class="post-attachement">
									<?php
									$attachments = array_values( get_children( array(
										'post_parent' => $post->post_parent,
										'post_status' => 'inherit',
										'post_type' => 'attachment',
										'post_mime_type' => 'image',
										'order' => 'ASC',
										'orderby' => 'menu_order ID',
									) ) );
									foreach ( $attachments as $k => $attachment ) {
										if ( $attachment->ID === $post->ID ) :
											break;
										endif;
									}
									$k++;
									if ( count( $attachments ) > 1 ) :
										if ( isset( $attachments[ $k ] ) ) :
											$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
										else :
											$next_attachment_url = get_attachment_link( $attachments[0]->ID );
										endif;
									else :
										$next_attachment_url = wp_get_attachment_url();
									endif;
									?>
									<?php
									echo wp_get_attachment_image( $post->ID, 'large', '', array(
										'class' => 'img-responsive',
									) );
									?>
									<?php edit_post_link( __( 'Edit', 'clubfitness' ), '<span class="edit-link">', '</span>' ); ?>
									</div>
									<div class="post-tags">
										<?php the_tags( '<p class="tags">', ' ', '</p>' ); ?>
									</div>
									<?php if ( comments_open() || '0' !== get_comments_number() ) : ?>
										<?php comments_template( '', true ); ?>
									<?php endif; ?>
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
