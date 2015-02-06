</section>

<?php do_action('watertower_before_footer'); ?>
<footer class="footer">
	<div class="row">
		
		<div class="medium-3 columns our-campus-container">
			<h2>Our Campus</h2>
			
			<div class="our-campus-phone"><i class="fa fa-mobile"></i>(406) - 844 - 2221</div>
			
			<div class="our-campus-email">info@ywammontana.org</div>
			
			<div class="our-campus-organization">YWAM Montana | Lakeside</div>
			<div class="our-campus-address-container">
				<div>501 Blacktail Rd.</div>
				<div>Lakeside MT, 59922</div>
				<div>United States</div>
			</div>
			
			<div class="our-campus-tour"><i class="fa fa-long-arrow-right"></i>Campus Tour</div>
		</div>
		
		<div class="medium-5 columns contact-us-container">
			<h2>Contact Us</h2>
			<?php echo do_shortcode('[gravityform id="1" name="Contact Form" title="false" description="false" ajax="true"]'); ?>
			<div class="contact-us-time-to-respond">We try our best to respond to inquiries as quickly as possible. Until then, feel free to check out the rest of the site!</div>
		</div>
		
		<div class="medium-4 columns get-involved-container">
			
			<?php
			// Query Staffing Needs
			$staffing_needs = get_posts('post_type=staffing_needs');
			
			foreach ($staffing_needs as $staffing_need) {
				$need_url = get_permalink($staffing_need->ID);
				$staffing_needs_list .= "<strong><a href='{$need_url}'>{$staffing_need->post_title}</a></strong>";
				$staffing_needs_list .=  end($staffing_needs) != $staffing_need ? ', ' : '.';
			}
			 
			?>
			
			<h2>Get Involved</h2>
			<p class="get-involved-staffing-needs">We are currently looking for full-time volunteers to fill these staff positions: <?php echo $staffing_needs_list; ?></p>
			<ul>
				<li>Staffing Needs</li>
				<li>Community Events</li>
				<li>Schools & Seminars</li>
			</ul>
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