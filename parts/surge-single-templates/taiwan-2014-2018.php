<div class="row surge-single-container">
	<div class="medium-8 columns surge-content-container">
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas venenatis justo id condimentum elementum. Sed posuere ullamcorper finibus. Nulla consequat quam non nisi tempus eleifend. Nam ut tortor eget nisi auctor efficitur id in mi. In auctor tortor non eros commodo, quis imperdiet tellus pretium. Duis interdum justo lacus, at malesuada dui mollis quis. Curabitur ac sapien sit amet urna viverra sodales. Sed condimentum accumsan rutrum. Duis eros est, auctor quis cursus ut, eleifend quis odio. Donec nec tincidunt neque. Vivamus luctus, ipsum ac consectetur aliquam, sem massa luctus leo, sit amet sagittis velit ligula feugiat mauris. Sed nec commodo mauris. Aenean justo tellus, porttitor ut nisi eu, condimentum tincidunt neque. In at eleifend nibh, et mattis tellus.</p>
		<p>Aliquam sodales venenatis rhoncus. Etiam imperdiet ullamcorper lorem, quis condimentum odio ultrices pellentesque. Vivamus dapibus mauris metus. Donec faucibus purus venenatis lectus egestas, vitae hendrerit libero mollis. Aliquam congue risus id orci viverra, ultricies rutrum erat dapibus. Integer commodo rutrum sapien nec sodales. Sed at sagittis risus, eu porttitor risus. Cras consequat libero vitae porta tincidunt. Cras eget neque egestas, commodo orci nec, luctus dui. Maecenas dapibus risus accumsan ligula fermentum, vel vestibulum nisi aliquam. Suspendisse id fermentum dui. Nunc vel tincidunt arcu. Donec porta, metus et luctus posuere, augue ipsum vehicula metus, ac feugiat libero neque eu orci. Donec a elit eu augue eleifend consequat. Sed orci erat, pretium faucibus turpis non, accumsan scelerisque ligula. Ut dapibus ornare odio at congue.</p>
		<div class="surge-goals-container">
			<ul class="small-block-grid-3 surge-goal-charts-container">
				
				<li>
					<i class="flaticon-jumping28"></i>
					<div class="surge-goal-chart-container">
						<canvas id="discipled" width="400" height="400"></canvas>
						<div class="surge-goal-info vertical-align-absolute">
							<div class="surge-goal-total">500</div>
							<div class="surge-goal-label">Disciples</div>
						</div>
					</div>
					<div class="surge-goal-chart-desc-marker">
						<i class="fa fa-angle-down"></i>
					</div>
				</li>
				
				<li>
					<i class="flaticon-church13"></i>
					<div class="surge-goal-chart-container">
						<canvas id="church-partnerships" width="400" height="400"></canvas>
						<div class="surge-goal-info vertical-align-absolute">
							<div class="surge-goal-total">50</div>
							<div class="surge-goal-label">Partnerships</div>
						</div>
					</div>
					<div class="surge-goal-chart-desc-marker">
						<i class="fa fa-angle-down"></i>
					</div>
				</li>
				
				<li>
					<i class="flaticon-running31"></i>
					<div class="surge-goal-chart-container">
						<canvas id="missionaries-sent" width="400" height="400"></canvas>
						<div class="surge-goal-info vertical-align-absolute">
							<div class="surge-goal-total">50</div>
							<div class="surge-goal-label">Sent</div>
						</div>
					</div>
					<div class="surge-goal-chart-desc-marker">
						<i class="fa fa-angle-down"></i>
					</div>
				</li>
				<script>
					
					var options = {
									animation: false,
									segmentStrokeColor : "transparent",
									percentageInnerCutout : 85,
									responsive: true,
									showTooltips: false,
								}
					
					// Disciples Data
					var discipledData = [
						{ value: 60, color: "transparent", },
					    { value: 300, color:"#5D9ECB", highlight: "#FF5A5E", label: "Disciples" },
					    { value: 200, color: "#EFEFEF", },
					    { value: 60, color: "transparent", }, ]
					var discipled = $("#discipled").get(0).getContext("2d");
					var discipledChart = new Chart(discipled).Doughnut(discipledData, options);
					
					// Church Parterships Data
					var churchPartnershipsData = [
						{ value: 6, color: "transparent", },
					    { value: 10, color:"#5D9ECB", highlight: "#FF5A5E", label: "Church Partnerships" },
					    { value: 40, color: "#EFEFEF", },
					    { value: 6, color: "transparent", }, ]
					var churchPartnerships = $("#church-partnerships").get(0).getContext("2d");
					var churchPartnershipsChart = new Chart(churchPartnerships).Doughnut(churchPartnershipsData, options);
					
					// Missionaries Sent Data
					var missionariesSentData = [
						{ value: 6, color: "transparent", },
					    { value: 16, color:"#5D9ECB", highlight: "#FF5A5E", label: "Missionaries Sent" },
					    { value: 34, color: "#EFEFEF", },
					    { value: 6, color: "transparent", },
					]
					var missionariesSent = $("#missionaries-sent").get(0).getContext("2d");
					var missionariesSentChart = new Chart(missionariesSent).Doughnut(missionariesSentData, options);
				</script>
				
			</ul>
			
			<div class="surge-goal-metrics">
				<div class="surge-goal-desc">
					<h4><i class="flaticon-jumping28"></i> 500 Disciples Made</h4>
					<span class="surge-goal-identifier-icon"><i class="fa fa-circle-o"></i></span>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas venenatis justo id condimentum elementum. Sed posuere ullamcorper finibus. Nulla consequat quam non nisi tempus eleifend. Nam ut tortor eget nisi auctor efficitur id in mi. In auctor tortor non eros commodo, quis imperdiet tellus pretium. Duis interdum justo lacus, at malesuada dui mollis quis. Curabitur ac sapien sit amet urna viverra sodales. Sed condimentum accumsan rutrum. Duis eros est, auctor quis cursus ut, eleifend quis odio. Donec nec tincidunt neque. Vivamus luctus, ipsum ac consectetur aliquam, sem massa luctus leo, sit amet sagittis velit ligula feugiat mauris. Sed nec commodo mauris. Aenean justo tellus, porttitor ut nisi eu, condimentum tincidunt neque. In at eleifend nibh, et mattis tellus.</p>
				</div>
				<div class="surge-goal-desc">
					<h4><i class="flaticon-church13"></i> 50 Church Partnerships</h4>
					<span class="surge-goal-identifier-icon"><i class="fa fa-circle-o"></i></span>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas venenatis justo id condimentum elementum. Sed posuere ullamcorper finibus. Nulla consequat quam non nisi tempus eleifend. Nam ut tortor eget nisi auctor efficitur id in mi. In auctor tortor non eros commodo, quis imperdiet tellus pretium. Duis interdum justo lacus, at malesuada dui mollis quis. Curabitur ac sapien sit amet urna viverra sodales. Sed condimentum accumsan rutrum. Duis eros est, auctor quis cursus ut, eleifend quis odio. Donec nec tincidunt neque. Vivamus luctus, ipsum ac consectetur aliquam, sem massa luctus leo, sit amet sagittis velit ligula feugiat mauris. Sed nec commodo mauris. Aenean justo tellus, porttitor ut nisi eu, condimentum tincidunt neque. In at eleifend nibh, et mattis tellus.</p>
				</div>
				<div class="surge-goal-desc">
					<h4><i class="flaticon-running31"></i> 50 Missionaries Sent</h4>
					<span class="surge-goal-identifier-icon"><i class="fa fa-circle-o"></i></span>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas venenatis justo id condimentum elementum. Sed posuere ullamcorper finibus. Nulla consequat quam non nisi tempus eleifend. Nam ut tortor eget nisi auctor efficitur id in mi. In auctor tortor non eros commodo, quis imperdiet tellus pretium. Duis interdum justo lacus, at malesuada dui mollis quis. Curabitur ac sapien sit amet urna viverra sodales. Sed condimentum accumsan rutrum. Duis eros est, auctor quis cursus ut, eleifend quis odio. Donec nec tincidunt neque. Vivamus luctus, ipsum ac consectetur aliquam, sem massa luctus leo, sit amet sagittis velit ligula feugiat mauris. Sed nec commodo mauris. Aenean justo tellus, porttitor ut nisi eu, condimentum tincidunt neque. In at eleifend nibh, et mattis tellus.</p>
				</div>
				
			</div>
		</div>
		
		<h2>Target Locations</h2>
		<img src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/images/map_website-05.jpg" style="float:right;" />
		<p>Aliquam sodales venenatis rhoncus. Etiam imperdiet ullamcorper lorem, quis condimentum odio ultrices pellentesque. Vivamus dapibus mauris metus. Donec faucibus purus venenatis lectus egestas, vitae hendrerit libero mollis. Aliquam congue risus id orci viverra, ultricies rutrum erat dapibus. Integer commodo rutrum sapien nec sodales. Sed at sagittis risus, eu porttitor risus. Cras consequat libero vitae porta tincidunt. Cras eget neque egestas, commodo orci nec, luctus dui. Maecenas dapibus risus accumsan ligula fermentum, vel vestibulum nisi aliquam. Suspendisse id fermentum dui. Nunc vel tincidunt arcu. Donec porta, metus et luctus posuere, augue ipsum vehicula metus, ac feugiat libero neque eu orci. Donec a elit eu augue eleifend consequat. Sed orci erat, pretium faucibus turpis non, accumsan scelerisque ligula. Ut dapibus ornare odio at congue.</p>
		<p><h6>A Target Location</h6> Aliquam sodales venenatis rhoncus. Etiam imperdiet ullamcorper lorem, quis condimentum odio ultrices pellentesque. Vivamus dapibus mauris metus. Donec faucibus purus venenatis lectus egestas, vitae hendrerit libero mollis. Aliquam congue risus id orci viverra, ultricies rutrum erat dapibus. Integer commodo rutrum sapien nec sodales. Sed at sagittis risus, eu porttitor risus. Cras consequat libero vitae porta tincidunt. Cras eget neque egestas, commodo orci nec, luctus dui. Maecenas dapibus risus accumsan ligula fermentum, vel vestibulum nisi aliquam. Suspendisse id fermentum dui. Nunc vel tincidunt arcu. Donec porta, metus et luctus posuere, augue ipsum vehicula metus, ac feugiat libero neque eu orci. Donec a elit eu augue eleifend consequat. Sed orci erat, pretium faucibus turpis non, accumsan scelerisque ligula. Ut dapibus ornare odio at congue.</p>
		
		<h2>Videos</h2>
		<div class="flex-video widescreen vimeo">
			<iframe src="https://player.vimeo.com/video/108255853?title=0&byline=0&portrait=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
		
		<h2>Impact of The Surge: Taiwan</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas venenatis justo id condimentum elementum. Sed posuere ullamcorper finibus. Nulla consequat quam non nisi tempus eleifend. Nam ut tortor eget nisi auctor efficitur id in mi. In auctor tortor non eros commodo, quis imperdiet tellus pretium. Duis interdum justo lacus, at malesuada dui mollis quis. Curabitur ac sapien sit amet urna viverra sodales. Sed condimentum accumsan rutrum. Duis eros est, auctor quis cursus ut, eleifend quis odio. Donec nec tincidunt neque. Vivamus luctus, ipsum ac consectetur aliquam, sem massa luctus leo, sit amet sagittis velit ligula feugiat mauris. Sed nec commodo mauris. Aenean justo tellus, porttitor ut nisi eu, condimentum tincidunt neque. In at eleifend nibh, et mattis tellus.</p>
		<p>Aliquam sodales venenatis rhoncus. Etiam imperdiet ullamcorper lorem, quis condimentum odio ultrices pellentesque. Vivamus dapibus mauris metus. Donec faucibus purus venenatis lectus egestas, vitae hendrerit libero mollis. Aliquam congue risus id orci viverra, ultricies rutrum erat dapibus. Integer commodo rutrum sapien nec sodales. Sed at sagittis risus, eu porttitor risus. Cras consequat libero vitae porta tincidunt. Cras eget neque egestas, commodo orci nec, luctus dui. Maecenas dapibus risus accumsan ligula fermentum, vel vestibulum nisi aliquam. Suspendisse id fermentum dui. Nunc vel tincidunt arcu. Donec porta, metus et luctus posuere, augue ipsum vehicula metus, ac feugiat libero neque eu orci. Donec a elit eu augue eleifend consequat. Sed orci erat, pretium faucibus turpis non, accumsan scelerisque ligula. Ut dapibus ornare odio at congue.</p>
		
		
	</div>
	

	<aside id="sidebar" class="medium-4 columns stick-to-parent">
		<div class="surge-timeline-snapshot-container">
			<h3><i class="fa fa-history"></i> Surge Updates</h3>
			
			<?php

			// The Query
			$surge_posts = new WP_Query('post_type=post&posts_per_page=4&category_name=staff-articles');
			$found_posts = $surge_posts->found_posts;
			//print_r($surge_posts);
			
			// The Loop
			if ( $surge_posts->have_posts() ) :
				while ( $surge_posts->have_posts() ) : $surge_posts->the_post(); ?>
					
					<div class="surge-timeline-snapshot-post">
						<div>
							<a href="<?php echo get_permalink(); ?>"><span class="surge-timeline-snapshot-number"><?php echo '#' . $found_posts; ?></span></a>
							<span class="surge-timeline-snapshot-date"><?php echo get_the_date(); ?></span>
							<a href="<?php echo get_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
							<?php echo get_excerpt_by_id($post->ID, 20); ?>
						</div>
					</div>
					
					
				<?php
				$found_posts--;
				endwhile;
			endif;
			
			/* Restore original Post Data */
			wp_reset_postdata();
			
			?>

		</div>
		
		<!--
		<?php

		/**
		 *	By default instagram does not allow us to query for more than
		 *	attribute, such as media posted by a specific author tagged with
		 *	a specific tag. In order to accomplish this we will acquire all of
		 *	the media tagged with the tag we are looking for and then filter it
		 *	down based on the user.
		 */
		
		// The tag you want to query
		$tag = 'surgetaiwan';
		
		/**
		 *	Query variables for the CURL URL
		 * 	For simple queries the client ID alone will suffice. 
		 * 	We also need a very high number for the requested amount
		 * 	of posts so that the App continues to give us a paginated
		 * 	URL that allows us to iterate through all of the media.
		 */
		$query = array(
			'client_id' => of_get_option('instagram_clientid'),
			'count'	    => 999999
		);
		
		// Set the url for the first iteration of the CURL
		$url = "https://api.instagram.com/v1/tags/{$tag}/media/recent?".http_build_query($query);
		
		/**
		 *	Instagram will only give us 33 posts at a time, so at the end of the CURL
		 *	we will reset the $url using the next_url atribute in the pagination section
		 *	of the returned object.
		 */
		while ($url) {
			
			try {
				$curl_connection = curl_init($url);
				curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
				curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
				
				//Data are stored in $data
				$data = json_decode(curl_exec($curl_connection), true);
				curl_close($curl_connection);
				
				/**
				 *	Loop through all of the posts retrieved in the latest CURL and assign
				 * 	them to our $instagram_posts variable if they were authored by the user
				 * 	we are looking for.
				 */
				if ( !empty( $data['data'] ) ) {
					foreach ($data['data'] as $post_tag_match) {
						if ( $post_tag_match['user']['username'] == 'ywammontanalakeside' ) {
							$instagram_posts[] = $post_tag_match;
						}
					}
				}
			
			} catch(Exception $e) {
				return $e->getMessage();
			}
			
			// Reset the $url variable using the next_url attribute.
			$url = $data['pagination']['next_url'];
		} ?>
		
		<div class="surge-instagram-feed">
			
		<?php // Display all of the posts
		$instagram_posts = array_slice($instagram_posts, 0, 3);
		foreach ( $instagram_posts as $post ) { ?>
			
					<div class="surge-instagram-post row">
						<div class="instagram-image-container clearfix">
							<div class="small-8 columns instagram-img">
								<?php echo '<img src="' . $post['images']['standard_resolution']['url'] . '" />'; ?>
							</div>
							
							<div class="small-4 columns instagram-meta">
								<div class="instagram-date"><?php echo date('M d', $post['created_time']); ?></div>
								
								<div class="instagram-likes">
									<i class="fa fa-heart-o"></i><?php print_r($post['likes']['count']); ?>
								</div>
								
								<div class="instagram-comments">
									<i class="fa fa-comments-o"></i><?php print_r($post['comments']['count']); ?>
								</div>
							</div>
						</div>
						
						
						<div class="small-12 columns instagram-desc">
							<p><?php echo $post['caption']['text']; ?></p>
						</div>
					</div>
			
		<?php } ?>
		</div>
		-->
	</aside>
</div>