<?php

/**
 * 	Social Media Admin Options
 * 	These may contain things like profile urls, and
 * 	API keys.
 */

$options[] = array(
	'name' => __( 'Social & External Links', 'options_framework_theme' ),
	'type' => 'heading',
	);

// Social Media Settings
$options[] = array(
	'name' => __( 'Instagram Profile URL', 'options_framework_theme' ),
	'desc' => __( '', 'options_framework_theme' ),
	'id' => 'instagram_url',
	'std' => 'https://instagram.com/ywammontanalakeside',
	'type' => 'text',
	);

$options[] = array(
	'name' => __( 'Facebook Profile URL', 'options_framework_theme' ),
	'desc' => __( '', 'options_framework_theme' ),
	'id' => 'facebook_url',
	'std' => 'https://www.facebook.com/ywammontana',
	'type' => 'text',
	);

$options[] = array(
	'name' => __( 'Vimeo Profile URL', 'options_framework_theme' ),
	'desc' => __( '', 'options_framework_theme' ),
	'id' => 'vimeo_url',
	'std' => 'https://vimeo.com/ywammontana',
	'type' => 'text',
	);

$options[] = array(
	'name' => __( 'Twitter Profile URL', 'options_framework_theme' ),
	'desc' => __( '', 'options_framework_theme' ),
	'id' => 'twitter_url',
	'std' => 'https://twitter.com/ywammontana',
	'type' => 'text',
	);

$options[] = array(
	'name' => __( 'Pinterest Profile URL', 'options_framework_theme' ),
	'desc' => __( '', 'options_framework_theme' ),
	'id' => 'pinterest_url',
	'std' => 'https://www.pinterest.com/ywammontana/',
	'type' => 'text',
	);


// Application Settings
$options[] = array(
	'name' => __( 'Application Link URL', 'options_framework_theme' ),
	'desc' => __( 'This is the url that potential students will be redirected to upon clicking any of the "apply" buttons found throughout the website.', 'options_framework_theme' ),
	'id' => 'apply_url',
	'std' => 'apply.ywammontana.org',
	'type' => 'text',
	);
	

// Instagram API Info
$options[] = array(
	'name' => __( 'Instagram Client ID', 'options_framework_theme' ),
	'desc' => __( '', 'options_framework_theme' ),
	'id' => 'instagram_clientid',
	'std' => '',
	'type' => 'text',
	);
	
$options[] = array(
	'name' => __( 'Instagram Client Secret', 'options_framework_theme' ),
	'desc' => __( '', 'options_framework_theme' ),
	'id' => 'instagram_clientsecret',
	'std' => '',
	'type' => 'text',
	);
	
$options[] = array(
	'name' => __( 'Instagram Access Token', 'options_framework_theme' ),
	'desc' => __( '', 'options_framework_theme' ),
	'id' => 'instagram_accesstoken',
	'std' => '',
	'type' => 'text',
	);
?>