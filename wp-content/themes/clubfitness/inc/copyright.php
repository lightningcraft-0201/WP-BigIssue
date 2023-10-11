<?php
/**
 * The template for displaying copyright
 *
 * @package ClubFitness
 */

?>
<div class="copyright">
	<div class="row">
		<div class="col-xs-12 text-right">
			<p><?php esc_html_e( 'Theme by', 'clubfitness' ); ?> <?php if ( is_home( ) && ! is_paged( ) ) : ?><a href="<?php echo esc_url( __( 'https://www.thewpclub.com', 'clubfitness' ) ); ?>" title="The WP Club" target="_blank"><?php endif; ?>The WP Club<?php if ( is_home( ) && ! is_paged( ) ) : ?></a><?php endif; ?>. <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'clubfitness' ) ); ?>" target="_blank"><?php printf( esc_attr( 'Proudly powered by %s', 'clubfitness' ), 'WordPress' ); ?></a></p>
		</div>
	</div>
</div>
