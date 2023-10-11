<?php
/**
 * The template for displaying social media, copyright, sidebar and WooCommerce Cart
 *
 * @package ClubFitness
 */

?>
<?php if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) : ?>
	<?php $clubfitness_count = WC()->cart->cart_contents_count; ?>
	<div class="woocommerce-cart-contents">
		<a href="<?php echo esc_html( WC()->cart->get_cart_url() ); ?>" title="<?php esc_html( 'View your shopping cart', 'clubfitness' ); ?>">
			<i class="fa fa-shopping-basket" aria-hidden="true"></i>
		<?php if ( $clubfitness_count > 0 ) : ?>
			<span class="woocommerce-cart-contents-count"><?php echo esc_html( $clubfitness_count ); ?></span>
		<?php endif; ?>
		</a>
	</div>
<?php endif; ?>
<?php if ( is_active_sidebar( 'primary_sidebar' ) ) : ?>
<div class="sidebar">
	<div class="sidebar-button">
		<a class="btn btn-default btn-sidebar"><?php esc_html_e( 'Sidebar', 'clubfitness' ); ?></a>
	</div>
	<div class="sidebar-frame">
		<div class="sidebar-main">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php endif; ?>
<div class="brand">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
	<?php $clubfitness_custom_logo_id = get_theme_mod( 'custom_logo' ); ?>
	<?php $clubfitness_logo = wp_get_attachment_image_src( $clubfitness_custom_logo_id , 'full' ); ?>
	<?php if ( has_custom_logo() ) : ?>
	<img src="<?php echo esc_url( $clubfitness_logo[0] ); ?>" class="img-responsive">
	<?php else : ?>
		<span class="site-title"><?php bloginfo( 'name' ); ?></span>
		<?php $clubfitness_description = get_bloginfo( 'description', 'display' ); ?>
		<?php if ( $clubfitness_description || is_customize_preview() ) : ?>
			<span class="site-description"><?php echo esc_attr( $clubfitness_description ); ?></span>
		<?php endif; ?>
	<?php endif; ?>
	</a>
</div>
<?php get_template_part( 'inc/social' ); ?>
<?php get_template_part( 'inc/copyright' ); ?>
