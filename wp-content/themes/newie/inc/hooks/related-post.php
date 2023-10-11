<?php
/**
 * Related Post
 *
 * @since Newie 1.0.0
 *
 * @param null
 * @return void
 *
 */


if (!function_exists('newie_related_post_below')) :

    function newie_related_post_below($post_id)
    {
        global $newie_theme_options;
        $newie_theme_options  = newie_get_theme_options();
        $related_post_hide_option =   $newie_theme_options['newie-realted-post'];
        $related_post_title_option =  $newie_theme_options['newie-realted-post-title'];
       
        if ( 0 == $related_post_hide_option)
     
        {
            return;
        }
      
       
         $categories = get_the_category($post_id);
       
        if ($categories)
        {
            $category_ids = array();
           
            foreach ($categories as $category)
            {
                $category_ids[] = $category->term_id;
                $category_name[] = $category->slug;
            }

            $newie_plus_cat_post_args = array(
                'category__in' => $category_ids,
                'post__not_in' => array($post_id),
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post_status' => 'publish',
                'ignore_sticky_posts' => true
            );
            $newie_plus_featured_query = new WP_Query($newie_plus_cat_post_args);
            ?>
            <div class="related-post news-block">
                <header class="entry-header">
                    <h1 class="entry-title">
                        <?php echo esc_html($related_post_title_option); ?>
                    </h1>
                </header>
                <div class="row">
                    <?php
                    while ($newie_plus_featured_query->have_posts()) :
                        $newie_plus_featured_query->the_post(); ?>
                         <article class="col-sm-4 id="post-<?php the_ID(); ?>" <?php post_class(); ?>">
                                <div class="newie-post-wrapper <?php if ( !has_post_thumbnail () ) { echo "no-feature-image"; } ?>">
                                   <!--post thumbnal options-->
                                    <?php if ( has_post_thumbnail () ) 
                                    { ?>
                                        <div class="newie-post-thumb post-thumb">
                                            <a href="<?php the_permalink(); ?>">
                                             <?php the_post_thumbnail( 'full' ); ?>
                                            </a>
                                        </div><!-- .post-thumb-->
                              <?php } ?>
                                    <div class="content-wrap">
                                        <div class="catagories">
                                            <?php newie_entry_footer(); ?>
                                        </div>

                                        <div class="entry-header">
                                            <?php
                                            if ( is_single() ) :
                                               
                                                the_title( '<h1 class="entry-title">', '</h1>' );
                                            else :
                                                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                            endif; ?>
                                        </div><!-- .entry-header -->

                                        <div class="entry-content">
                                            <?php echo esc_html( wp_trim_words( get_the_content(),  20, ' ' ) ); ?>
                                        </div><!-- .entry-content -->
                                    </div>

                                    
                                </div>
                        </article><!-- #post-## -->
                    <?php endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
            <?php
        }
    }
endif;

add_action('newie_related_posts', 'newie_related_post_below', 10, 1);