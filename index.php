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

<!--Google Analytics Script-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-87612942-1', 'auto');
  ga('send', 'pageview');

</script>

<head>

<!--Meta Tags for SEO-->
<title>Political Mailing by Cornerstone</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="copyright" content="">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="index, follow" />

<!--Stylesheets-->
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="calander.css">
<link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />

<!-- js for Slideshow header -->
 <script src="themes/1/js-image-slider.js" type="text/javascript"></script> 
</head>
<!--Logo redirects here-->
<A NAME="home"></a>

<!--Slideshow Header-->
    <div id="sliderFrame">
        <div id="slider">
            <img src="images/testheader.jpg"/>
            <img src="images/testheader2.jpg"/>
            <img src="images/testheader3.jpg"/>
        </div>
		</div>


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
