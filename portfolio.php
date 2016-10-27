<?php
require("connection.php");
require("header.php");
?>

<head>
<!--Style Sheet for portfolio page -->
<link rel="stylesheet" type="text/css" href="portfolio.css">
<!--Style Sheet for lightbox -->
<link href="lightbox.css" rel="stylesheet">
<style>

</style>
</head>

<body>
<?php
$result=mysqli_query($conn,"select * from portfolio");
if ($result->num_rows > 0)
{
	while($row=mysqli_fetch_array($result))
	{
		echo "<div class='tooltip'>";
	    echo "<a href='view_card.php?id=".$row["id"]."'>";	
		echo "<img class='cardsprite' style='width: 100%; height: 30%; background: url(portfolio/" . $row["imageFront"] . ") -150px -100px;'>";
		echo "</a>";
		echo "<span class='tooltiptext'>Some Text</span>";
		echo "</div>";
	}
}
?>
<?php
if(!isset($_SESSION["user"]))
			{
				echo "<br><a href='login.php'><button>Login</button></a>";
			}
else
{
	echo "<br><br><a href='logout.php'><button>Logout</button></a>";
}
if(isset($_SESSION["user"]))
				{
					echo "<a href='create_card.php'><button>Create Post</button></a>";
				}
				


?>


  

</body>
<?php
require("footer.php");
?>