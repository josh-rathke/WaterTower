<?php

/*	Register Widgetized Sidebars and Areas
 *	This function will register all of the areas defined
 *	within the $widgetized_areas array.
 */


function widgetize_areas_init() {

	
	
	$widgetized_areas = array(
		
		'default_sidebar' 	=>	array (
								'title'	=>	'Default Sidebar',
								'id'	=>	'default_sidebar',
								),
								
		'archives_sidebar' 	=>	array (
								'title'	=>	'Archives Sidebar',
								'id'	=>	'archives_sidebar',
								),
								
		'program_single' 	=>	array (
								'title'	=>	'Programs Sidebar',
								'id'	=>	'program_sidebar',
								),
							
		'teaching_archive'	=>	array (
								'title'	=>	'Teaching Archive',
								'id'	=>	'teaching_archive',	
								),
		
		'target_nations_archive'=> array (
								'title' => 'Target Nations Archive',
								'id'	=> 'target_nations_archive',
								),
								
		'target_nations_single_sidebar'	=> array (
								'title' => 'Target Nation Sidebar',
								'id'	=> 'target_nations_single_sidebar',
								),	
	);
	
	
	// Run through the array, and register all of the sidebars defined.
	foreach ($widgetized_areas as $widgetized_area) {
		register_sidebar( array(
			'name' => $widgetized_area['title'],
			'id' => $widgetized_area['id'],
			'before_widget' => '<div class="clearfix">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		) );
	};
	
}

add_action( 'widgets_init', 'widgetize_areas_init' );




/*	Register 3 Column Widgetized Sidebars and Areas
 *	This function will register all of the areas defined
 *	within the $widgetized_3col_areas array.
 */


function widgetize_3col_areas_init() {

	
	
	$widgetized_3col_areas = array(
	
		'home-page-middle'	=>	array (
								'title' =>	'Home Page Middle',
								'id'	=>	'home-page-middle',
								),
								
		'alumni-page-middle'=>	array (
								'title' =>	'Alumni Page Middle',
								'id'	=>	'alumni-page-middle',
								),			
	);
	
	
	// Run through the array, and register all of the sidebars defined.
	foreach ($widgetized_3col_areas as $widgetized_area) {
		register_sidebar( array(
			'name' => $widgetized_area['title'],
			'id' => $widgetized_area['id'],
			'before_widget' => '<div class="medium-4 columns">',
			'after_widget' => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
		) );
	};
	
}

add_action( 'widgets_init', 'widgetize_3col_areas_init' );


?>