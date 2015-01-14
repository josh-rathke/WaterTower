<?php
				
/*	Archive Standard Loop
 *	This loop is the standard archive loop used for most of
 *	the archives within Water Tower.
 */

?>

<div class="row">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php
	
	/*	Get the Country Info
	 *	This will connect to joshuaproject.org and retrieve
	 *	all of the data available through the API.
	 */
	 
	if (rwmb_meta('country_id')) {
		$domain = "http://api.joshuaproject.net";
		$api_key = "491f2410d044";
		$country_id = rwmb_meta('country_id');
		$url = $domain . "/v1/countries/{$country_id}.json?api_key=" . $api_key;
		
		// Open Connection
		$ch = curl_init();
		
		// Set Curl Options
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		
		// Execute Request
		$result = curl_exec($ch) or die(curl_error($ch));
		
		// Kill Connection
		curl_close($ch);
		
		// Decode JSON Response
		$decoded_json = json_decode($result, true);
			
		// Check for JSON Errors
		if (!is_array($decoded_json)) {
		    echo "Unable to retrieve the JSON.";
		    exit;
		}
		
		$target_nation = $decoded_json[0];
	}
	?>



 	<a href="<?php the_permalink(); ?>">
	 	<div id="post-<?php the_ID(); ?>" <?php post_class('tn-archive-target-nation-container col-md-4'); ?>>
			<?php the_post_thumbnail('16:9-media-thumbnail', array('class'=>'img-responsive')); ?>
			
			<div class="tn-archive-target-nation-label">
				<h2><?php the_title(); ?></h2>
			</div>	
	 	</div>
 	</a>

<?php endwhile; else: ?>
	<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
</div>