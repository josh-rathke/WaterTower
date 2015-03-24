<?php

// Creating the widget
class water_tower_surges_list_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'water_tower_surge_list_widget',
			// Widget name will appear in UI
			__( 'WT: List Surges', 'water_tower_surge_list' ),
			// Widget description
			array( 'description' => __( 'This widget allows you to list all of the surge initiatives of the base with links back to that particular Surges page.' ), )
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} else {
			echo $args['before_title'] . 'Surge Initiatives' . $args['after_title'];
		}

		// This is where you run the code and display the output

	?>

	<div class="wt-surges-list-widget-container">
	<p>The Surge" is a laser-like strategy that will partner with one Target Nation for 3-5 years at a time to meet mutually agreed upon, God-given, goals.</p>
	<?php

		$surges = get_posts( array('post_type' => 'surges') );

	foreach ( $surges as $surge ) {
		echo  '<a class="wt-surges-list-widget-link" href="' . get_the_permalink( $surge ) . '" ><i class="fa fa-map-marker"></i>' . get_the_title( $surge ) . '</a>';
	}

	?>
	
	<div class="wt-surges-list-widget-learn-more">
		<a href=""><i class="fa fa-list"></i>View All Surges</a>
	</div>
	
	</div>

	<?php

	echo $args['after_widget'];

	}



	// Widget Backend
	public function form( $instance ) {

		$title = isset($instance['title']) ? $title = $instance['title'] : $title = __( 'Surge Initiatives', 'wt_surges_list_widget' );

		// Widget admin form
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>

	<?php
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here

// Register and load the widget
function wt_surges_list_load_widget() {
	register_widget( 'water_tower_surges_list_widget' );
}
add_action( 'widgets_init', 'wt_surges_list_load_widget' );

?>