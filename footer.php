</section>

<?php do_action('watertower_before_footer'); ?>
<footer class="footer">
	<div class="row">
		
		<div class="medium-4 columns">
			<?php //dynamic_sidebar("footer-widgets"); ?>
			
			<?php
			  	function fetchData($url){
				    $ch = curl_init();
				    curl_setopt($ch, CURLOPT_URL, $url);
				    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
				    $result = curl_exec($ch);
				    curl_close($ch); 
				    return $result;
				  }
				  $result = fetchData("https://api.instagram.com/v1/users/231333075/media/recent/?access_token=231333075.1677ed0.66f333818f114fa5b00afae4d1032e7e&count=9");
				  $result = json_decode($result);
				  
				  echo '<ul class="medium-block-grid-3">';
				  foreach ($result->data as $post) {
					echo "<li><img src='{$post->images->low_resolution->url}' /></li>";
				  }
				  echo '</ul>';
			?>
		</div>
	
	</div>
</footer>
<?php do_action('watertower_after_footer'); ?>

<a class="exit-off-canvas"></a>

	<?php do_action('watertower_layout_end'); ?>
	</div>
</div>
<?php wp_footer(); ?>
<?php do_action('watertower_before_closing_body'); ?>
</body>
</html>