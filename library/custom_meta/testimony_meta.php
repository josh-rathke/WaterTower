<?php

/*	Testimony Custom Meta
 *  This is where all of the custom meta for any of the
 *	testimonies is handled.
 */

$meta_boxes[] = array(
	'title'  => 'Author Information',
	'pages' => array( 'testimonies'),
	'context' => 'side',
	'priority' => 'low',
	'fields' => array(

		array(
			'name'  => 'Author Involvement',
			'id'    => "{$prefix}author_involvement",
			'desc'  => 'How was this person involved in the program or department? For example; "2012 Graduate", or "Department Leader 2010-2014"',
			'type'  => 'text',
			'std'   => '',
	   ),
    ),
);