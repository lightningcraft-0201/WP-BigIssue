<?php 
/**
 * Custom widgets For Social Link.
 */

if ( ! class_exists( 'Newie_Social_Widget' ) ) :

	/**
	 * Social widget class.
	 */
	class Newie_Social_Widget extends WP_Widget 
	{

		/**
		 * Constructor.
		 */
		function __construct() 
		{
			$opts = array(
				'classname'   => 'newie-social-icons',
				'description' => esc_html__( ' PT Social Icons Widget', 'newie' ),
			);
			parent::__construct( 'newie-social-icons', esc_html__( ' PT Social Widget', 'newie' ), $opts );
		}

		/**
		 * Function the widget content.
		 */
		function widget( $args, $instance ) 
		{

			$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			echo $args['before_widget'];

			if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			} ?>
           <div class="social-links">
			<?php  if(  has_nav_menu( 'social' ) ){
				        wp_nav_menu( array( 'theme_location' => 'social', 'menu_class' => 'social-menu' ) ); 
					} ?>
	        </div>				

	        <?php echo $args['after_widget'];

		}

		/**
		 * Update widget instance.
		 */
		function update( $new_instance, $old_instance ) 
		{
			$instance = $old_instance;

			$instance['title'] = sanitize_text_field( $new_instance['title'] );

			return $instance;
		}

		/**
		 * Output the settings update form.
		 */
		function form( $instance )
		{

			$instance = wp_parse_args( (array) $instance, 
				array(
				         'title' => '',
		      	      ) );
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'newie' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>

			<?php if ( ! has_nav_menu( 'social' ) ) : ?>
	        <p>
				<?php esc_html_e( 'Please create menu and assign it.', 'newie' ); ?>
	        </p>
	        <?php endif; 
		}
	}

endif;

if ( ! function_exists( 'newie_load_widgets' ) ) :

	/**
	 * Load widgets.
	 */
	function newie_load_widgets()
	 {
		// Social.
		register_widget( 'Newie_Social_Widget' );
     }


endif;

add_action( 'widgets_init', 'newie_load_widgets' );