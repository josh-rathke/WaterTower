<?php

/*	Teachings Custom Post Type
 *	The teachings custom post type allows us to display
 *	all of the teaching content that we have whether it
 *	be video content, or audio content, or even text based
 *	content, this is how we share what is going on in our
 *	classrooms.
 */
 
function my_custom_post_teachings() {
	$labels = array(
		'name'               => _x( 'Teachings', 'post type general name', 'water-tower' ),
		'singular_name'      => _x( 'Teaching', 'post type singular name', 'water-tower' ),
		'add_new'            => _x( 'Add New', 'book', 'water-tower' ),
		'add_new_item'       => __( 'Add New Teaching', 'water-tower' ),
		'edit_item'          => __( 'Edit Teaching', 'water-tower' ),
		'new_item'           => __( 'New Teaching', 'water-tower' ),
		'all_items'          => __( 'All Teachings', 'water-tower' ),
		'view_item'          => __( 'View Teaching', 'water-tower' ),
		'search_items'       => __( 'Search Teachings', 'water-tower' ),
		'not_found'          => __( 'No teachings found', 'water-tower' ),
		'not_found_in_trash' => __( 'No teachings found in the Trash', 'water-tower' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Teachings',
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our teachings and teaching specific data',
		'public'        => true,
		'menu_position' => 12,
		'menu_icon'		=> 'dashicons-microphone',
		'supports'      => array( 'title', 'author', 'editor', 'thumbnail', 'comments',  'revisions' ),
		'has_archive'   => true,
		'taxonomies' 	=> array('post_tag'),
	);
	register_post_type( 'teachings', $args );	
}
add_action( 'init', 'my_custom_post_teachings' );

?>