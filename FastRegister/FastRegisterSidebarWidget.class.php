<?php

//this file was copied and pasted from the codex


add_action( 'widgets_init', function(){
	register_widget( 'My_Widget' );
});


	class My_Widget extends WP_Widget {
		/**
		 * Register widget with WordPress.
		 */
		function __construct() {
			parent::__construct(
					'My_Widget', // Base ID
					__('CRG FastRegister', 'text_domain'), // Name
					array( 'description' => __( 'Easily register and log in users', 'text_domain' ), ) // Args
					);
		}
		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {

			echo $args['before_widget'];
			echo $args['before_title'];
				if (!( is_user_logged_in() )) {
					echo apply_filters( 'widget_title', $instance['title'] );
				}
			echo $args['after_title'];
			$this->echoMessageForFrontendContent();
			echo $args['after_widget'];
		}
				
		public function echoMessageForFrontendContent(){
			if ( is_user_logged_in() ) {
				$current_user = wp_get_current_user();
				$name = $current_user->nickname;
				echo ("Hello, <a href = '/wp-admin/profile.php'>$name</a>!");
			} else {
				$output = <<<output
			<form method = 'post'>
				<input type = 'text' name = "CRG-fast-register-email" id = "CRG-fast-register-email"  placeholder = 'Email' />
				<br />
				<input type = 'submit' value = 'Submit' />
			</form>
output;
				echo $output;
			}
			}
		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$title = __( 'Sign Up for the Newsletter', 'text_domain' );
			?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} // class My_Widget
