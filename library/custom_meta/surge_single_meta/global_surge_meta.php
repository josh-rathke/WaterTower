<?php

/*	Page Custom Meta
 *	This is where we define all of the custom
 * 	meta fields for the Pages.
 */

$meta_boxes[] = array(
	'title'  => 'Surge Impact',
	'pages' => array( 'surges'),
	'context' => 'normal',
	'priority' => 'low',
	'fields' => array(

		array(
			'name'    => __( 'Surge Impact Author', 'rwmb' ),
			'id'      => "{$prefix}impact_author",
			'type'    => 'post',
			'post_type' => 'guest-author',
			'field_type' => 'select_advanced',
			'placeholder' => __( 'Select an Item', 'rwmb' ),
			'multiple'    => true,
		),
	),
);

?>