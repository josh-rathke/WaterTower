<?php

/*	Focus Tracks Custom Meta
 *	This is where we define all of the custom
 * 	meta fields for the Focus Tracks custom post type.
 */

$meta_boxes[] = array(
	'title'  => 'Track Info',
	'pages' => array( 'focus_tracks'),
	'context' => 'side',
	'priority' => 'low',
	'fields' => array(

		array(
			'name'             => __( 'Focus Track Icon', 'meta-box' ),
			'id'               => "{$prefix}focus_track_icon",
			'type'             => 'image_advanced',
			'max_file_uploads' => 1,
		),
        
        array(
				'name' => __( 'Track Video', 'meta-box' ),
				'desc' => __( 'Insert the embed code for the video you would like to use for this track.', 'meta-box' ),
				'id'   => "{$prefix}focus_track_video",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
			),

		// CHECKBOX LIST
		array(
			'name'    => __( 'Quarters Offered', 'meta-box' ),
			'id'      => "{$prefix}focus_tracks_quarters",
			'type'    => 'checkbox_list',
			'options' => array(
				'Fall' => __( 'Fall', 'meta-box' ),
				'Winter' => __( 'Winter', 'meta-box' ),
				'Spring' => __( 'Spring', 'meta-box' ),
				'Summer' => __( 'Summer', 'meta-box' ),
			),
		),
	),
);

?>