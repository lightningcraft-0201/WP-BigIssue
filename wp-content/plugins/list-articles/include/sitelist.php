<?php

/**
 * Function for show the Sitemap.
 *
 * @since.
 */

add_shortcode( 'sitelist', 'site_function' );
function site_function($atts)
{
	$arr=array();
	$arr_new=array();
	$st=array();
	$show='';
	extract(shortcode_atts(array(
			            "excludepage" => 0,
                        "excludepost" => 0,
                        "showpost"        =>'' ,
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
	$make .= '</ul><ul class="manage_post">';
	if(isset($atts['showpost']))
	$show=$atts['showpost'];
	if($show != 'no')
	{
		
		for($i=0;$i<count($arr);$i++)
		{
			$arr_new[]='-'.$arr[$i];
		}
		 
		$excludecat=implode(',',$arr_new);

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
	}
	return $make;

}
?>