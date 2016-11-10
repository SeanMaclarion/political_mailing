<head>

<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="contact.css">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>

<footer>
<div class="footer-top">
<div class="footersocial">          	
	<ul>
		<li><a class="fb" href="https://www.facebook.com/CornerstoneServicesInc/" target="_blank">&nbsp;</a></li>
		<li><a class="twiter" href="https://twitter.com/CRSTNET" target="_blank">&nbsp; </a></li>
		<li><a class="rss" href="http://crst.net/articles/" target="_blank">&nbsp;</a> </li>
		<li><a class="linkedin" href="https://www.linkedin.com/company/cornerstone-services-inc-?trk=top_nav_home" target="_blank">&nbsp;</a> </li>
	</ul>
</div>
    </div>                 
<!--Div for google maps styling -->
<div id="googlemaps"></div>

<!--Contact form div-->
<div class="contact">
<!--Form used to send information to be stored for newsletter -->
<form action="send_email.php">

<!--Information block -->
Cornerstone Services<br>
Address: 31 S Ohioville Rd, New Paltz, NY 12561<br>
Phone:(845) 255-5722
<!--Information block end -->
<br><br>
<!--Type of mailing dropdown -->
I want to send a <select required name="type">
<option selected disabled hidden style='display: none' value=''>Type Of Mailing</option>
  <option value="nonprofit">Non-Profit</option>
  <option value="firstclass">First Class</option>
  <option value="standard">Standard</option>
  <option value="political">Political</option>
  <option value="eddm">EDDM</option>
</select>
<!--type dropdown end -->
<!--number of mailings dropdown -->
mailing of <select required name="count">
<option selected disabled hidden style='display: none' value=''>Piece Count</option>
  <option value="hundred">100</option>
  <option value="fivehundred">500</option>
  <option value="thousand">1,000</option>
  <option value="tenthousand">10,000</option>
  <option value="twentyfive+">25,000+</option>
</select>
<!--number dropdown end-->
pieces to:
<!--Client information text area -->
<br><textarea required placeholder="Example: all Homeowners of 50 acres in Dutchess County"rows="8" cols="50" name="area"></textarea><br>
<!--client list upload -->
<br><i>* Have a data list? Attach it below. *<br> </i><INPUT TYPE="file" NAME="clientlist">
<br><br>

<!--Newsletter information input -->
  Full Name: <input required type="text" name="fullname"><br>
  Email: <input required type="email" name="email"><br>
  Phone Number: <input required type="text" name="phone"><br>
  Comments: <textarea placeholder="Optional information you would like to send to Cornerstone about your mailing." rows="8" cols="50" name="comments"></textarea><br>
  <!--newsletter information input end -->
  
  <input type="submit" value="Send Email">
</form>
</div>

<!--Start Google Map API implementation -->
<!-- Include the Google Maps API library - required for embedding maps -->
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBhRRXcnQR1UmpgwHri_IXQrFna0M7j31c&callback=initMap"></script>
 
<script type="text/javascript">
 
// The latitude and longitude of Cornerstone Services
var position = [41.7365,-74.13];
 
function showGoogleMaps() {
 
    var latLng = new google.maps.LatLng(position[0], position[1]);
 
    var mapOptions = {
        zoom: 12, // initialize zoom level - the max value is 21
		scrollwheel: false,
		mapTypeControl: false,  
		panControl: false,
		zoomControl: false, 
		scaleControl: false,
		streetViewControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: latLng
    };
 
    map = new google.maps.Map(document.getElementById('googlemaps'),
        mapOptions);
 
    
}
 
google.maps.event.addDomListener(window, 'load', showGoogleMaps);
</script>
<!--End google map API implementation -->
<?php
?>

	<div class="footer-bottom">
	<p>&copy; 2016<a href="https://www.dataconsulate.com"> Political Mailing.</a> All rights reserved.  Privacy Policy.</p>
	</div>
</div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script>
