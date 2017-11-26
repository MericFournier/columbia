<?php

/*
Template Name: Contact
*/

?>

<?php get_header() ?>

<div class="contact__information">
   <h1><?php _e('Informations', 'columbia') ?></h1>
   <div class="main">
      <div class="google__map"> 
         <div id="map"></div>   
      </div>
      <div class="contact__informations__main">
         <p><span><?php _e('LABEL :', 'columbia') ?> </span>Columbia Records</p>
         <p><span><?php _e('ADDRESS :', 'columbia') ?> </span>550 Madison Ave., 24th Floor</p>
         <p><span><?php _e('CITY :', 'columbia') ?> </span>New York City</p>
         <p><span><?php _e('STATE :', 'columbia') ?> </span>New York</p>
         <p><span><?php _e('ZIP CODE :', 'columbia') ?> </span>10022</p>
         <p><span><?php _e('PHONE :', 'columbia') ?> </span>212-833-4000</p>
         <p><span><?php _e('FAX :', 'columbia') ?> </span>212-833-5607</p>
         <p><span><?php _e('EMAIL :', 'columbia') ?> </span>feedback@sonymusic.com</p>
         <p><span><?php _e('WEBSITE :', 'columbia') ?> </span>www.columbiarecords.com</p>
      </div>
   </div>
</div>
<div class="contact__form">
   <h1><?php _e('Contact us', 'columbia') ?></h1>
	<?php echo do_shortcode('[wpforms id="53" title="false" description="false"]'); ?>
</div>

<script>
   function initMap() {
      var uluru = {lat: 40.761469, lng: -73.973497};
      var map = new google.maps.Map(document.getElementById('map'), {
         zoom: 14,
         center: uluru
      });
      var infowindow = new google.maps.InfoWindow({
         content: "Columbia"
      });
      var marker = new google.maps.Marker({
         position: uluru,
         map: map
      });
      marker.addListener('click', function() {
         infowindow.open(map, marker);
      });
   }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxYPqrz1uib2_O6QHKHQqtF3QSK2neIW4&callback=initMap">
</script>

<?php get_footer() ?>