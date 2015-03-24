<?php

// Creating the widget 
class water_tower_target_nations_list_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'water_tower_target_nations_list_widget', 

// Widget name will appear in UI
__('WT: List Target Nations', 'water_tower_target_nations_list'), 

// Widget description
array( 'description' => __( 'This widget allows you to strategically insert links and descriptions to specific pages throughout the website.' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output

?>

<div class="wt-target-nations-list-widget-container">

	<?php
	
		$target_nations = get_terms('target_nations_taxo');
		
		foreach($target_nations as $target_nation) {
			$term_link = get_term_link($target_nation->slug, 'target_nations_taxo');
			echo "<div><a href='{$term_link}'>{$target_nation->name}</a> ({$target_nation->count})</div>";
		}
	
	?>
	
</div>

<?php

echo $args['after_widget'];

}


		
// Widget Backend 
public function form( $instance ) {

	$title = isset($instance['title']) ? $title = $instance['title'] : $title = __( 'Target Nations', 'wt-target_nations_list-widget');
	
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
function wt_target_nations_list_load_widget() {
	register_widget( 'water_tower_target_nations_list_widget' );
}
add_action( 'widgets_init', 'wt_target_nations_list_load_widget' );

?>