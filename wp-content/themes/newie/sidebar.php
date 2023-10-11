<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package newie
 */
global $newie_theme_options;
$designlayout = $newie_theme_options['newie-layout'];

if ( ! is_active_sidebar( 'sidebar-1' ) || 'no-sidebar' == $designlayout ) 
{
	return;
}

$side_col = 'left-s-bar';
if( 'left-sidebar' == $designlayout )
{
	$side_col = 'right-s-bar';
}
?>

<aside id="secondary" class="col-sm-4 col-md-4 widget-area <?php echo $side_col; ?>" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
