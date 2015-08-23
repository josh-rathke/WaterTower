<?php

/**
 * 	About Us
 * 	This is the custom meta for the about us page.
 */

$meta_boxes[] = array(
	'title'  => 'Our Story',
	'pages' => array('page'),
	'context' => 'normal',
	'priority' => 'low',
	'fields' => array(

		//PanoID Beginning Pano
		array(
			'name'	=> '',
			'id'	=> "{$prefix}about_ywam",
			'type'	=> 'wysiwyg',
		),
	),
	'only_on'    => array(
		'id'       => array(),
		'template' => array( 'page-about.php' ),
		'parent'   => array(),
	),
);

$meta_boxes[] = array(
	'title'  => 'YWAM Montana Values',
	'pages' => array('page'),
	'context' => 'normal',
	'priority' => 'low',
	'fields' => array(

		//PanoID Beginning Pano
		array(
			'name'	=> '',
			'id'	=> "{$prefix}core_values",
			'type'	=> 'wysiwyg',
		),
	),
	'only_on'    => array(
		'id'       => array(),
		'template' => array( 'page-about.php' ),
		'parent'   => array(),
	),
);