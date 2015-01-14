<?php

//----------------------------------------//
//----- ADD WATER TOWER OPTIONS PAGE -----//
//----------------------------------------//


	//----- ADD THEME OPTIONS LINK UNDER APPEARANCE TAB -----//
	function theme_options_page() {
	add_theme_page('Water Tower Options', 'Water Tower', 'manage_options', 'theme_options', 'theme_options_page_display');
	}
	add_action('admin_menu', 'theme_options_page');

	// display the admin options page
	function theme_options_page_display() {
	?>
	<div class="wrap">
	<?php screen_icon(); ?>
	<h2>Water Tower Settings</h2>
	
	<?php $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'display_options'; ?> 
	
	<h2 class="nav-tab-wrapper">  
        <a href="?page=theme_options&tab=display_options" class="nav-tab <?php echo $active_tab == 'display_options' ? 'nav-tab-active' : ''; ?>">Display</a>
        <a href="?page=theme_options&tab=front_page_options" class="nav-tab <?php echo $active_tab == 'front_page_options' ? 'nav-tab-active' : ''; ?>">Front Page</a>  
        <a href="?page=theme_options&tab=program_options" class="nav-tab <?php echo $active_tab == 'program_options' ? 'nav-tab-active' : ''; ?>">Programs</a>
        <a href="?page=theme_options&tab=social_options" class="nav-tab <?php echo $active_tab == 'social_options' ? 'nav-tab-active' : ''; ?>">Social</a>
        <a href="#" class="nav-tab">Authors</a>  
    </h2>

		<form action="options.php" method="post">
			
			<?php 
			if ( $active_tab == 'display_options' ) {
				settings_fields('display_options');
				do_settings_sections('display_options');
			
			} elseif ( $active_tab == 'front_page_options' ) {
				settings_fields('front_page_options');
				do_settings_sections('front_page_options');
			
			} elseif ( $active_tab == 'program_options' ) {
				settings_fields('program_options');
				do_settings_sections('program_options');
			
			} elseif ( $active_tab == 'social_options' ) {
				settings_fields('social_options');
				do_settings_sections('social_options');
				
			} else {

			} 
			?>
			 
			<input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" class="button button-primary" />
		</form>
	</div>
	 
	<?php }
	
	
	//----- REGISTER ALL SETTINGS -----//			
	function water_tower_admin_init(){
		
	
		//----- REGISTER GENERAL SETTINGS -----//
		register_setting( 'general_options', 'general_options');
		
			//----- PROGRAM SETTINGS -----//
			add_settings_section('program_settings', 'Program Settings', 'program_settings_text', 'program_options');
					add_settings_field('ongoing_program_message', 'Ongoing Program Message', 'get_ongoing_program_message', 'program_options', 'program_settings');
					add_settings_field('program_open_app_color', 'Open Application Color', 'get_program_settings_open_app_color', 'program_options', 'program_settings');
					add_settings_field('program_closed_app_color', 'Closed Application Color', 'get_program_settings_closed_app_color', 'program_options', 'program_settings');
	
		//----- REGISTER DISPLAY OPTIONS SETTINGS -----//
		register_setting( 'display_options', 'display_options' );
		
			//----- CLASSIFICATION COLOR SETTINGS -----//	
			add_settings_section('classification_colors', 'Color Settings', 'classification_colors_text', 'display_options');
				add_settings_field('discipleship_training_schools_color', 'Discipleship Training School Color', 'display_options_dts_color', 'display_options', 'classification_colors');
				add_settings_field('biblical_studies_color', 'Biblical Studies Color', 'display_options_biblical_studies_color', 'display_options', 'classification_colors');
				add_settings_field('secondary_schools_color', 'Secondary Schools Color', 'display_options_secondary_schools_color', 'display_options', 'classification_colors');
				add_settings_field('seminars_color', 'Seminars Color', 'display_options_seminars_color', 'display_options', 'classification_colors');
				add_settings_field('summer_programs_color', 'Summer Programs Color', 'display_options_summer_programs_color', 'display_options', 'classification_colors');
				add_settings_field('career_discipleship_color', 'Career Discipleship Color', 'display_options_career_discipleship_color', 'display_options', 'classification_colors');
	
	
		//----- REGISTER FRONT PAGE SETTINGS -----//
		register_setting( 'front_page_options', 'front_page_options');
		
			//----- FRONT PAGE BANNER SETTINGS -----//
			add_settings_section('front_page_banner_settings', 'Banner Settings', 'banner_settings_text', 'front_page_options');
					add_settings_field('alert_status', 'Alert Status', 'get_alert_status', 'front_page_options', 'front_page_banner_settings');
					add_settings_field('alert_status_message', 'Alert Status Message', 'get_alert_status_message', 'front_page_options', 'front_page_banner_settings');
			
			//----- FRONT PAGE MODULES -----//
	
		
		
		//----- REGISTER PROGRAM SETTINGS -----//
		register_setting( 'program_options', 'program_options');
		
			//----- PROGRAM SETTINGS -----//
			add_settings_section('program_settings', 'Program Settings', 'program_settings_text', 'program_options');
					add_settings_field('ongoing_program_message', 'Ongoing Program Message', 'get_ongoing_program_message', 'program_options', 'program_settings');
					add_settings_field('ongoing_support_desc', 'Ongoing Support Description', 'get_ongoing_support_desc', 'program_options', 'program_settings');
					add_settings_field('program_open_app_color', 'Open Application Color', 'get_program_settings_open_app_color', 'program_options', 'program_settings');
					add_settings_field('program_closed_app_color', 'Closed Application Color', 'get_program_settings_closed_app_color', 'program_options', 'program_settings');
		
		//----- SOCIAL MEDIA SETTINGS -----//
		register_setting( 'social_options', 'social_options');
			
			//-----SOCIAL MEDIA SETTINGS -----//
			add_settings_section('application_options', 'Application Settings', 'application_settings_text', 'social_options');
				add_settings_field('apply_link_url', 'Application Link URL', 'get_apply_link_url', 'social_options', 'application_options');
				
			add_settings_section('social_media_options', 'Social Media Settins', 'social_media_settings_text', 'social_options');
				add_settings_field('facebook_url', 'Facebook Page URL', 'get_facebook_url', 'social_options', 'social_media_options');
				add_settings_field('twitter_url', 'Twitter Page URL', 'get_twitter_url', 'social_options', 'social_media_options');
				add_settings_field('instagram_url', 'Instagram Page URL', 'get_instagram_url', 'social_options', 'social_media_options');
				add_settings_field('vimeo_url', 'Vimeo Page URL', 'get_vimeo_url', 'social_options', 'social_media_options');
		
	}
	add_action('admin_init', 'water_tower_admin_init');
	
	
	
	//----- GENERAL SETTINGS MARKUP -----//
	function general_settings_text() {
		echo '<p>Below are all of the general settings of the website.</p>';
	}
	
	
	
	
	//----- PROGRAM CLASSIFICATION COLOR SETTINGS MARKUP -----//
	function classification_colors_text() {
		echo '<p>Select the colors for each program classification.  These will be displayed in various places on the site and should only be changed after careful consideration.  These colors tie into the design, layout, and overall look and feel of the website.</p>';
	}
	
		function display_options_dts_color() {
			$options = get_option('display_options');
			echo "<input id='display_options_text_string' style='color: white; font-weight: bold; background: #{$options['discipleship_training_schools_color']};' name='display_options[discipleship_training_schools_color]' name='display_options[discipleship_training_schools_color]' size='40' type='text' value='{$options['discipleship_training_schools_color']}' />";
		}
		
		function display_options_biblical_studies_color() {
			$options = get_option('display_options');
			echo "<input id='biblical_studies_color' style='color: white; font-weight: bold; background: #{$options['biblical_studies_color']};' name='display_options[biblical_studies_color]' name='display_options[biblical_studies_color]' size='40' type='text' value='{$options['biblical_studies_color']}' />";
		}
		
		function display_options_secondary_schools_color() {
			$options = get_option('display_options');
			echo "<input id='secondary_schools_color' style='color: white; font-weight: bold; background: #{$options['secondary_schools_color']};' name='display_options[secondary_schools_color]' size='40' type='text' value='{$options['secondary_schools_color']}' />";
		}
		
		function display_options_seminars_color() {
			$options = get_option('display_options');
			echo "<input id='seminars_color' style='color: white; font-weight: bold; background: #{$options['seminars_color']};' name='display_options[seminars_color]' name='display_options[seminars_color]' size='40' type='text' value='{$options['seminars_color']}' />";
		}
		
		function display_options_summer_programs_color() {
			$options = get_option('display_options');
			echo "<input id='summer_programs_color' style='color: white; font-weight: bold; background: #{$options['summer_programs_color']};' name='display_options[summer_programs_color]' name='display_options[summer_programs_color]' size='40' type='text' value='{$options['summer_programs_color']}' />";
		}
		
		function display_options_career_discipleship_color() {
			$options = get_option('display_options');
			echo "<input id='career_discipleship_color' style='color: white; font-weight: bold; background: #{$options['career_discipleship_color']};' name='display_options[career_discipleship_color]' name='display_options[career_discipleship_color]' size='40' type='text' value='{$options['career_discipleship_color']}' />";
		}
	
	
	
	
	//----- FRONT PAGE SETTINGS MARKUP -----//
	function banner_settings_text() {
		echo '<p>Use this section to alter how the banner on the front page functions.  Through this section you can do things like activate the alert status that allows you to relay a message through our front page banner, or you can simply override slides by activating the override and selecting the ID of the post you would like to display in its place.</p>';
	}
		function get_alert_status() {
			$options = get_option('front_page_options');
			echo "<input id='alert_status' name='front_page_options[alert_status]' type='checkbox' value='0' " . checked(0, $options['alert_status'], false) . "/>";
		}
		
		function get_alert_status_message() {
			$options = get_option('front_page_options');
			echo "<textarea id='alert_status_message' name='front_page_options[alert_status_message]' rows='5' cols='50'>";
			echo $options['alert_status_message'];
			echo '</textarea>';
		}
		
		
		
		
	//----- PROGRAM SETTINGS MARKUP -----//
	function program_settings_text() {
		echo '<p>Use this section to make changes to the functionality of our programs pages and archive page.  These settings may or may not effect all programs depending on which setting is changed.  Settings found here will be propagated throughout the website in multiple places, so make changes wisely, and sparingly.</p>';
	}
	
		function get_ongoing_program_message() {
			$options = get_option('program_options');
			echo "<textarea id='ongoing_program_message' name='program_options[ongoing_program_message]' rows='5' cols='50'>";
			echo $options['ongoing_program_message'];
			echo '</textarea>';
		}
		
		function get_ongoing_support_desc() {
			$options = get_option('program_options');
			echo "<textarea id='ongoing_support_desc' name='program_options[ongoing_support_desc]' rows='5' cols='50'>";
			echo $options['ongoing_support_desc'];
			echo '</textarea>';
		}
		
		function get_program_settings_open_app_color() {
			$options = get_option('program_options');
			echo "<input id='program_open_app_color' style='color: white; font-weight: bold; background: #{$options['program_open_app_color']};' name='program_options[program_open_app_color]' name='program_options[program_open_app_color]' size='40' type='text' value='{$options['program_open_app_color']}' />";
		}
		
		function get_program_settings_closed_app_color() {
			$options = get_option('program_options');
			echo "<input id='program_closed_app_color' style='color: white; font-weight: bold; background: #{$options['program_closed_app_color']};' name='program_options[program_closed_app_color]' name='program_options[program_closed_app_color]' size='40' type='text' value='{$options['program_closed_app_color']}' />";
		}



//----- SOCIAL SETTINGS MARKUP -----//
	function social_settings_text() {
		echo '<p>Below are all of the general settings of the website.</p>';
	}
	
	function application_settings_text() {
		echo '<p>These settings will affect the way anything related to our application process behave</p>';
	}
		
		function get_apply_link_url() {
			$options = get_option('social_options');
			echo "<input id='apply_link_url' name='social_options[apply_link_url]' name='social_options[apply_link_url]' size='40' type='text' value='{$options['apply_link_url']}' />";
		}
	
	//----- SOCIAL MEDIA SECTION -----//	
	function social_media_settings_text() {
		echo '<p>Below are all of the social media settings for the website including links to our existing profiles on social media sites, along with API keys to the sites so that we can interact with the data stored on the servers of those sites.  API keys should only be changed by those who have access to, and understand how Water Tower is programmed to work.  API keys should not be changed frequently, if ever.</p>';
	}
	
		function get_facebook_url() {
			$options = get_option('social_options');
			echo "<input id='facebook_url' name='social_options[facebook_url]' name='social_options[facebook_url]' size='40' type='text' value='{$options['facebook_url']}' />";
		}
		
		function get_twitter_url() {
			$options = get_option('social_options');
			echo "<input id='twitter_url' name='social_options[twitter_url]' name='social_options[twitter_url]' size='40' type='text' value='{$options['twitter_url']}' />";
		}
		
		function get_instagram_url() {
			$options = get_option('social_options');
			echo "<input id='instagram_url' name='social_options[instagram_url]' name='social_options[instagram_url]' size='40' type='text' value='{$options['instagram_url']}' />";
		}
		
		function get_vimeo_url() {
			$options = get_option('social_options');
			echo "<input id='vimeo_url' name='social_options[vimeo_url]' name='social_options[vimeo_url]' size='40' type='text' value='{$options['vimeo_url']}' />";
		}

?>