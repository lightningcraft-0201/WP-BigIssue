<?php
/**
* Select Images according to Category saved.
*
* @since Newie 1.0.0
*
* @param null
* @return null
*
*/
if ( !function_exists('newie_slider_images_selection') ) :
  function newie_slider_images_selection() 
  { 
        global $newie_theme_options;

        $category_name=$newie_theme_options['newie-feature-cat'];
                     
        $args = array( 'cat' =>$category_name , 'posts_per_page' => -1 );

        $query = new WP_Query($args);

        if($query->have_posts()):

          while($query->have_posts()):

           $query->the_post();
           if(has_post_thumbnail())
              {

                   $image_id = get_post_thumbnail_id();
                   $image_url = wp_get_attachment_image_src($image_id,'',true);
?>
                  <div class="feature-area" xmlns="http://www.w3.org/1999/html">
                      <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image_url[0]);?>" alt=""></a>
                       <div class="feature-description text-center">
                          <figcaption>
                              <?php get_the_author(); ?>

                              <?php 
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) 
                                {
                                    echo esc_html( $categories[0]->name );   
                                }
                              ?>
                              <h2><?php the_title(); ?></h2>
                              <a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More...','newie') ?></a>
                          </figcaption>

                       </div>
                  </div>
          

<?php 
              }
          endwhile; endif;wp_reset_postdata();
 }
endif;


/*
* Remove [...] from default fallback excerpt content
*
*/
function newie_excerpt_more( $more ) {
	if(is_admin())
	{
		return $more;
	}
	return '';
}
add_filter( 'excerpt_more', 'newie_excerpt_more');
