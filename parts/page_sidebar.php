<?php 
/**
 *	Check for type of sidebar to display on pages,
 *	then display the correct sidebar.
 */

if ( rwmb_meta('page_sidebar') == 'headings') { ?>

    <div class="large-3 columns stick-to-parent-side-nav">
        <div class="magellan-container" data-magellan-expedition>
          <dl class="sub-nav side-nav-container side-nav-by-heading">
          </dl>
        </div>
    </div>

<?php } else { ?>
    <div class="large-4 columns stick-to-parent">
        <?php get_sidebar(); ?>
    </div>
<?php }?>