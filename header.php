<?php
require("connection.php");
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

<head>
<link rel="stylesheet" type="text/css" href="header.css">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Fjalla+One">
</head>

<div class = "headdiv">

<div class = "header">
<img class="logo" src="images/crstlogo.png" alt="CRST Logo" float:left;">

<nav class = "headnav">
<ul class="headernavbar">

<li><a href="index.php"><img src = "images/home.png" style="width:20px; height:20px; padding-right: 20px;"></a></li>
<li><a href="index.php#services">Services</a></li>
<li><a href="portfolio.php">Portfolio</a></li>
<li><a href="blog.php?p=1">Blog</a></li>
<li><a href="contact.php">Contact Us</a></li>
<li><?php
	if(isset($_SESSION["user"]))
	{
	echo "Logged in as ". $temp; 
	}
?><li>
</ul>
</nav>

<div class="dropdown">
  <div class="container" onclick="myFunction(this)">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
  </div>
  <div id="myDropdown" class="dropdown-content">
    <a href="index.php">Home</a>
	<a href="index.php#services">Services</a>
	<a href="portfolio.php">Portfolio</a>
	<a href="blog.php?p=1">Blog</a>
	<a href="contact.php">Contact Us</a>
  </div>
</div>
</div>
<script>
function myFunction(x)
{
	x.classList.toggle("change");
	myFunction2();
}
</script>
<script>
function myFunction2()
{
document.getElementById("myDropdown").classList.toggle("show");
}
</script>
</div>






