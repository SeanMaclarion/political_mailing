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
