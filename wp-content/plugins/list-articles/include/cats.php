<?php
/**
 * Function for show the Category.
 *
 * @since.
 */
 
add_shortcode( 'cat', 'cat_function' );
function cat_function($atts)
{
	extract(shortcode_atts(array(
			"excludecat" => 0,
	), $atts));
	if(isset($atts['excludecat']))
		$arr=explode(',',$atts['excludecat']);
		$args=array(
        'exclude'  => $excludecat,
        'title_li' => '',
        'echo'          => false
	);

	$make =  '<div class="manage-cat"><ul class="cat"><h3>Category</h3>';
	$make .=wp_list_categories($args);
	$make .= '</ul></div>';
	return $make;
}

?>