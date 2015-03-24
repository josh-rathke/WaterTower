<?php

$meta_boxes[] = array(
	'title'  => 'Annual Report Info',
	'pages' => array( 'page'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		//E-Magazine Embed Code
		array (
			'name'	=> 'E-Magazine Embed Code',
			'id'	=> "{$prefix}embed_code",
			'type'	=> 'textarea',
		),

		//Year Range
		array (
			'name'	=> 'Report Year Range',
			'id'	=> "{$prefix}year_range",
			'type'	=> 'text',
		),
	),
	'only_on'    => array(
		'id'       => array(),
		'template' => array(),
		'parent'   => array(get_page_by_path( 'annual-reports' )->ID)
	),
);

?>