<head>
<link rel="stylesheet" type="text/css" href="blog.css">
</head>
<?php

require("header.php");
require("connection.php");
require("sidebar.php");

$term = $_POST['search'];
	
$sql = "SELECT * FROM blog_posts WHERE postContent LIKE '%" . $term . "%' OR postTitle like '%" . $term . "%'";
$result = mysqli_query($conn,$sql);
if ($result->num_rows > 0)
{
		while($row = $result->fetch_assoc())
		{
			echo "<div id=blog>";
	        echo "<br>". "<a href='view_post.php?id=".$row["id"]."'>" . $row["postTitle"] . "</a>" ."<br>". "<img src='images/".$row["postImage"]."'/ height='auto' width='100%'>" ."<br>";	
			echo substr($row["postContent"], 0, 500) . "...";
			echo "<a href='view_post.php?id=".$row["id"]."'>" . "Click here to read more</a><br>";
			echo "</div>";
		}
}
else 
{
	echo "Zero results.";
}


?>