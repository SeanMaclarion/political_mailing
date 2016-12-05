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

require("sidebar.php");
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
<!--Stylesheets -->
<link rel="stylesheet" type="text/css" href="blog.css">
<!--Meta tags for SEO -->
<title>Political Mailing Blog by Cornerstone</title>
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="copyright" content="2016, Cornerstone Services">
<meta name="description" content="Website for Political Mailing by Cornerstone Services.">
<meta name="keywords" content="direct mail, political mail, campaign mail, fundraising mail, mail blog">
<meta name="robots" content="index, follow" />
</head>

<div id="blog">
<!--Sets Page for Paginator -->
<?php
$page=$_REQUEST['p']; //page from URL
$limit=3; //limit of post on a page
if($page=='') //If no page selected , go to page 1
{
 $page=1;
 $start=0;
}
else //else find what page you need to be on
{
 $start=$limit*($page-1);
}
//Prints out blog posts in descending order with a limit of $limit per page
$query=mysqli_query($conn,"select * from blog_posts ORDER BY postDate DESC , postTIME DESC limit $start, $limit"); 
$tot=mysqli_query($conn, "select * from blog_posts");
$total=mysqli_num_rows($tot);
$num_page=ceil($total/$limit);
if ($result->num_rows > 0)
{
	while($row=mysqli_fetch_array($query))
	{
	   echo "<br>";
	   echo "<br>". "<a href='view_post.php?id=".$row["id"]."'><h1>" . $row["postTitle"] . "</h1></a>" ."<br>". "<img src='images/".$row["postImage"]."'/ height='auto' width='100%'>" ."<br>";	
				echo "<div id='text' name='text'>" . substr($row["postContent"], 0, 500) . " ...</div>";
				echo "<a href='view_post.php?id=".$row["id"]."'>" . "Click here to read more</a><br>";
				
				if ($row["editUser"] != "")
				{
					echo "Edited on " . $row["editDate"] . " at " . $row["editTime"] . " by " . $row["editUser"] . "<br>";
				}
				else
				{
						echo "Posted on " . $row["postDate"] . " at " . $row["postTime"] . " by " . $row["username"] . "<br>";
				}
				
				$sql2 = "SELECT tags FROM blog_posts WHERE id=".$row["id"];
				$result2 = mysqli_query($conn,$sql2);
				$tagsArray = array();
				if ($result2)
				{
					$row2 = mysqli_fetch_row($result2);
					$tags = $row2[0];
					$tagsArray = explode(",",$tags);
				}
				$index = 0;
				$count = count($tagsArray);

				while ($index < $count)
				{
				  echo "<a href='view_tags.php?p=1&tags=".$tagsArray[$index]."'>" . $tagsArray[$index] . "</a>";
				  $index++;
				}
				if(isset($_SESSION["user"]))
				{
					echo "<br><a href='edit_post.php?id=".$row["id"]."'><button>Edit Post</button></a><br>";
				}
				
		}
}
else
{
		echo "No results";
}




//Calls pagination function and prints pages on bottom of page
function pagination($page,$num_page)
{
  echo'<ul style="list-style-type:none;">';
  for($i=1;$i<=$num_page;$i++)
  {
     if($i==$page)
{
 echo'<li style="float:left;padding:5px;">'.$i.'</li>';
}
else
{
 echo'<li style="float:left;padding:5px;"><a href="blog.php?p='.$i.'">'.$i.'</a></li>';
}
  }
  echo'</ul>';
}
if($num_page>1)
{
 pagination($page,$num_page);
}
$conn->close();
?>

</script>
<script type="text/javascript" src="micromarkdown.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script>
  var input = $('#text').text();
$(document).ready(function(){
  $('#text').html(micromarkdown.parse(input));
    if($display = "no"){
        $("form").hide();
    }
	if($display = "yes"){
        $("form").show();
    }
});
</script>
</div>

<?php
?>

