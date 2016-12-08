<<<<<<< HEAD
<?php
require ("connection.php");
require ("header.php");
//Initializes Login Session
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
// Sets feed for Blog Post retrieval 
include_once $_SERVER['DOCUMENT_ROOT'] . '\political_mailing\simplepie\simplepie.inc.php';
$feed = new SimplePie();
$feed->set_feed_url(array(
	'http://crst.net/articles',
	'http://eddmtoday.com/blog/'));
$feed->enable_cache(false);
$feed->init();
$feed->handle_content_type();

?>
<!--Logo redirects here-->
<A NAME="home"></a>

<div id="content-1" class="content-slide"><div id="vslides_wrapper">
	<div id="vslides">
							<div class="vslide" id="vslide0" rel="0">
				<div class="layer"></div>
				<div class="overlayer"><h2><strong>Amazing Results</strong></h2>
<h3>Our strategies get the results you are looking for.</h3>
<!--HubSpot Call-to-Action Code -->
        <!--[if lte IE 8]><div id="hs-cta-ie-element"></div><![endif]-->
       
    </span>
    <script charset="utf-8" src="https://js.hscta.net/cta/current.js"></script>
    <script type="text/javascript">
        hbspt.cta.load(471763, '4d06d532-95fe-4bec-9bfc-99f74d4060f3');
    </script>
</span>
<!-- end HubSpot Call-to-Action Code --></div>
				<video controls autoplay loop><source src="images/gdvideo.mp4" type="video/mp4"></video>
			</div>
			
			<div class="vslide active" id="vslide1" rel="1">
				<div class="layer"></div>
				<div class="overlayer"><h2><strong>Amazing Results</strong></h2>
<h3>Our strategies get the results you are looking for.</h3>
<!--HubSpot Call-to-Action Code -->
        <!--[if lte IE 8]><div id="hs-cta-ie-element"></div><![endif]-->
       
    </span>
    <script charset="utf-8" src="https://js.hscta.net/cta/current.js"></script>
    <script type="text/javascript">
        hbspt.cta.load(471763, '4d06d532-95fe-4bec-9bfc-99f74d4060f3');
    </script>
</span>
<!-- end HubSpot Call-to-Action Code --></div>
				<video controls autoplay loop><source src="images/votingvideo.mp4" type="video/mp4"></video>
			</div>
					
</div></div>




<!--About Text-->
<A NAME="services"></a>
<div id="content-2" class="content-slide"><div class="inner" style="text-align: left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis <a class="tooltip yellow">ostrud ut aliquip ex ea commodo consequat.<span><em>ed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</em></span></a> bro quis nostrud exercitation ullamco laboris nisi ut aliquip  lorem ipsum <a class="tooltip red">nemo enim ipsam voluptatem quia<span><em>nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt</em></span></a><br/> et <a class="tooltip blue">tur  ratione voluptatem<span><em>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat </em></span></a> et dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris <a class="tooltip green">voluptatem quia voluptas<span><em>et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non.</em></span></a>.</div></div>

<!--Space for Portfolio, code in Portfolio.php, not crawlable-->
<A NAME="portfolio"></a>
<h2 class="w3-center">Featured Political Cards</h2>

<div class="w3-content w3-section" style="max-width:100%">
  <img class="mySlides" src="portfolio/joe_mazzetti_card2.png" style="width:100%">
  <img class="mySlides" src="portfolio/kevin_roberts_card.png" style="width:100%">
  <img class="mySlides" src="portfolio/steven-dangelo-back.png" style="width:100%">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 7000); // Change image every 2 seconds
}
</script>
<A NAME="newsletter"></a>
<div class="white_block connectwithus_block border_top">
	<div class="inner">
		<div class="box green our_blog">
			<div class="title">Cornerstone's Blog</div>
			<?php foreach ($feed->get_items(0, 3) as $item): ?>
    <div class="blog1">
	<div class="bloghover" style="width: 100%; float:left; display:inline-block;">
<!--Assigns Website Logo to unique blog posts -->
	<?php if (strpos($item->get_link(0), 'crst.net') !== false)
		{
			echo "<img src='images/1.png' style='width: 10%;'>";
		}?>
	<?php if (strpos($item->get_link(0), 'eddmtoday.com') !== false)
		{
			echo "<img src='images/2.png' style='width: 10%;'>";
		}?>
				<?php $month= $item->get_date('M'); ?>
		<?php $date = $item->get_date('d'); ?>
<!-- Creates Calander Icons-->
		<time datetime="0000-00-00" class="icon">
		<strong><?php echo $month ?></strong>
		<span><?php echo $date ?></span>  
		</time>

<!--Gets Text for Title and Content(description) and prints -->
       <span style="float:right; width: 75%; padding-bottom:10px;"> <b><?php print $item->get_title(); ?></b>
		<?php $str = $item->get_description(); 
			  print substr($str, 0, 200);?>
		<?php echo "<a href='". $item->get_link(0) . "'>Click here to read more...</a>";?></span>
		<br><br>
		</div>

		
		
		<br>
		<br>
    </div>
<?php endforeach; ?>
</ul>
		</div>
		<div class="box blue switch">
				<div class="title"><div>Twitter</div><a class="twitter active"></a></div>
				<div class="box_content">
					<?php require("twittertest.php");?>
					
				</div>
		</div>
	



<div class="box aquamarine last newsletter">
			<div class="title">Newsletter</div>
			<div class="box_content">
				<em class="em">&nbsp;</em>
				<p style="font-size: 24px;">Sign up for our physical newsletter to <br><br> be mailed to your door.</p>
				<form action="add_newsletter.php" method="POST">
				  <label for="fullname">Name:</label><input required type="text" id="fullname" name="fullname"><br>
				  <label for="address">Address:</label><input required type="text" name="address"><br>
				   <label for="city">City:</label><input required type="text" name="city"><br>
				  <label for="state">State:</label><input required type="text" name="state"><br>
				  <label for="zip">Zip:</label><input required type="text" name="zip"><br><br>
				  <input type="submit">
				</form>
				
		
		</div>
		</div>
		</div>
</div>

<div id="content-4">
	<div id="footer-cloud">
		<div class="inner">
<!--Form used to send information to be stored for newsletter -->
<form action="send_email.php">

<!--Information block -->
<p style="color: black; font-size:18px;">
Cornerstone Services<br>
Address: 31 S Ohioville Rd, New Paltz, NY 12561<br>
Phone:(845) 255-5722
</p> 
<!--Information block end -->

<!--Type of mailing dropdown -->
<p style="color: black;">I want to send a <select required name="type">
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
pieces to:</p>
<!--Client information text area -->
<br><textarea required placeholder="Example: all Homeowners of 50 acres in Dutchess County"rows="8" cols="50" name="area"></textarea><br>


<!--Contact information input -->
  <label for="fullname" style="color:black;">Name:</label><input required type="text" name="fullname"><br>
  <label for="email" style="color:black;">Email:</label><input required type="email" name="email"><br>
  <label for="phone" style="color:black;">Phone:</label> <input required type="text" name="phone"><br>
 <label for="comments" style="color:black;">Comments:</label><textarea placeholder="Optional information you would like to send to Cornerstone about your mailing." rows="8" cols="50" name="comments"></textarea><br>
  <!--newsletter information input end -->
  
  <input type="submit" value="Send Email">
</form>
			<div class="clearer"></div>
		</div>
	</div>
<div id="map"></div>

<a href="crst.net"><div style="width: 33%; background-color:green; display:inline-block; color:white; font-weight: bold;">CRST.NET</div></a>
<a href="dataconsulate.com"><div style="width: 33%; background-color:blue; display:inline-block; color:white; font-weight: bold">DATACONSULATE</div></a>
<a href="eddmtoday.com"><div style="width: 33%; background-color:red; display:inline-block; color:white; font-weight: bold">EDDMTODAY.COM</div></a>


<div id="footer-bottom">
	<div class="inner">
		<div class="col3">
			<div class="social">
				<a href="https://www.facebook.com/" class="facebook" target="_blank"><img src="http://comradeweb.com/wp-content/themes/Comradeweb/img/footer-icon-facebook.png" alt="Comrade Web Agency on Facebook" /></a>
				<a class="twitter" href="https://twitter.com/CRSTnet" target="_blank"><img src="http://comradeweb.com/wp-content/themes/Comradeweb/img/footer-icon-twitter.png" alt="Comrade Web Agency on Twitter" /></a>
				<a class="in" href="https://www.linkedin.com/" target="_blank"><img src="http://comradeweb.com/wp-content/themes/Comradeweb/img/footer-icon-in.png" alt="Comrade Web Agency on LinkedIn" /></a>
			</div>
		</div>
		<div class="col1">
			<div class="facebook" style="float:left;margin-right:20px">
				<div class="fb-like" data-href="https://www.facebook.com/ComradeWeb" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
			</div>
			<p class="copyright">&copy; 2016 Cornerstone Services. All rights reserved.</p>
		</div>
		<div class="clearer"></div>
	</div>
</div>
</div>
<div id="fb-root"></div>
<div id="request-box">
<div class="inner">
		<div class="clearer"></div>
	</div>
</div>

<!--Contact redirects here -->
<A NAME="contact"></a>
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
 
    map = new google.maps.Map(document.getElementById('map'),
        mapOptions);
 
    
}
 
google.maps.event.addDomListener(window, 'load', showGoogleMaps);
</script>
=======
<?php
require ("connection.php");
require ("header.php");
//Initializes Login Session
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
// Sets feed for Blog Post retrieval 
include_once $_SERVER['DOCUMENT_ROOT'] . '\political_mailing\simplepie\simplepie.inc.php';
$feed = new SimplePie();
$feed->set_feed_url(array(
	'http://crst.net/articles',
	'http://eddmtoday.com/blog/'));
$feed->enable_cache(false);
$feed->init();
$feed->handle_content_type();

?>
<!--Logo redirects here-->
<A NAME="home"></a>

<div id="content-1" class="content-slide"><div id="vslides_wrapper">
	<div id="vslides">
							<div class="vslide" id="vslide0" rel="0">
				<div class="layer"></div>
				<div class="overlayer"><h2><strong>Amazing Results</strong></h2>
<h3>Our strategies get the results you are looking for.</h3>
<!--HubSpot Call-to-Action Code -->
        <!--[if lte IE 8]><div id="hs-cta-ie-element"></div><![endif]-->
       
    </span>
    <script charset="utf-8" src="https://js.hscta.net/cta/current.js"></script>
    <script type="text/javascript">
        hbspt.cta.load(471763, '4d06d532-95fe-4bec-9bfc-99f74d4060f3');
    </script>
</span>
<!-- end HubSpot Call-to-Action Code --></div>
				<video controls autoplay loop><source src="images/gdvideo.mp4" type="video/mp4"></video>
			</div>
			
			<div class="vslide active" id="vslide1" rel="1">
				<div class="layer"></div>
				<div class="overlayer"><h2><strong>Amazing Results</strong></h2>
<h3>Our strategies get the results you are looking for.</h3>
<!--HubSpot Call-to-Action Code -->
        <!--[if lte IE 8]><div id="hs-cta-ie-element"></div><![endif]-->
       
    </span>
    <script charset="utf-8" src="https://js.hscta.net/cta/current.js"></script>
    <script type="text/javascript">
        hbspt.cta.load(471763, '4d06d532-95fe-4bec-9bfc-99f74d4060f3');
    </script>
</span>
<!-- end HubSpot Call-to-Action Code --></div>
				<video controls autoplay loop><source src="images/votingvideo.mp4" type="video/mp4"></video>
			</div>
					
</div></div>




<!--About Text-->
<A NAME="services"></a>
<div class="text">
<br><br><br><br><br><center>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</center><br><br><br><br><br>
</div>


<!--Div for Services Animations -->
<div class = "services" style="background: #f5f5f5">
	<div class ="hvr-sweep-to-bottomDATA" style="width: 16%;"><img src="images/png/server.png" style="width: 100%;" alt="Data"></div>

    <div class = "hvr-sweep-to-bottomGRAPHICS"style="width: 16%;"><img src="images/png/laptop-2.png"style="width: 100%;" alt="Graphic Design"></div>
	
	<div class = "hvr-sweep-to-bottomSTRATEGY"style="width:  16%;"><img src="images/png/strategy.png"style="width: 100%;" alt="Strategy"></div>
    
	<div class = "hvr-sweep-to-bottomPRINTING"style="width: 16%;"><img src="images/png/printer.png"style="width: 100%;" alt="Printing"></div>
   
    <div class = "hvr-sweep-to-bottomFUNDRAISING"style="width:  16%;"><img src="images/png/dollar-symbol.png"style="width: 100%;" alt="Fundraising"></div>
    
	<div class = "hvr-sweep-to-bottomMAILING"style="width:  16%;"><img src="images/png/email.png"style="width: 100%;" alt="Mailing"></div>
</div>

<!--Space for Portfolio, code in Portfolio.php, not crawlable-->
<A NAME="portfolio"></a>
<?php
require("portfolio.php");
?>

<!--HTML for Twitter -->
<div class="twitterWrap">
<div class="twitterHead">
Connect with Us on Twitter
<img src="images/whitetwitter.png" style="float:right; height:80px;"><br>
<a class="twitter-follow-button"
  href="https://twitter.com/CRSTNET">
Follow @CRSTNET</a>
<!--PHP file for capturing latest tweet-->
<div class="twitterBody">
<?php require("twittertest.php");?>
</div>
</div>

</div>
<!--Displays Blog Posts -->
<ul class="blogWrap">
<div class="blogHead">
Latest blog posts from Cornerstone's Blogs
</div>
<br>
<br>
<?php foreach ($feed->get_items(0, 3) as $item): ?>
    <li class="blog1">
	<div style="width: 25%; float:left; display:inline-block;">
<!--Assigns Website Logo to unique blog posts -->
	<?php if (strpos($item->get_link(0), 'crst.net') !== false)
		{
			echo "<img src='images/1.png' style='width: 30%;'>";
		}?>
	<?php if (strpos($item->get_link(0), 'eddmtoday.com') !== false)
		{
			echo "<img src='images/2.png'>";
		}?>
				<?php $month= $item->get_date('M'); ?>
		<?php $date = $item->get_date('d'); ?>
<!-- Creates Calander Icons-->
		<time datetime="0000-00-00" class="icon">
		<strong><?php echo $month ?></strong>
		<span><?php echo $date ?></span>  
		</time>
		</div>
		<div style="width: 75%; float:right; display: inline-block;">
<!--Gets Text for Title and Content(description) and prints -->
        <b><?php print $item->get_title(); ?></b>
		<?php print $item->get_description(); ?>
		<?php echo "<a href='". $item->get_link(0) . "'>Click here to read more...</a>";?>
		</div>

		
		
		<br>
		<br>
    </li>
<?php endforeach; ?>
</ul>

<?php
require("footer2.php");
?>
<!--Contact redirects here -->
<A NAME="contact"></a>
>>>>>>> origin/master
