</section>

<footer class="footer">
	<?php do_action('watertower_before_footer'); ?>
	<?php dynamic_sidebar("footer-widgets"); ?>
	<?php do_action('watertower_after_footer'); ?>
	
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
	  $result = fetchData("https://api.instagram.com/v1/users/231333075/media/recent/?access_token=231333075.ab103e5.3476407678e643b5a846cf26ad1efc72");
	  $result = json_decode($result);
	  foreach ($result->data as $post) {
	    print_r($post);
	  }
	?>	
	
</footer>

<a class="exit-off-canvas"></a>

	<?php do_action('watertower_layout_end'); ?>
	</div>
</div>
<?php wp_footer(); ?>
<?php do_action('watertower_before_closing_body'); ?>
</body>
</html>