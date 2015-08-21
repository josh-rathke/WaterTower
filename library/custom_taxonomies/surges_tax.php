<?php

/*	Surges Taxonomy
 *	This taxonomy is auto-populated with the surges
 *	custom post type entries upon creation or modification
 *	of each post.  This taxonomy allows us to assign posts to
 *	particular surges.
 */

function surges_taxo() {
	$labels = array(
		'name'              => _x( 'Surges', 'taxonomy general name', 'water-tower' ),
		'singular_name'     => _x( 'Surges', 'taxonomy singular name', 'water-tower' ),
		'search_items'      => __( 'Search Surges', 'water-tower' ),
		'all_items'         => __( 'All Surges', 'water-tower' ),
		'parent_item'       => __( 'Parent Surge', 'water-tower' ),
		'parent_item_colon' => __( 'Parent Surges:', 'water-tower' ),
		'edit_item'         => __( 'Edit Surge', 'water-tower' ),
		'update_item'       => __( 'Update Surge', 'water-tower' ),
		'add_new_item'      => __( 'Add New Surge', 'water-tower' ),
		'new_item_name'     => __( 'New Surge', 'water-tower' ),
		'menu_name'         => __( 'Surges', 'water-tower' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'rewrite' => array(
			'hierarchical' => true,
			'slug'	=> 'surge-timelines',
		),
		'show_admin_column' => false,
	);
	register_taxonomy( 'surges_taxo', array( 'post' ), $args );
}
add_action( 'init', 'surges_taxo', 0 );

?>