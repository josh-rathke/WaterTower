<?php

/*	Teaching Types Taxonomy
 *	This taxonomy allows us to assigne a type to each
 *	teaching we publish to help people filter through the
 *	different types of teachings we have.
 */

function my_taxonomies_teaching_types() {
	$labels = array(
		'name'              => _x( 'Teaching Types', 'taxonomy general name', 'water-tower' ),
		'singular_name'     => _x( 'Teaching Type', 'taxonomy singular name', 'water-tower' ),
		'search_items'      => __( 'Search Teaching Types', 'water-tower' ),
		'all_items'         => __( 'All Teaching Types', 'water-tower' ),
		'parent_item'       => __( 'Parent Teaching Type', 'water-tower' ),
		'parent_item_colon' => __( 'Parent Teaching Types:', 'water-tower' ),
		'edit_item'         => __( 'Edit Teaching Type', 'water-tower' ), 
		'update_item'       => __( 'Update Teaching Type', 'water-tower' ),
		'add_new_item'      => __( 'Add New Teaching Type', 'water-tower' ),
		'new_item_name'     => __( 'New Teaching Type', 'water-tower' ),
		'menu_name'         => __( 'Teaching Types', 'water-tower' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'rewrite' => array(
			'slug' => 'teachings/teaching-types',
		),
	);
	register_taxonomy( 'teaching_types', array( 'teachings' ), $args );
}
add_action( 'init', 'my_taxonomies_teaching_types', 0 );

?>