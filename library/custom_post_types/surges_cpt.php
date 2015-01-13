<?php

/* Surges Custom Post Type
 * The surges custom post type contains all of our surgess
 * specific data including dates, costs, descriptions etc.
 */
 
 
function my_custom_post_surge() {
	$labels = array(
		'name'               => _x( 'Surges', 'post type general name', 'water-tower' ),
		'singular_name'      => _x( 'Surge', 'post type singular name', 'water-tower' ),
		'add_new'            => _x( 'Add New Surge', 'book', 'water-tower' ),
		'add_new_item'       => __( 'Add New Surge', 'water-tower' ),
		'edit_item'          => __( 'Edit Surge', 'water-tower' ),
		'new_item'           => __( 'New Surge', 'water-tower' ),
		'all_items'          => __( 'All Surges', 'water-tower' ),
		'view_item'          => __( 'View Surge', 'water-tower' ),
		'search_items'       => __( 'Search Surges', 'water-tower' ),
		'not_found'          => __( 'No surges found', 'water-tower' ),
		'not_found_in_trash' => __( 'No surges found in the Trash', 'water-tower' ), 
		'menu_name'          => __( 'Surges', 'water-tower' ),
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our surges and surge specific data',
		'public'        => true,
		'menu_position' => 6,
		'menu_icon'			 => 'dashicons-welcome-learn-more',
		'supports'      => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'show_in_menu'  => 'edit.php?post_type=target_nations',
		'has_archive'   => true,
		'taxonomies' 	=> array('post_tag'),
		'rewrite' => array('slug' => 'surges'), 
	);
	register_post_type( 'surges', $args );	
}
add_action( 'init', 'my_custom_post_surge' );

?>