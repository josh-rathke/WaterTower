<?php

/*	Project Taxonomy
 *	This taxonomy allows us to target specific content,
 *	and create a relationship between the content and a project.
 */
 
function my_taxonomies_project_taxo() 
{
    $labels = array(
    'name'              => _x('Projects', 'taxonomy general name', 'water-tower'),
    'singular_name'     => _x('Projects', 'taxonomy singular name', 'water-tower'),
    'search_items'      => __('Search Projects', 'water-tower'),
    'all_items'         => __('All Projects', 'water-tower'),
    'parent_item'       => __('Parent Project', 'water-tower'),
    'parent_item_colon' => __('Parent Project:', 'water-tower'),
    'edit_item'         => __('Edit Project', 'water-tower'), 
    'update_item'       => __('Update Project', 'water-tower'),
    'add_new_item'      => __('Add New Project', 'water-tower'),
    'new_item_name'     => __('New Project', 'water-tower'),
    'menu_name'         => __('Projects', 'water-tower'),
    );
    $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'rewrite'         => array('slug' => 'project-blogs'), 
    'show_admin_column' => true,
    );
    register_taxonomy('project_taxo', array( 'post' ), $args);
}
add_action('init', 'my_taxonomies_project_taxo', 0);


?>