<?php

/*	Projects Custom Post Type
 *	This custom post type is used to display the
 *	many projects that are occuring on our base.
 *	Most of the projects that are worthy of being listed
 *	here would be large scale projects that require
 *	some level of fundraising.
 */

function my_custom_post_projects() {
	$labels = array(
		'name'               => _x( 'Projects', 'post type general name', 'water-tower' ),
		'singular_name'      => _x( 'Project', 'post type singular name', 'water-tower' ),
		'add_new'            => _x( 'Add New', 'book', 'water-tower' ),
		'add_new_item'       => __( 'Add New Project', 'water-tower' ),
		'edit_item'          => __( 'Edit Project', 'water-tower' ),
		'new_item'           => __( 'New Project', 'water-tower' ),
		'all_items'          => __( 'All Projects', 'water-tower' ),
		'view_item'          => __( 'View Project', 'water-tower' ),
		'search_items'       => __( 'Search Projects', 'water-tower' ),
		'not_found'          => __( 'No Projects found', 'water-tower' ),
		'not_found_in_trash' => __( 'No Projects found in the Trash', 'water-tower' ),
		'menu_name'          => __('Projects', 'water-tower'),
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our Project specific data',
		'public'        => true,
		'menu_position' => 23,
		'menu_icon'		=> 'dashicons-hammer',
		'supports'      => array( 'title', 'author', 'editor', 'thumbnail', 'revisions' ),
		'has_archive'   => true,
		'taxonomies' 	=> array('post_tag'),
	);
	register_post_type( 'projects', $args );	
}
add_action( 'init', 'my_custom_post_projects' );

?>