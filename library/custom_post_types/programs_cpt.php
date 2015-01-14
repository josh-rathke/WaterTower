<?php

/* Programs Custom Post Type
 * The programs custom post type contains all of our programs
 * specific data including dates, costs, descriptions etc.
 */
 
 
function my_custom_post_program() {
	$labels = array(
		'name'               => _x( 'Programs', 'post type general name', 'water-tower' ),
		'singular_name'      => _x( 'Program', 'post type singular name', 'water-tower' ),
		'add_new'            => _x( 'Add New', 'book', 'water-tower' ),
		'add_new_item'       => __( 'Add New Program', 'water-tower' ),
		'edit_item'          => __( 'Edit Program', 'water-tower' ),
		'new_item'           => __( 'New Program', 'water-tower' ),
		'all_items'          => __( 'All Programs', 'water-tower' ),
		'view_item'          => __( 'View Program', 'water-tower' ),
		'search_items'       => __( 'Search Programs', 'water-tower' ),
		'not_found'          => __( 'No programs found', 'water-tower' ),
		'not_found_in_trash' => __( 'No programs found in the Trash', 'water-tower' ), 
		'menu_name'          => __( 'Programs', 'water-tower' ),
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our programs and program specific data',
		'public'        => true,
		'menu_position' => 6,
		'menu_icon'			 => 'dashicons-welcome-learn-more',
		'supports'      => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'has_archive'   => true,
		'taxonomies' 	=> array('post_tag'),
		'rewrite' => array('slug' => 'programs'), 
	);
	register_post_type( 'program', $args );	
}
add_action( 'init', 'my_custom_post_program' );

?>