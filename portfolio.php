<!--Portfolio section for index.php, displays image of card with link for view_post.php of the card -->
<?php
require("connection.php");

?>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="copyright" content="">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="noindex, nofollow" />
<!--Style Sheet for portfolio page -->
<link rel="stylesheet" type="text/css" href="portfolio.css">
<style>

</style>
</head>

<body>
<div class="portfolio">
<h2><center>Our Showcase</center></h2>
<?php
$result=mysqli_query($conn,"select * from portfolio");
if ($result->num_rows > 0)
{
	//creates card with sprite of image and adds link for view card for each card.
	while($row=mysqli_fetch_array($result))
	{
		echo "<div class='card'>";
	    echo "<a href='view_card.php?id=".$row["id"]."'>";	
		echo "<img class='cardsprite' style='width: 100%; height: 30%; background: url(portfolio/" . $row["imageFront"] . ") 20% 20%;'>";
		echo "</a>";
		echo "</div>";
	}
}
?>
</div>



  

</body>
<?php

?>