<?php

/*	Programs Taxonomy
 *	This taxonomy is auto-populated with the programs
 *	custom post type entries upon creation or modification
 *	of each post.  This taxonomy allows us to assign posts to
 *	particular programs.
 */

function my_taxonomies_program_taxo() {
	$labels = array(
		'name'              => _x( 'Programs', 'taxonomy general name', 'water-tower' ),
		'singular_name'     => _x( 'Program', 'taxonomy singular name', 'water-tower' ),
		'search_items'      => __( 'Search Programs', 'water-tower' ),
		'all_items'         => __( 'All Programs', 'water-tower' ),
		'parent_item'       => __( 'Parent Program', 'water-tower' ),
		'parent_item_colon' => __( 'Parent Program:', 'water-tower' ),
		'edit_item'         => __( 'Edit Program', 'water-tower' ),
		'update_item'       => __( 'Update Program', 'water-tower' ),
		'add_new_item'      => __( 'Add New Program', 'water-tower' ),
		'new_item_name'     => __( 'New Program', 'water-tower' ),
		'menu_name'         => __( 'Programs', 'water-tower' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'rewrite' => array(
			'hierarchical' => true,
			'slug'	=> 'program-blogs',
		),
		'show_admin_column' => true,
	);
	register_taxonomy( 'program_taxo', array( 'post', 'teachings', 'user', 'class_portfolios', 'focus_tracks' ), $args );
}
add_action( 'init', 'my_taxonomies_program_taxo', 0 );

?>