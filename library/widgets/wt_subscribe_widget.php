<?php

// Creating the widget 
class water_tower_subscribe_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'water_tower_subscribe_widget', 

// Widget name will appear in UI
__('WT: Subscribe Widget', 'watet_tower_subscribe'), 

// Widget description
array( 'description' => __( 'This widget allows visitors to subscribe to different portions of the blog, and remain updated through newsletters and posts.' ), ) 
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

<div class="subscribe-widget-container">

<p>Want us to send you an email every time we post new content to the site?  Fill out the form below and we'll be sure to keep you updated</p>

<div>
	<?php echo do_shortcode('[gravityform id="2" name="Subscribe Form" title="false" description="false" ajax="true"]'); ?>
</div>
	<div class="subscribe-widget-footer">
		<ul>
			<li><a target="_blank" href="<?php bloginfo('rss2_url'); ?>"><i class="icon-rss"></i> RSS</a></li>
			<li><a target="_blank" href="<?php echo get_social_media_link('facebook_url'); ?>"><i class="icon-facebook"></i></a></li>
			<li><a target="_blank" href="<?php echo get_social_media_link('twitter_url'); ?>"><i class="icon-twitter"></i></a></li>
			<li><a target="_blank" href="<?php echo get_social_media_link('instagram_url'); ?>"><i class="icon-instagram"></i></a></li>
		</ul>
		<div class="fb-like" data-href="https://www.facebook.com/ywammontana" data-width="320" data-layout="button_count" data-show-faces="false" data-send="true"></div>
	</div>
</div>

<?php

echo $args['after_widget'];

}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'Subscribe', 'water_tower_subscribe_widget' );
}
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
function wt_subscribe_load_widget() {
	register_widget( 'water_tower_subscribe_widget' );
}
add_action( 'widgets_init', 'wt_subscribe_load_widget' );

?>