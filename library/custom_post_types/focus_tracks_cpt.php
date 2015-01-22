<?php

/** Focus Tracks Custom Post Type
 * 	This post type holds all of the information relavent to the
 * 	many focus tracks we offer in our schools.
 */
 
 
function focus_tracks_cpt() {
	$labels = array(
		'name'               => _x( 'Focus Tracks', 'post type general name', 'water-tower' ),
		'singular_name'      => _x( 'Focus Track', 'post type singular name', 'water-tower' ),
		'add_new'            => _x( 'Add New Focus Track', 'book', 'water-tower' ),
		'add_new_item'       => __( 'Add New Focus Track', 'water-tower' ),
		'edit_item'          => __( 'Edit Focus Track', 'water-tower' ),
		'new_item'           => __( 'New Focus Track', 'water-tower' ),
		'all_items'          => __( 'Focus Tracks', 'water-tower' ),
		'view_item'          => __( 'View Focus Track', 'water-tower' ),
		'search_items'       => __( 'Search Focus Tracks', 'water-tower' ),
		'not_found'          => __( 'No focus tracks found', 'water-tower' ),
		'not_found_in_trash' => __( 'No focus tracks found in the Trash', 'water-tower' ), 
		'menu_name'          => __( 'Surges', 'water-tower' ),
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our focus tracks and focus track specific data',
		'public'        => true,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'show_in_menu'  => 'edit.php?post_type=program',
		'has_archive'   => true,
		'rewrite' => array('slug' => 'focus-tracks'), 
		'taxonomies' 	=> array('post_tag'),
	);
	register_post_type( 'focus_tracks', $args );	
}
add_action( 'init', 'focus_tracks_cpt' );

?>