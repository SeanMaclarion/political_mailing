<!--Header for PoliticalMailing.com -->
<?php
require("head.php");
require("connection.php");
//saves sessions for logged in users
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(isset($_SESSION["user"]))
{
	
$temp = $_SESSION["user"];
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT user FROM blog_users WHERE user = '$temp'";
$result = mysqli_query($conn, $sql);

		
}
?>

<div class="mobile-top-navigation">
	<a class="mobile-logo" href="/"><img src="images/crstlogo.png" alt="CRST Logo" /></a>
	<ul class="menu main">
		<li><a href="/chicago-web-design-projects/">Portfolio</a></li>
		<li><a href="http://blog.comradeweb.com">Blog</a></li>
		<li><a href="http://info.comradeweb.com/contact-chicago-web-agency">Contact</a></li>
	</ul>
</div>
<div class="new-top-navigation">
	<div class="menu-wrapper">
	<ul class="menu-left">
		<li class="green"><a href="index.php#services">Services</a></li>
		<li class="red "><a href="index.php#portfolio">Portfolio</a></li>
	</ul>
	<a class="star" href="/"></a>
	<ul class="menu-right">
		<li class="blue"><a href="blog.php?p=1">Blog</a></li>
		<li class="yellow "><a href="index.php#contact">Contact</a></li>
	</ul>
	</div>
</div>

<body>






