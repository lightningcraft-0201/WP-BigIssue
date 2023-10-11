<?php
/**
 * Function for show the Posts.
 *
 * @since.
 */
 
add_shortcode( 'posts', 'posts_function' );

function posts_function($atts)
{
	$arr=array();
	$arr_new=array();
	$st=array();
	extract(shortcode_atts(array(
                        "excludepost" => 0,
                        "showpost"        =>'' ,
	), $atts));
	
	$make =  '<div class="manage-post">';
	$make .= '<ul class="post">';
	
		if(isset($atts['excludepost']))
		$str=explode(',',$atts['excludepost']);
		$args = array(
	      'post_type' => 'post',
	      'post__not_in' => $st

		);
		query_posts($args);
		$i=1;
		if (have_posts()) : while (have_posts()) : the_post();
		if($i==1)
		{
			$make .='<h3>posts</h3>';
		}
		$make .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
		$i++;
		endwhile;
		endif;
		wp_reset_query();
		$make .= '</ul></div>';
	
	return $make;

}

?>