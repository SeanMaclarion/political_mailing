
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="copyright" content="">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="noindex, nofollow" />

<?php
require("connection.php");
?>
<body>
<!-- creates sidebar div -->            
<div id="mySidebar" class="sidebar">
<!-- adds close button with reference to close js function -->
<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<form action="searchresults.php" method="POST">
 <input type="search" name="search" placeholder="Search Blog Posts"><br>
 <input type="submit" value="Search">
</form>

<!--allows user to create posts if logged in -->
<?php
if(isset($_SESSION["user"]))
				{
					echo "<a href='create_post.php'><button>Create Post</button></a>";
				}
				
echo "<br><br><strong>Most Recent Blog Posts</strong>";
//Shows the 3 most recent posts titles with links in sidebar
$count = 0;
$result = mysqli_query($conn,"SELECT * FROM blog_posts ORDER BY postDate DESC, postTIME DESC");
if ($result->num_rows > 0)
{
		while($row = $result->fetch_assoc())
		{
			if ($count < 3)
			{
				echo "<br>". "<a href='view_post.php?id=".$row["id"]."'>" . $row["postTitle"] . "</a>";	
				$count = $count + 1;
			}
		}
		echo "<br><br>";
}

//Sorts all blog posts by months and displays how many posts are in each month, when clicked, shows all posts from the month
echo "<strong>Blog Posts by Month<br></strong>";
$month = 1;
$year = 16; //updated to current year
$months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
while ($month <= 12)
{
    echo "<a href='view_months.php?p=1&month=".$month."'>" . $months[$month-1] . " 2016</a>";
	$sql = "SELECT * FROM blog_posts WHERE sidebarMonth = '" . $month . "' AND sidebarYear = '" . $year . "'";
	$result = mysqli_query($conn,$sql);
	$count = 0;
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$count = $count+1;
		}
	}
	echo " (" . $count . ")<br>";
	$month = $month + 1;
}
?>
<br>
<?php
//Sorts all blog posts by user and displays how many posts each user has made, when clicked shows all posts by each user
echo "<strong>Blog Posts by User<br></strong>";
$sql = "SELECT username FROM blog_posts";
$result = mysqli_query($conn,$sql);
$userArray = array();
$index = 0;
if ($result->num_rows > 0)
{
		while($row = $result->fetch_assoc())
		{
				$userArray[$index] = $row["username"];
				
				$index++;
    
				
		}
}
$userArray = array_unique($userArray);
$index = 0;
$count = count($userArray);

while ($index <= $count)
{
	if (!isset($userArray[$index]))
	{
		$index++;
	}
	else
	{
    echo "<a href='view_users.php?p=1&username=".$userArray[$index]."'>" . $userArray[$index] . "</a>";
	$sql = "SELECT * FROM blog_posts WHERE username = '" . $userArray[$index] ."'";
	$result = mysqli_query($conn,$sql);
	$postCount = 0;
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$postCount++;
		}
	}
	echo " (" . $postCount . ")<br>";
	$index++;
	}
}
//Sorts all posts by tags, when clicked shows all posts with that tag
echo "<br><strong>Blog Posts by Tag</strong>";
$sql = "SELECT tags FROM blog_posts";
$result = mysqli_query($conn,$sql);
$tagArray = array();
$index = 0;
if ($result->num_rows > 0)
{
		while($row = $result->fetch_assoc())
		{
				$tagArray[$index] = $row["tags"];
				
				$index++;
    
				
		}
}
$index = 0;
$count = count($tagArray);
$splitTagArray = array();
while ($index < $count)
{	
	array_push($splitTagArray, explode(",",$tagArray[$index]));
	$index++;
	
}
$finalArray = array();
$count = count($splitTagArray);
$index = 0;
while ($index < $count)
{
	$tempArray = $splitTagArray[$index];
	$count2 = count($tempArray);	
	$index++;
	$index2 = 0;
	while($index2 < $count2)
	{
		$temp = trim ($tempArray[$index2]);
		array_push($finalArray, $temp);
		$index2++;
	}
}

$displayArray = array();
$displayArray = $finalArray;
$displayArray = array_unique($displayArray);
$displayArray = array_values($displayArray);

$count = count($displayArray);
$displayIndex = 0;
$tagCount = 0;
$tagArray = array();
$sidebarArray = array();
while($displayIndex < $count)
{
	$sql = "select * from blog_posts where tags LIKE '%" . $displayArray[$displayIndex] . "%' ORDER BY postDate DESC, postTIME DESC";
		$result = mysqli_query($conn, $sql);
		$tagCount = 0;
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{	
				$tagCount++;
			}
			array_push($tagArray, $tagCount);
		array_push($sidebarArray, "<br><a href='view_tags.php?p=1&tags=".$displayArray[$displayIndex]."'>" . $displayArray[$displayIndex] . "</a>" . " (" . $tagCount . ")");
		sort($sidebarArray);
		
		$displayIndex++;
		}	
	
}

$index4 = 0;
$count = count($sidebarArray);
while ($index4 < $count)
{
	echo $sidebarArray[$index4];
	$index4++;
}





if(!isset($_SESSION["user"]))
			{
				echo "<br><a href='login.php'><button>Login</button></a>";
			}
else
{
	echo "<br><br><a href='logout.php'><button>Logout</button></a>";
}




?>
</div>
<div id="main">
  <button id="sidebarButton" onclick="openNav()"><</button>
</div>

<script>
function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginRight = "250px";
	document.getElementById("blog").style.width = "75%";
	document.getElementById("sidebarButton").style.marginRight = "250px";
		document.getElementById("sidebarButton").style.opacity = "0";

}

function closeNav() {
    document.getElementById("mySidebar").style.width = "0px";
    document.getElementById("main").style.marginRight= "0px";
	document.getElementById("blog").style.width = "90%";
	document.getElementById("sidebarButton").style.marginRight="0";
		document.getElementById("sidebarButton").style.opacity = "100";

	
}
</script>
