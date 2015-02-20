<?php

/** Acceptance Packets Custom Post Type
 * 	This post type holds all of the information relavent to the
 * 	many acceptance packets we offer in our schools.
 */
 
 
function acceptance_packets_cpt() {
	$labels = array(
		'name'               => _x( 'Acceptance Packets', 'post type general name', 'water-tower' ),
		'singular_name'      => _x( 'Acceptance Packet', 'post type singular name', 'water-tower' ),
		'add_new'            => _x( 'Add New Acceptance Packet', 'book', 'water-tower' ),
		'add_new_item'       => __( 'Add New Acceptance Packet', 'water-tower' ),
		'edit_item'          => __( 'Edit Acceptance Packet', 'water-tower' ),
		'new_item'           => __( 'New Acceptance Packet', 'water-tower' ),
		'all_items'          => __( 'Acceptance Packets', 'water-tower' ),
		'view_item'          => __( 'View Acceptance Packet', 'water-tower' ),
		'search_items'       => __( 'Search Acceptance Packets', 'water-tower' ),
		'not_found'          => __( 'No acceptance packets found', 'water-tower' ),
		'not_found_in_trash' => __( 'No acceptance packets found in the Trash', 'water-tower' ), 
		'menu_name'          => __( 'Acceptance Packets', 'water-tower' ),
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our acceptance packets and acceptance packet specific data',
		'public'        => true,
		'supports'      => array( 'title', 'editor', 'revisions' ),
		'show_in_menu'  => 'edit.php?post_type=page',
		'has_archive'   => true,
		'rewrite' => array('slug' => 'acceptance-packets'), 
		'taxonomies' 	=> null,
	);
	register_post_type( 'acceptance_packets', $args );	
}
add_action( 'init', 'acceptance_packets_cpt' );

?>