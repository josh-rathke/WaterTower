<?php

/*	Class Portfolios Taxonomy
 *	This taxonomy allows us to assign certain posts
 *	and other content to specific class portfolios.
 *
 */

function class_portfolios_taxo() {
	$labels = array(
		'name'              => _x( 'Class Portfolio', 'taxonomy general name', 'water-tower' ),
		'singular_name'     => _x( 'Class Portfolio', 'taxonomy singular name', 'water-tower' ),
		'search_items'      => __( 'Search Class Portfolios', 'water-tower' ),
		'all_items'         => __( 'All Class Portfolios', 'water-tower' ),
		'parent_item'       => __( 'Parent Class Portfolio', 'water-tower' ),
		'parent_item_colon' => __( 'Parent Class Portfolio:', 'water-tower' ),
		'edit_item'         => __( 'Edit Class Portfolio', 'water-tower' ), 
		'update_item'       => __( 'Update Class Portfolio', 'water-tower' ),
		'add_new_item'      => __( 'Add New Class Portfolio', 'water-tower' ),
		'new_item_name'     => __( 'New Class Portfolio', 'water-tower' ),
		'menu_name'         => __( 'Class Portfolio', 'water-tower' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'rewrite' => array('hierarchical' => true ),
	);
	register_taxonomy( 'class_portfolios_taxo', array( 'post' ), $args );
}
add_action( 'init', 'class_portfolios_taxo', 0 );


?>