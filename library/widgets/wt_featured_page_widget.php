<?php

// Creating the widget 
class water_tower_featured_page_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'water_tower_featured_page_widget', 

// Widget name will appear in UI
__('WT: Featured Page', 'water_tower_featured_page'), 

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

if ( ! empty( $title ) ) {
	echo $args['before_title'] . $title . $args['after_title'];
}

// This is where you run the code and display the output

?>

<div class="wt-featured-page-widget-container">

	<?php
	
	$featured_page = get_post($instance['featured-page'], OBJECT);
	$custom_desc = $instance['custom-description'];
	
	echo ($custom_desc) ? '<p>' . $custom_desc . '</p>' : get_excerpt_by_id($featured_page->ID, $instance['excerpt-length']);
	echo '<div class="featured-page-widget-link-container"><a href="' .get_permalink($featured_page->ID) . '">' . $instance['link-text'] . '<i class="fa fa-long-arrow-right"></i></a></div>';
	
	?>
	
</div>

<?php

echo $args['after_widget'];

}


		
// Widget Backend 
public function form( $instance ) {

$title = isset($instance['title']) ? $title = $instance['title'] : $title = __( 'Page Title', 'wt-featured-page-widget');
$featured_page = $instance['featured-page'];
$excerpt_length = isset($instance['excerpt-length']) ? $excerpt_length = $instance['excerpt-length'] : $excerpt_length = __( '50', 'wt-featured-page-widget');
$custom_description = isset($instance['custom-description']) ? $custom_description = $instance['custom-description'] : $custom_description = '';
$link_text = isset($instance['link-text']) ? $link_text = $instance['link-text'] : $link_text = 'Visit Page';

// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id( 'featured-page' ); ?>"><?php _e( 'Featured Page:' ); ?></label> 
<select class="widefat" id="<?php echo $this->get_field_id( 'featured-page' ); ?>" name="<?php echo $this->get_field_name( 'featured-page' ); ?>" type="text">
	
	<?php
	
	// The Query
	$pages = get_pages(array('post_type'=>'page'));
		
	foreach($pages as $page) {
		$page_id = $page->ID;
		$page_title = $page->post_title;
		echo '<option value="' . $page_id . '" ' . selected($instance['featured-page'], $page_id) . '>' . $page_title . '</option>';

	}
	
	?>
	
</select>
</p>

<p>
<label for="<?php echo $this->get_field_id( 'excerpt-length' ); ?>"><?php _e( 'Excerpt Length (Word Count):' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'excerpt-length' ); ?>" name="<?php echo $this->get_field_name( 'excerpt-length' ); ?>" type="text" value="<?php echo esc_attr( $excerpt_length ); ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id( 'custom-description' ); ?>"><?php _e( 'Custom Description' ); ?></label> 
<textarea  class="widefat" id="<?php echo $this->get_field_id( 'custom-description' ); ?>" name="<?php echo $this->get_field_name( 'custom-description' ); ?>"><?php echo $custom_description; ?></textarea>
</p>

<p>
<label for="<?php echo $this->get_field_id( 'link-text' ); ?>"><?php _e( 'Link Text' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'link-text' ); ?>" name="<?php echo $this->get_field_name( 'link-text' ); ?>" type="text" value="<?php echo esc_attr( $link_text ); ?>" />
</p>

<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['featured-page'] = ( ! empty( $new_instance['featured-page'] ) ) ? strip_tags( $new_instance['featured-page'] ) : '';
$instance['excerpt-length'] = ( ! empty( $new_instance['excerpt-length'] ) ) ? strip_tags( $new_instance['excerpt-length'] ) : '';
$instance['custom-description'] = ( ! empty( $new_instance['custom-description'] ) ) ? strip_tags( $new_instance['custom-description'] ) : '';
$instance['link-text'] = ( ! empty( $new_instance['link-text'] ) ) ? strip_tags( $new_instance['link-text'] ) : 'View Page';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function wt_featured_page_load_widget() {
	register_widget( 'water_tower_featured_page_widget' );
}
add_action( 'widgets_init', 'wt_featured_page_load_widget' );

?>