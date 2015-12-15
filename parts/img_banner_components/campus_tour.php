<?php

/**
 *     Campus Tour Banner
 *     This displays the campus tour header that allows
 *     anyone viewing the page to navigate through our
 *     campus virtually.
 */ ?>

<script type="text/javascript"
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvS3wK11EOSK0jvsAXlTnGvpUb85uXpTw">
</script>

<script>
var panorama = null;
var links = null;

function setPano2link(pano_id) {
  panorama.setPano(pano_id);
  panorama.setVisible(true);
  $("html, body").animate({ scrollTop: 0 }, "slow");
}

function initialize() {
  var myPanoid = '<?php echo rwmb_meta( 'beginning_pano' ); ?>';
  var panoramaOptions = {
    pano: myPanoid,
    pov: {
      heading: 270,
      pitch: 0
    },
    visible: true,
    scrollwheel: false,
    addressControl: false,
  };

  panorama = new google.maps.StreetViewPanorama(document.getElementById('pano'), panoramaOptions);

    //Whenever the pano is changed check to make sure that the menu
    //is up to date so that the user can track where they are within
    //the tour.
    google.maps.event.addListener(panorama, 'pano_changed', function() {
        var curPanoID = panorama.getPano();

        //Toggle the active class off of the list item.
        $('.campus-tour-jump-to-menu .active').toggleClass('active');

        //Toggle the active class to the correct list item.
        $('#' + curPanoID).toggleClass('active');
    });

}

google.maps.event.addDomListener(window, 'load', initialize);

</script>

<div id="pano" style="width: 100%; height: 450px;"></div>