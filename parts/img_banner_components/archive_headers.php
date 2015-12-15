<?php

/**
 *  Archive Headers
 *  These are all of the custom headers for archive pages.
 */

if ( is_tax( 'program_taxo' ) ) {
    $program_blog = get_queried_object();
    $program_page = get_page_by_path( $program_blog->slug, OBJECT, 'program' );
    $post_thumbanail = wp_get_attachment_image_src( get_post_thumbnail_id( $program_page->ID ), 'full-width-banner', true ); ?>

 <div class="standard-banner-container slide-container" style="background: url(<?php echo $post_thumbanail[0]; ?>) no-repeat center center;">
  <div class="row vertical-align-relative">
   <div class="small-12 columns slide-content-container" style="text-align: center;">
    <h2 class="fittext shadow"><?php echo $program_page->post_title; ?></h2>
    <h2 class="fittext"><?php echo $program_page->post_title; ?></h2>
    <div class="subtitle">School Blog</div>
   </div>
  </div>
 </div>

<?php

} elseif ( null != $page_id && has_post_thumbnail( $page_id ) ) {
    $post_thumbanail = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'full-width-banner', true );

    echo '<div class="standard-banner-container" style="background: url(' . $post_thumbanail[0] . ') no-repeat center center;"></div>';
}

?>