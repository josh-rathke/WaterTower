<?php

/*	Program Classifcation Taxonomy
 *	This taxonomy allows us to add a classification
 *	to each of our programs so that we can better
 *	sort through them.
 */
function my_taxonomies_program_classification() 
{
    $labels = array(
    'name'              => _x('Classifications', 'taxonomy general name', 'water-tower'),
    'singular_name'     => _x('Classification', 'taxonomy singular name', 'water-tower'),
    'search_items'      => __('Search Classifications', 'water-tower'),
    'all_items'         => __('All Classifications', 'water-tower'),
    'parent_item'       => __('Parent Classification', 'water-tower'),
    'parent_item_colon' => __('Parent Classification:', 'water-tower'),
    'edit_item'         => __('Edit Classification', 'water-tower'), 
    'update_item'       => __('Update Classification', 'water-tower'),
    'add_new_item'      => __('Add New Classification', 'water-tower'),
    'new_item_name'     => __('New Classification', 'water-tower'),
    'menu_name'         => __('Classifications', 'water-tower'),
    );
    $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'rewrite' => array('hierarchical' => true ),
    'show_admin_column' => true,
    'slug' => 'program-classification'
    );
    register_taxonomy('program_classification', array( 'program' ), $args);
}
add_action('init', 'my_taxonomies_program_classification', 0);

?>