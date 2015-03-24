<?php

/*	Acceptance Packets Custom Meta
 *	This is where we define all of the custom
 * 	meta fields for the Acceptance Packets custom post type.
 */

$meta_boxes[] = array(
	'title'  => 'Additional Info',
	'pages' => array( 'acceptance_packets'),
	'context' => 'normal',
	'priority' => 'low',
	'fields' => array(

		// POST
		array(
			'name'        => __( 'Related Program', 'meta-box' ),
			'id'          => "{$prefix}related_program",
			'type'        => 'post',
			'post_type'   => 'program',
			'field_type'  => 'select_advanced',
			'placeholder' => __( 'Select an Item', 'meta-box' ),
			'query_args'  => array(
				'post_status'    => 'publish',
				'posts_per_page' => - 1,
			)
		),

		// SCHOOL LEADERS

		array(
			'name'    => __( 'School Leaders', 'rwmb' ),
			'id'      => "{$prefix}leaders",
			'type'    => 'post',
			'post_type' => 'guest-author',
			'field_type' => 'select_advanced',
			'placeholder' => __( 'Select an Item', 'rwmb' ),
			'multiple'	=> true,
		),
	),
);

?>