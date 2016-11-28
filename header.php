<!--Header for PoliticalMailing.com -->
<?php
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

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="copyright" content="">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="noindex, nofollow" />
<link rel="stylesheet" type="text/css" href="header.css">
<link rel="stylesheet" type="text/css" href="ribbon.css">

<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

</head>

<div class = "headdiv">

<div class = "header">
<!-- Header Logo and Link to Home Page -->
<a href="index.php#home"><img class="logo" src="images/crstlogo.png" alt="CRST Logo"></a>

<!-- Header for Desktop and Laptop -->
<nav class = "headnav">
<div id='container'>
    <div class='ribbon'>
		<a href="index.php#services"><span>Services</span></a>
		<a href="index.php#portfolio"><span>Portfolio</span></a>
		<a href="blog.php?p=1"><span>Blog</span></a>
		<a href="index.php#contact"><span>Contact Us</a>
		
    </div>
</div>
</nav>

<!-- Harmburger menu for tablet and mobile -->
<div class="dropdown">
  <div class="container" onclick="myFunction(this)">
  <div class="bar1"></div>
  <div class="bar2"></div>
  <div class="bar3"></div>
  </div>
  <div id="myDropdown" class="dropdown-content">
    <a href="index.php#home">Home</a>
	<a href="index.php#services">Services</a>
	<a href="index.php#portfolio"">Portfolio</a>
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






