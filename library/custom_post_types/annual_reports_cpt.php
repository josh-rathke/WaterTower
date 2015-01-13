<?php

/*	Annual Reports Custom Post Type
 *	This custom post type contains all of our Annual Report
 *	data, which allows us to customize the look and feel of
 *	our annual report pages.
 */
 
function my_custom_post_annual_report() {
	$labels = array(
		'name'               => _x( 'Annual Reports', 'post type general name', 'water-tower' ),
		'singular_name'      => _x( 'Annual Report', 'post type singular name', 'water-tower' ),
		'add_new'            => _x( 'Add New', 'book', 'water-tower' ),
		'add_new_item'       => __( 'Add New Annual Report', 'water-tower' ),
		'edit_item'          => __( 'Edit Annual Report', 'water-tower' ),
		'new_item'           => __( 'New Annual Report', 'water-tower' ),
		'all_items'          => __( 'All Annual Reports', 'water-tower' ),
		'view_item'          => __( 'View Annual Report', 'water-tower' ),
		'search_items'       => __( 'Search Annual Reports', 'water-tower' ),
		'not_found'          => __( 'No Annual Reports found', 'water-tower' ),
		'not_found_in_trash' => __( 'No Annual Reports found in the Trash', 'water-tower' ), 
		'parent_item_colon'  => '',
		'menu_name'          => __( 'Annual Reports', 'water-tower'),
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our Annual Report data',
		'public'        => true,
		'menu_position' => 6,
		'menu_icon'		=> 'dashicons-analytics',
		'supports'      => array( 'title', 'editor', 'thumbnail', 'revisions', 'author' ),
		'has_archive'   => true,
		'taxonomies' 	=> array('post_tag'),
		'rewrite' => array('slug' => 'annual-reports'), 
	);
	register_post_type( 'annual_report', $args );	
}
add_action( 'init', 'my_custom_post_annual_report' );


?>