<?php 
/**
 * Function for show the Pages.
 *
 * @since.
 */
 
add_shortcode( 'pages', 'pages_function' );
function pages_function($atts)
{
	extract(shortcode_atts(array(
			"excludepage" => 0,
	), $atts));
	if(isset($atts['excludepage']))
	$excludepages=$atts['excludepage'];

	$args=array(
        'exclude'  => $excludepages,
        'title_li' => '',
        'echo'          => false
	);
	$make =  '<div class="manage-page"><ul class="page"><h3>Pages</h3>';
	$make .= wp_list_pages($args);
	$make .= '</ul></div>';
	return $make;
}
?>