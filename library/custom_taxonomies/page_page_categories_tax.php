<?php

/*	Page Category Taxonomy
 *	This taxonomy allows us to assing specific categories
 *	to pages, which then allow us to target and format specific
 *	pages for specific purposes without the need for an entirely
 *	new custom post type. This also allows us to pull specific
 *	pages into the menu under the guise of specific categories.
 */

function my_taxonomies_page_category() {
	$labels = array(
		'name'              => _x( 'Page Category', 'taxonomy general name', 'water-tower' ),
		'singular_name'     => _x( 'Page Category', 'taxonomy singular name', 'water-tower' ),
		'search_items'      => __( 'Search Page Categories', 'water-tower' ),
		'all_items'         => __( 'All Page Categories', 'water-tower' ),
		'parent_item'       => __( 'Parent Page Category', 'water-tower' ),
		'parent_item_colon' => __( 'Parent Page Category:', 'water-tower' ),
		'edit_item'         => __( 'Edit Page Category', 'water-tower' ),
		'update_item'       => __( 'Update Page Category', 'water-tower' ),
		'add_new_item'      => __( 'Add New Page Category', 'water-tower' ),
		'new_item_name'     => __( 'New Page Category', 'water-tower' ),
		'menu_name'         => __( 'Page Categories', 'water-tower' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'rewrite' => array('hierarchical' => true ),
		'show_admin_column' => true,
		'slug' => 'page-category'
	);
	register_taxonomy( 'page_category', array('page'), $args );
}
add_action( 'init', 'my_taxonomies_page_category', 0 );

?>