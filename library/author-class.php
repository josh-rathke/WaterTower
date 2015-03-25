<?php

/*	Author Class
 *
 * 	Class to retrieve author information
 *	Should author's profile be set to private, no information will be passed through.
 *	The term married indicates that an author is married, and their spouse is also present in the list.
 *	If someone who is married is present, but their spouse is not, they will be put in the singles category.
 *
 *	@param string $author_ids Should be a comma separated string of all of the author's IDs.
 *	@returns object $authors Returns an object of all of the authors that have a public profile.
 *
 */
class AuthorInfo
{
	var $post_id;
	var $author_ids;
	var $spouse_ids = array();
	var $married_couples;
	var $singles;

	private function get_authors()
	{
		$authors = get_coauthors( $this->post_id );

		foreach ( $authors as $author ) {
			if ( $this->author_status( $author->ID ) ) {
				$this->author_ids[] = $author->ID;
			}
		}

	}


	//Take author's ID, and run it through a private function to find out if profile is public
	private function author_status($author_id)
	{
		if ( 'public' == rwmb_meta( 'profile_status', '', $post_id = $author_id ) ) {
			return true;
		} else {
			return false;
		}
	}

	private function family_oriented()
	{

		//----- SEPARATE MARRIED COUPLES FROM SINGLES -----//
		foreach ( $this->author_ids as $author_id ) {

			//-----CHECK CURRENT LEADER AGAINST KNOWN SPOUSES-----//
			if ( ! in_array( $author_id, $this->spouse_ids ) ) {

				//-----CHECK IF SPOUSE EXISTS-----//
				if ( 1 == rwmb_meta( 'has_spouse', '', $post_id = $author_id ) ) {
					$spouse_id = rwmb_meta( 'spouse', 'type=select', $post_id = $author_id );

					//-----SPOUSE ACTIVATED BUT NO SPOUSE SELECTED FAILSAFE-----//
					if ( $spouse_id ) {

						//----- CHECK IF SPOUSE IS PRESENT -----//
						foreach ( $this->author_ids as $i_spouse_id ) {
							if ( true != $spouse_present ) {
								if ( $spouse_id != $i_spouse_id ) {
									$spouse_present = false;
								}  else {
									$spouse_present = true;
								}
							}
						}

						//-----IF SPOUSE IS PRESENT APPEND ID'S TOGETHER-----//
						if ( $spouse_present ) {

							//-----SORT USING HEAD OF HOUSEHOLD CHECKBOX -----//
							if ( rwmb_meta( 'head_household', '', $post_id = $author_id ) ) {
								$couple = array(array('ID' => $author_id), array('ID' => $spouse_id));
							} else {
								$couple = array(array('ID' => $spouse_id), array('ID' => $author_id));
							}

							$this->married_couples[] = $couple;
							$this->spouse_ids[] = $spouse_id;

							//-----ADD TO SINGLES LIST IF SPOUSE IS NOT PRESENT-----//
						} else {
							$this->singles[] = array('ID' => $author_id);
						}
					} else {
						$this->singles[] = array('ID' => $author_id);
					}

					//-----PROCEED THROUGH FOR SINGLE-----//
				} else {
					$this->singles[] = array('ID' => $author_id);
				}
			}
		}
	}


	//If public, fill up information
	private function populate_author_info($user_id)
	{
		$user_object = get_coauthors( $user_id );
		$user_post_count = count_user_posts( $user_id );

		//get associated author taxonomy term to grab post count
		$author_terms = wp_get_post_terms( $user_id, 'author' );

		// Assign Link Active variable to true if the user has more
		// than one post, and their status is set to staff.
		$link_active = $author_terms[0]->count > 0 &&
						   rwmb_meta( 'status', '', $post_id = $user_id ) == staff
						   ? true : false;

		return array(
		'display_name'    => $user_object[0]->display_name,
		'first_name'    => $user_object[0]->first_name,
		'last_name'        => $user_object[0]->last_name,
		'user_login'    => $user_object[0]->user_login,
		'description'    => $user_object[0]->description,
		'hometown'        => rwmb_meta( 'hometown', '', $post_id = $user_id ),
		'post_count'    => $author_terms[0]->count,
		'website'        => $user_object[0]->website,
		'link_active'    => $link_active,
		'status'        => rwmb_meta( 'status', '', $post_id = $user_id )
		);
	}

	/*	Public Function author_links_list()
    *	This function generates a simple comma separated
    *	list of the authors of a post or school and prints
    *	it to where it is being called.
    */

	public function author_links_list()
	{
		//Add Maried couples to author list
		if ( $this->married_couples ) {
			foreach ( $this->married_couples as $married_couple ) {
				foreach ( $married_couple as $spouse_author ) {
					$display_name = $spouse_author['author_info']['display_name'];
					$user_login = $spouse_author['author_info']['user_login'];

					if ( true == $spouse_author['author_info']['link_active'] ) {
						$author_url = get_bloginfo( 'url' ) . '/author/' . $user_login;
						$author_list[] = "<a href='{$author_url}'>{$display_name}</a>";
					} else {
						$author_list[] = $display_name;
					}
				}
			}
		}

		//Add Singles to author list
		if ( $this->singles ) {
			foreach ( $this->singles as $single_author ) {
				$display_name = $single_author['author_info']['display_name'];
				$user_login = $single_author['author_info']['user_login'];

				if ( true == $single_author['author_info']['link_active'] ) {
					$author_url = get_bloginfo( 'url' ) . '/author/' . $user_login;
					$author_list[] = "<a href='{$author_url}'>{$display_name}</a>";
				} else {
					$author_list[] = $display_name;
				}
			}
		}

		//Echo the list of authors with links if necessary
		if ( $author_list ) {
			echo implode( ', ', $author_list );
		}
	}


	//Construct Class using string of author IDs
	/*
    *	The reason we check for the author_ids variable is because we use the guest_author input box to
    *	display school leaders.  To display the authors, we call the display_author() function and insert
    *   a list of the school leaders ids, which then get computed rather than the default author of the
    *	post.  Currently authors are disabled on programs.
    *
    */
	function __construct($post_id, $author_ids = null)
	{

		if ( is_null( $author_ids ) ) {
			$this->post_id = $post_id;
			$this->get_authors();
		} else {
			$this->author_ids = $author_ids;
		}

		//separate married couples from singles
		if ( isset($this->author_ids) ) {
			$this->family_oriented();
		}

		//fill information for married couples
		if ( isset($this->married_couples) ) {
			foreach ( $this->married_couples as $couples_key => $couple ) {
				foreach ( $couple as $spouse_key => $spouse ) {
					$this->married_couples[$couples_key][$spouse_key]['author_info'] = $this->populate_author_info( $spouse['ID'] );
				}
			}
		}

		//fill information for singles
		if ( isset($this->singles) ) {
			foreach ( $this->singles as $single_key => $single ) {
				$this->singles[$single_key]['author_info'] = $this->populate_author_info( $single['ID'] );
			}
		}

	}

}


/*
 *	Function to display authors for a post
 *
 */

function display_authors($post_id, $author_ids = null)
{
	$authors = new AuthorInfo( $post_id, $author_ids );

	//Define funny links for user's hometown
	$funny_links = array(
	'barber-shops' => 'https://www.google.com/#q=barber+shops+near+',
	'small-mammals' => 'https://www.google.com/#q=small+mammals+near+',
	'coffee-shops' => 'https://www.google.com/#q=coffee+shops+near+',
	'little-ceasars' => 'https://www.google.com/#q=little+ceasars+near+',
	'petting-zoos' => 'https://www.google.com/#q=petting+zoos+near+',
	'sunglass-huts' => 'https://www.google.com/#q=sunglass+huts+near+',
	'toothepaste-stores' => 'https://www.google.com/#q=toothepaste+stores+near+',
	'beanbags' => 'https://www.google.com/#q=beanbags+near+',
	'places-to-play-cornhole' => 'https://www.google.com/#q=places+to+play+cornhole++near+',
	'mini-golf' => 'https://www.google.com/#q=mini+golf+near+',
	'wax-mueseums' => 'https://www.google.com/#q=wax+mueseums+near+',
	'bigfoot-sightings' => 'https://www.google.com/#q=bigfoot+sightings+near+',
	'vhs-stores' => 'https://www.google.com/#q=vhs+rental+shops+near+',
	'walmart' => 'https://www.google.com/#q=walmart+near+',
	'frog-princes' => 'https://www.google.com/#q=frog+princes+near+',
	'ancient-bookstores' => 'https://www.google.com/#q=ancient+bookstores+near+',

	);

	// MARRIED COUPLES ?>
    <?php if ( isset($authors->married_couples) ) { ?>
    <?php foreach ( $authors->married_couples as $couple ){ ?>
			<div class="user-snippet-container clearfix">								
				<div class="row">
					<div class="small-12 medium-3 columns">
        <?php foreach ( $couple as $author_info ) { ?>
							<div class="row married-avatar-container">
								<div class="medium-12 columns avatar-container"><?php echo get_the_post_thumbnail( $author_info['ID'], 'thumbnail', array('class' => 'img-responsive-80') ); ?></div>
							</div>
        <?php
} ?>
					</div>
																			
				
					<div class="small-12 medium-9 columns">
						<div class="author-name">
							<h4>
								<?php
								$n = 1;
								foreach ( $couple as $author_info ) {
									if ( 1 == $n ) {
										echo $author_info['author_info']['first_name'] . ' & ';
										$n = ++$n;
									} else {
										echo $author_info['author_info']['display_name'];
									}
								}
								?>
							</h4>
						</div>
						
        <?php foreach ( $couple as $author_info ) { ?>
							
								<p><?php echo $author_info['author_info']['description']; ?></p>
								<div class="user-snippet-meta">
							
								<?php

								// Display Author Post Link if link is active
								if ( $author_info['author_info']['link_active'] ) {
									$user_link_url = get_bloginfo( 'url' ) . '/author/' . $author_info['author_info']['user_login'];
									$first_name = $author_info['author_info']['first_name'];
									$post_count = $author_info['author_info']['post_count'];
									$format = '<div><a href="%s"><i class="fa fa-paper-plane-o"></i>Posts by %s (%s)</a></div>';

									echo sprintf( $format, $user_link_url, $first_name, $post_count );
								}

								//Display Author's website if provided
								if ( $author_info['author_info']['website'] ) {

									//Add ownership to author's name
									$first_name = $author_info['author_info']['first_name'];
									$first_name = substr( $first_name, -1 ) == s ? $first_name . "'": $first_name . "'s";

									//Populate and Dispaly other variables
									$website_url = $author_info['author_info']['website'];
									$format = '<div><a href="%s"><i class="fa fa-globe"></i>%s Website</a></div>';

									echo sprintf( $format, $website_url, $first_name );
								}

								//Display Users Hometown Along with a funny link

								$location = $author_info['author_info']['hometown'];

								if ( $location ) {
									$location_for_search = str_replace( ' ', '+', $location );
									$format = '<div><a target="_blank" href="%s"><i class="fa fa-map-marker"></i>Hometown: %s</a></div>';
									echo sprintf( $format, $funny_links[array_rand( $funny_links, 1 )] . $location_for_search, $location );
								}

								?>
							
							
							</div>
        <?php
} ?>
				
						</div>
					</div>
				</div>
    <?php
} ?>
    <?php
} ?>
		
    <?php // SINGLES ?>
    <?php if ( isset($authors->singles) ) { ?>
    <?php foreach ( $authors->singles as $single ) { ?>
				<div class="user-snippet-container">
					<div class="row">
						<div class="small-12 medium-3 columns avatar-container">
        <?php echo get_the_post_thumbnail( $single['ID'], 'thumbnail', array('class' => 'img-responsive-80') ); ?>
						</div>
					
						<div class="small-12 medium-9 columns">
							<div class="author-name"><h4><?php echo $single['author_info']['display_name']; ?></h4></div>
							<p><?php echo $single['author_info']['description']; ?></p>
							<div class="user-snippet-meta">
							
								<?php

								// Display Author Post Link if link is active
								if ( $single['author_info']['link_active'] ) {
									$user_link_url = get_bloginfo( 'url' ) . '/author/' . $single['author_info']['user_login'];
									$first_name = $single['author_info']['first_name'];
									$post_count = $single['author_info']['post_count'];
									$format = '<div><a href="%s"><i class="fa fa-paper-plane-o"></i>Posts by %s (%s)</a></div>';

									echo sprintf( $format, $user_link_url, $first_name, $post_count );
								}

								//Display Author's website if provided
								if ( $single['author_info']['website'] ) {

									//Add ownership to author's name
									$first_name = $single['author_info']['first_name'];
									$first_name = substr( $first_name, -1 ) == s ? $first_name . "'": $first_name . "'s";

									//Populate and Dispaly other variables
									$website_url = $single['author_info']['website'];
									$format = '<div><a href="%s"><i class="fa fa-globe"></i>%s Website</a></div>';

									echo sprintf( $format, $website_url, $first_name );
								}

								//Display Users Hometown Along with a funny link
								$location = $single['author_info']['hometown'];

								if ( $location ) {
									$location_for_search = str_replace( ' ', '+', $location );
									$format = '<div><a target="_blank" href="%s"><i class="fa fa-map-marker"></i>Hometown: %s</a></div>';
									echo sprintf( $format, $funny_links[array_rand( $funny_links, 1 )] . $location_for_search, $location );
								}

								?>
							
							
							</div>
						</div>
					</div>
				</div>
    <?php
} ?>
    <?php
} ?>
    <?php
}