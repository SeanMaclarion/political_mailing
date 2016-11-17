<?php
require("connection.php");
require("header.php");
$id = $_GET['id'];
$sql = "select * from portfolio where id = $id";
$result = mysqli_query($conn, $sql);
?>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="copyright" content="">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="noindex, nofollow" />
<link rel="stylesheet" type="text/css" href="view_card.css">
</head>
<?php

    
    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a');
    $color = '#'.$rand[rand(0,10)].$rand[rand(0,10)].$rand[rand(0,10)].$rand[rand(0,10)].$rand[rand(0,10)].$rand[rand(0,10)];

if ($result->num_rows > 0){
    $row = mysqli_fetch_row($result);
    $title = $row[1];
    $caption = $row[4];
	$result = $row[5];
}
	
    
?>

<html>
    <head>
    <title><?php echo $title?></title>
    </head>
    <body>
	<div class="images">
		<?php
		 echo "<img src='portfolio/".$row[2]."'/ height='auto' width='100%'><br>";
		 echo "<img src='portfolio/".$row[3]."'/ height='auto' width='100%'>";
		?>
	</div>
	<div class="content" style="background: <?php echo $color; ?>;">
	<?php
	echo $title . "<br>";
	echo $caption . "<br>";
	echo "RESULT: " . $result;
	?>
	</div>
	<?php
if(isset($_SESSION["user"]))
				{
					echo "<a href='edit_card.php?id=$id'><button>Edit Post</button></a>";
					echo "<a href='create_card.php'><button>Create Card</button></a>";
				}
				?>
				
<?php
$id = $_GET['id'];
$sql = "select * from portfolio";
$result = mysqli_query($conn, $sql);

$cardArray = array();
if ($result->num_rows > 0)
{
	while($row=mysqli_fetch_array($result))
	{
		array_push($cardArray, $row[0]);
	}
}

$count = count($cardArray);
$nextID = 0;
for ($i = 0; $i < $count-1; $i++)
{
		if ($cardArray[$i] == $id)
		{
			$nextID = $cardArray[$i+1];
		}
}
if ($nextID != 0)
		{
			echo "<a href='view_card.php?id=" . $nextID . "'><button id='nextbutton'>></button></a>";
		}


?>

<?php

$count = count($cardArray);
$prevID = 1000000;
for ($i = $count-1; $i > 0; $i--)
{
		if ($cardArray[$i] == $id)
		{
			$prevID = $cardArray[$i-1];
		}
}
if ($prevID != 1000000)
		{
			echo "<a href='view_card.php?id=" . $prevID . "'><button id='prevbutton'><</button></a>";
		}

require("footer.php");
?>
    </body>
</html>