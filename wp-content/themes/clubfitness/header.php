<?php
/**
 * The header for our theme including the navigation and the photo header
 *
 * @package ClubFitness
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open() ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<div class="icon-frame">
					<span class="icon-bar icon-bar-1"></span>
					<span class="icon-bar icon-bar-2"></span>
					<span class="icon-bar icon-bar-3"></span>
				</div>
			</button>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<?php clubfitness_bootstrap_menu(); ?>
		</div>
	</div>
</nav>
