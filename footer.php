</section>

<footer class="footer">
	<?php do_action('watertower_before_footer'); ?>
	<?php //dynamic_sidebar("footer-widgets"); ?>
	
	<?php echo 'something'; ?>
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
		  $result = fetchData("https://api.instagram.com/v1/users/231333075/media/recent/?access_token=231333075.1677ed0.66f333818f114fa5b00afae4d1032e7e");
		  $result = json_decode($result);
		  print_r($result);
		  foreach ($result->data as $post) {
		    print_r($post);
		  }
	?>
	
	<?php do_action('watertower_after_footer'); ?>
</footer>

<a class="exit-off-canvas"></a>

	<?php do_action('watertower_layout_end'); ?>
	</div>
</div>
<?php wp_footer(); ?>
<?php do_action('watertower_before_closing_body'); ?>
</body>
</html>