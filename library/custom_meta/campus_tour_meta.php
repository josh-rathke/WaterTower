<?php

/**
 * 	Campus Tour
 * 	This is the custom meta for the campus
 * 	tour page and venues.
 */

$meta_boxes[] = array(
	'title'  => 'Campus Tour Info',
	'pages' => array('page'),
	'context' => 'normal',
	'priority' => 'low',
	'fields' => array(

		//PanoID Beginning Pano
		array(
			'name'	=> 'Beginning Pano',
			'id'	=> "{$prefix}beginning_pano",
			'type'	=> 'text',
		),

		//How-To Use the Campus Tour
		array(
			'name'	=> 'Campus Tour How-To',
			'id'	=> "{$prefix}campus_tour_howto",
			'type'	=> 'textarea',
		),
	),
	'only_on'    => array(
		'id'       => array(),
		'template' => array( 'campus-tour.php' ),
		'parent'   => array(),
	),
);

$meta_boxes[] = array(
	'title'  => 'Campus Tour Options',
	'pages' => array( 'tribe_venue'),
	'context' => 'side',
	'priority' => 'high',
	'fields' => array(

		//Include in Campus Tour
		array(
			'name'	=> 'Include in Campus Tour',
			'id'	=> "{$prefix}include_in_tour",
			'type'	=> 'checkbox',
		),

		//Photosphere ID
		array(
			'name'	=> 'Photosphere ID',
			'id'	=> "{$prefix}photosphere_id",
			'type'	=> 'text',
			'desc'	=> 'Input the photosphere ID of this particular venue.',
		),

		//Photosphere URL
		array(
			'name'	=> 'Photosphere URL',
			'id'	=> "{$prefix}photosphere_url",
			'type'	=> 'text',
			'desc'	=> 'Input the photosphere URL that links back to the photosphere hosted on google.com',
		),
	),
);