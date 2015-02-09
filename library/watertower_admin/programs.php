<?php

/**
 * 	Programs Options
 * 	These are all of the available options that effect
 * 	program pages on a global scale.
 */

$options[] = array(
	'name' => __('Programs', 'options_framework_theme'),
	'type' => 'heading');

$options[] = array(
	'name' => __('Discipleship Training Schools Classification Color', 'options_framework_theme'),
	'desc' => __('This will be the primary classification color that displays for any school classified as a Discipleship Training School.', 'options_framework_theme'),
	'id' => 'discipleship-training-schools-class-color',
	'std' => '#12A157',
	'type' => 'color' );
	
$options[] = array(
	'name' => __('Biblical Studies Classification Color', 'options_framework_theme'),
	'desc' => __('This will be the primary classification color that displays for any school classified as Biblical Studies.', 'options_framework_theme'),
	'id' => 'biblical-studies-class-color',
	'std' => '#00ABBD',
	'type' => 'color' );
	
$options[] = array(
	'name' => __('Secondary Schools Classification Color', 'options_framework_theme'),
	'desc' => __('This will be the primary classification color that displays for any school classified as a Secondary School.', 'options_framework_theme'),
	'id' => 'secondary-schools-class-color',
	'std' => '#ED1284',
	'type' => 'color' );
	
$options[] = array(
	'name' => __('Seminars Classification Color', 'options_framework_theme'),
	'desc' => __('This will be the primary classification color that displays for any school classified as a Seminar.', 'options_framework_theme'),
	'id' => 'seminars-class-color',
	'std' => '#FBAD1D',
	'type' => 'color' );
	
$options[] = array(
	'name' => __('Summer Programs Classification Color', 'options_framework_theme'),
	'desc' => __('This will be the primary classification color that displays for any school classified as a Summer Program.', 'options_framework_theme'),
	'id' => 'summer-programs-class-color',
	'std' => '#F36D24',
	'type' => 'color' );
	
$options[] = array(
	'name' => __('Career Discipleship Classification Color', 'options_framework_theme'),
	'desc' => __('This will be the primary classification color that displays for any school classified as Career Discipleship.', 'options_framework_theme'),
	'id' => 'career-discipleship-class-color',
	'std' => '#2A608D',
	'type' => 'color' );

?>