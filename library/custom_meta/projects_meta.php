<?php

/*	Project Informatin Custom Meta
 *	This is where all of the standard information for a
 *	project should be stored.
 */

$meta_boxes[] = array(
	'title'  => 'Project Information',
	'pages' => array( 'projects'),
	'context' => 'side',
	'priority' => 'high',
	'fields' => array(

		//Project Status
		array (
			'name'	=> 'Project Status',
			'id'	=> "{$prefix}project_status",
			'type'	=> 'select',
			'options' => array (
				'active' => 'Active',
				'archived'	  => 'archived',
			),
		),

		//Project Classification
		array(
			'name' => 'Project Classification',
			'id'   => "{$prefix}project_classification",
			'type' => 'select',
			'options'  => array(
				'capital'		=> 'Capital Campaign',
				'department'	=> 'Departmental Campaign',
				'outreach'		=> 'Outreach Campaign',
			),
		),
	),
);

?>