<?php

/* Staff Needs Custom Post Type
 * The staff needs custom post type includes all of the data
 * related to the particular needs of the position needing to be filled.
 */
 
 
function my_custom_post_staff_needs() {
	$labels = array(
		'name'               => _x( 'Staff Needs', 'post type general name', 'water-tower' ),
		'singular_name'      => _x( 'Staff Need', 'post type singular name', 'water-tower' ),
		'add_new'            => _x( 'Add New Staff Need', 'staff_needs', 'water-tower' ),
		'add_new_item'       => __( 'Add New Staff Need', 'water-tower' ),
		'edit_item'          => __( 'Edit Staff Need', 'water-tower' ),
		'new_item'           => __( 'New Staff Need', 'water-tower' ),
		'all_items'          => __( 'All Staff Needs', 'water-tower' ),
		'view_item'          => __( 'View Staff Needs', 'water-tower' ),
		'search_items'       => __( 'Search Staff Needs', 'water-tower' ),
		'not_found'          => __( 'No staff needs found', 'water-tower' ),
		'not_found_in_trash' => __( 'No staff needs found in the Trash', 'water-tower' ), 
		'menu_name'          => __( 'Staff Needs', 'water-tower' ),
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our staff needs and staff needs specific data',
		'public'        => true,
		'menu_position' => 6,
		'menu_icon'			 => 'dashicons-welcome-learn-more',
		'supports'      => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'has_archive'   => true,
		'taxonomies' 	=> array('post_tag'),
		'rewrite' => array('slug' => 'staff-needs'), 
	);
	register_post_type( 'staff_needs', $args );	
}
add_action( 'init', 'my_custom_post_staff_needs' );

?>