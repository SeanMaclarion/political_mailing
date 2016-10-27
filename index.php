<?php
require ("connection.php");
require ("header.php");
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
// Settings for Recent Blog Posts on index.php
include_once $_SERVER['DOCUMENT_ROOT'] . '\political_mailing\simplepie\simplepie.inc.php';
$feed = new SimplePie();
$feed->set_feed_url('http://crst.net/articles');
$feed->enable_cache(false);
$feed->init();
$feed->handle_content_type();
//end settings
?>

<head>
<link rel="stylesheet" type="text/css" href="index.css">
<link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
<!-- js for Slideshow header -->
    <script src="themes/1/js-image-slider.js" type="text/javascript"></script> 
<!-- end js for slide show header-->
    <link href="generic.css" rel="stylesheet" type="text/css" />
</head>
<div id="preloadedImages"></div>
<!--Script for facebook feed-->
<div id="fb-root"></div>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!--end script for facebook feed -->

<!--Slideshow Header-->
    <div id="sliderFrame">
        <div id="slider">
            <img src="images/testheader.jpg"/>
            <img src="images/testheader2.jpg"/>
            <img src="images/testheader3.jpg"/>
        </div>
		</div>
<!--end slideshow Header -->

<!--About Text-->
<A NAME="services"></a>
<div class="text">
<br><br><br><br><br><center>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</center><br><br><br><br><br>
</div>
<!--End About Text -->

<!--Div for Services Cards -->
<!--Creates a "card" iwht an image on the front and text on the back -->

	<div class ="hvr-sweep-to-bottom" id = "data" style="content: 'Hi' !important">

    <img src="images/data.png">
	</div>

    <img src="images/gd.png">
	
	<img src="images/strat.png">
    
	<img src="images/printing.png">
   
    <img src="images/dollar.png">
    
	<img src="images/mail.png">

	
<!--div for Social Media -->
<div class="social">
<!--HTML for Facebooks -->
<div class="fb-page" data-href="https://www.facebook.com/CornerstoneServicesInc/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>
<!--HTML for Twitter -->
<a class="twitter-timeline" data-width="400" data-height="500" href="https://twitter.com/CRSTNET">Tweets by CRSTNET</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

<!--Displays Blog Posts -->
<ul class="blog">
<b>Latest blog posts from <?php print $feed->get_title(); ?></b>
<br>
<br>
<?php foreach ($feed->get_items(0, 3) as $item): ?>
    <li class="blog1">
        <b><?php print $item->get_title(); ?></b>
		<?php print $item->get_content(); ?>
		<br>
		<br>
    </li>
<?php endforeach; ?>

<a href="http://crst.net/articles/">Click here to read more from Cornerstone Services</a>
</ul>
</div>
<!--End blog post display -->
<!--End Social Media Div -->

<?php
require("footer.php");
?>

