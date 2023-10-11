<?php
/**
 * The template for displaying social media icons
 *
 * @package ClubFitness
 */

?>
<?php if ( get_theme_mod( 'clubfitness_facebooklink' ) || get_theme_mod( 'clubfitness_twitterlink' ) || get_theme_mod( 'clubfitness_pinterestlink' ) || get_theme_mod( 'clubfitness_instagramlink' ) || get_theme_mod( 'clubfitness_linkedinlink' ) || get_theme_mod( 'clubfitness_googlepluslink' ) || get_theme_mod( 'clubfitness_youtubelink' ) || get_theme_mod( 'clubfitness_vimeo' ) || get_theme_mod( 'clubfitness_tumblrlink' ) || get_theme_mod( 'clubfitness_flickrlink' ) ) : ?>
<div class="social-icons">
	<ul class="list-unstyled list-social-icons">
<?php endif; ?>
		<?php if ( get_theme_mod( 'clubfitness_facebooklink' ) ) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'clubfitness_facebooklink' ) ); ?>" data-toggle="tooltip" title="<?php esc_html_e( 'Facebook', 'clubfitness' ); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubfitness_twitterlink' ) ) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'clubfitness_twitterlink' ) ); ?>" data-toggle="tooltip" title="<?php esc_html_e( 'Twitter', 'clubfitness' ); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubfitness_pinterestlink' ) ) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'clubfitness_pinterestlink' ) ); ?>" data-toggle="tooltip" title="<?php esc_html_e( 'Pinterest', 'clubfitness' ); ?>" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubfitness_instagramlink' ) ) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'clubfitness_instagramlink' ) ); ?>" data-toggle="tooltip" title="<?php esc_html_e( 'Instagram', 'clubfitness' ); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubfitness_linkedinlink' ) ) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'clubfitness_linkedinlink' ) ); ?>" data-toggle="tooltip" title="<?php esc_html_e( 'Linkedin', 'clubfitness' ); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubfitness_googlepluslink' ) ) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'clubfitness_googlepluslink' ) ); ?>" data-toggle="tooltip" title="<?php esc_html_e( 'Google+', 'clubfitness' ); ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubfitness_youtubelink' ) ) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'clubfitness_youtubelink' ) ); ?>" data-toggle="tooltip" title="<?php esc_html_e( 'YouTube', 'clubfitness' ); ?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubfitness_vimeo' ) ) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'clubfitness_vimeo' ) ); ?>" data-toggle="tooltip" title="<?php esc_html_e( 'Vimeo', 'clubfitness' ); ?>" target="_blank"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubfitness_tumblrlink' ) ) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'clubfitness_tumblrlink' ) ); ?>" data-toggle="tooltip" title="<?php esc_html_e( 'Tumblr', 'clubfitness' ); ?>" target="_blank"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'clubfitness_flickrlink' ) ) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'clubfitness_flickrlink' ) ); ?>" data-toggle="tooltip" title="<?php esc_html_e( 'Flickr', 'clubfitness' ); ?>" target="_blank"><i class="fa fa-flickr" aria-hidden="true"></i></a></li>
		<?php endif; ?>
<?php if ( get_theme_mod( 'clubfitness_facebooklink' ) || get_theme_mod( 'clubfitness_twitterlink' ) || get_theme_mod( 'clubfitness_pinterestlink' ) || get_theme_mod( 'clubfitness_instagramlink' ) || get_theme_mod( 'clubfitness_linkedinlink' ) || get_theme_mod( 'clubfitness_googlepluslink' ) || get_theme_mod( 'clubfitness_youtubelink' ) || get_theme_mod( 'clubfitness_vimeo' ) || get_theme_mod( 'clubfitness_tumblrlink' ) || get_theme_mod( 'clubfitness_flickrlink' ) ) : ?>
	</ul>
</div>
<?php endif; ?>
