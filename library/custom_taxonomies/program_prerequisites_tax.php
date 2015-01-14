<?php

/*	Program Pre-Requisites Taxonomy
 *	This taxonomy allows us to define the pre-requisites for
 *	each of our schools, which helps potential students create
 *	roadmap for themselves as they work towards a UofN degree.
 */
 
function my_taxonomies_prereqs() {
	$labels = array(
		'name'              => _x( 'Pre Requisite', 'taxonomy general name', 'water-tower' ),
		'singular_name'     => _x( 'Pre Requisite', 'taxonomy singular name', 'water-tower'),
		'search_items'      => __( 'Search Pre Requisites', 'water-tower' ),
		'all_items'         => __( 'All Pre Requisites', 'water-tower' ),
		'parent_item'       => __( 'Parent Pre Requisite', 'water-tower' ),
		'parent_item_colon' => __( 'Parent Pre Requisite:', 'water-tower' ),
		'edit_item'         => __( 'Edit Pre Requisite', 'water-tower' ), 
		'update_item'       => __( 'Update Pre Requisite', 'water-tower' ),
		'add_new_item'      => __( 'Add New Pre Requisite', 'water-tower' ),
		'new_item_name'     => __( 'New Pre Requisite', 'water-tower' ),
		'menu_name'         => __( 'Pre Requisites', 'water-tower' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'rewrite' => array('hierarchical' => true ),
	);
	register_taxonomy( 'prereqs_taxo', array( 'program' ), $args );
}
add_action( 'init', 'my_taxonomies_prereqs', 0 );

?>