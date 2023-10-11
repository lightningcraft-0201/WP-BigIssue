<?php

class Newie_Recent_Post_Widget extends WP_Widget{
     public function __construct(){
          parent::__construct(
               'recent-post-widget',
               __( 'PT Recent Post', 'newie' ),
               array( 'description' => __( 'Best displayed in Sidebar.', 'newie' ) )
          );
     }
    
     public function widget( $args, $instance )
     {
          extract( $args );
          if(!empty($instance)){
          $title      = apply_filters('widget_title', $instance['title'] );
          $count      = $instance['count'];
          $order_by   = $instance['order_by'];
          
          echo $before_widget;

          $output = '';

          if ( $title )
            echo $before_title . $title . $after_title;

          global $post;

          if ( $order_by == 'recent-post' )
          {

             $args = array( 
              'posts_per_page' => $count,
              'order' => 'DESC'
              );

          } 

         else 
          {

            $args = array( 
              'orderby' => 'comment_count',
              'order' => 'DESC',
              'posts_per_page' => $count
              );

          }


       $posts_data = get_posts( $args );  

        if(count($posts_data)>0){
        
        $output .='<div class="newie-recent-posts ' . $order_by . '">';

        foreach ($posts_data as $post): setup_postdata($post);
          $output .='<div class="image">';

            if(has_post_thumbnail()):
              $output .='<figure class="pull-left">';
              $output .='<a href="'.esc_url(get_permalink()).'">'.get_the_post_thumbnail( get_the_ID(), 'newie-thumb', array('class' => 'img-responsive')).'</a>';
              $output .='</figure>';
            endif;

            $output .='<div class="image-body">';
            $output .= '<h3 class="entry-title"><a href="'.esc_url(get_permalink()).'">'. get_the_title() .'</a></h3>';
            $output .= '<div class="entry-meta small">';
            $output .= '<span><i class="fa fa-clock-o"></i> '.get_the_date('d M Y').'</span>';
            $output .= '<span><a href="'.esc_url(get_permalink()).'"><i class="fa fa-user"></i> '.get_the_author() . '</a></span>';
            $output .='</div>';
            $output .='</div>';

          $output .='</div>';
        endforeach;

        wp_reset_postdata();

        $output .='</div>';
      }


      echo $output;

      echo $after_widget;

      }
    }

     public function update( $new_instance, $old_instance )
        {
        $instance               = $old_instance;
        $instance['title']      = strip_tags( $new_instance['title'] );
        $instance['order_by']   = strip_tags( $new_instance['order_by'] );
        $instance['count']      = strip_tags( $new_instance['count'] );
        return $instance;
     }

     public function form($instance ){
          $defaults = array( 
                              'title'     => __('Latest Posts', 'newie'),
                              'order_by'  => 'recent-post',
                              'count'     => 5
                            );
    $instance = wp_parse_args( (array) $instance, $defaults );
          ?>
          <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e('Widget Title', 'newie'); ?></label>
            <input type="text" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" style="width:100%;" />
          </p>

          <p>
              <label for="<?php echo esc_attr($this->get_field_id( 'order_by' )); ?>"><?php _e('Ordered By', 'newie'); ?></label>
              <?php 
                $options = array(
                  'recent-post'  => __('Recent Posts', 'newie'),
                  'comments'  => __('Most Commented Posts', 'newie' )
                  );
                if(isset($instance['order_by'])) $order_by = $instance['order_by'];
              ?>
              <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'order_by' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'order_by' )); ?>">
                <?php
                $option = '<option value="%s"%s>%s</option>';

                foreach ($options as $key=>$value ) {

                  if ($order_by === $key)
                   {
                          printf($option, $key, ' selected="selected"', $value);
                   } 
                   else 
                   {
                          printf($option, $key, '', $value);
                   }
                  }
                ?>
              </select>
          </p>

          <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'count' )); ?>"><?php _e('Count', 'newie'); ?></label>
            <input type="number" id="<?php echo esc_attr($this->get_field_id( 'count' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'count')); ?>" value="<?php echo absint($instance['count']); ?>" style="width:100%;" />
          </p>
          <?php
     }
}


add_action( 'widgets_init', 'newie_recent_post_widget' ); 
function newie_recent_post_widget(){     
    register_widget( 'Newie_Recent_Post_Widget' );

}















