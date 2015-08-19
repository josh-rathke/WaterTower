<?php

/*	Featured Video Custom Meta
 */

$meta_boxes[] = array(
	'title'  => 'Featured Video Settings',
	'pages' => array( 'page', 'post', 'program', 'surges' ),
	'context' => 'normal',
	'priority' => 'low',
	'fields' => array(

		// RADIO BUTTONS
		array(
			'name'    => __( 'Enable Video', 'meta-box' ),
			'id'      => "{$prefix}enable_featured_video",
			'type'    => 'checkbox',
			'std' => 0,
		),
        
        // FILE UPLOAD
        array(
            'name' => __( 'MP4 File Upload', 'meta-box' ),
            'id'   => "{$prefix}mp4_file",
            'type' => 'file_advanced',
            'max_file_uploades' => 1,
        ),
        
        // FILE UPLOAD
        array(
            'name' => __( 'WEBM File Upload', 'meta-box' ),
            'id'   => "{$prefix}webm_file",
            'type' => 'file_advanced',
            'max_file_uploades' => 1,
        ),
	),
);

?>