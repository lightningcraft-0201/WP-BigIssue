<?php
/**
 * The template for displaying post meta (post date, post author and post comments)
 *
 * @package ClubFitness
 */

?>
<?php if ( 'post' === get_post_type() ) : ?>
<div class="post-meta">
	<div class="post-date">
		<i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo the_time( get_option( 'date_format' ) ); ?>
	</div>
	<div class="post-author">
		<?php // translators: %s containing the name of the author. ?>
		<i class="fa fa-circle" aria-hidden="true"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php sprintf( esc_attr__( 'View all posts by %s', 'clubfitness' ), get_the_author() ) ?>"><i class="fa fa-user-o" aria-hidden="true"></i> <?php echo get_the_author() ?></a>
	</div>
	<?php if ( post_password_required() !== true ) : ?>
	<div class="post-comments">
		<i class="fa fa-circle" aria-hidden="true"></i> <i class="fa fa-comment-o" aria-hidden="true"></i> <?php comments_number( __( '0 Comments', 'clubfitness' ), __( '1 Comment', 'clubfitness' ), __( '% Comments', 'clubfitness' ) ); ?>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
