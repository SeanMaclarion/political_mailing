<?php
require("connection.php");
require("header.php");
require("sidebar.php");
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="copyright" content="">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="noindex, nofollow" />
<link rel="stylesheet" type="text/css" href="blog.css">
<?php
$user= $_GET['username'];
$sql = "select * from blog_posts where username = '". $user ."' ORDER BY postDate DESC, postTIME DESC";
$result = mysqli_query($conn, $sql);
$page=$_REQUEST['p'];
$limit=3;
if($page=='')
{
 $page=1;
 $start=0;
}
else
{
 $start=$limit*($page-1);
}
$query=mysqli_query($conn,"select * from blog_posts where username = '". $user ."' ORDER BY postDate DESC, postTIME DESC limit $start, $limit");
$tot=mysqli_query($conn, "select * from blog_posts where username = '". $user ."' ORDER BY postDate DESC, postTIME DESC");
$total=mysqli_num_rows($tot);
$num_page=ceil($total/$limit);
   	echo "<div id=blog>";
	if ($result->num_rows > 0)
{
while($row=mysqli_fetch_array($query))
{
   echo "<br>";

   echo "<br>". "<a href='view_post.php?id=".$row["id"]."'>" . $row["postTitle"] . "</a>" ."<br>". "<img src='images/".$row["postImage"]."'/ height='auto' width='100%'>" ."<br>";	
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
else{
	echo "No results";
}



function pagination($page,$num_page,$user)
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
 echo'<li style="float:left;padding:5px;"><a href="view_users.php?p='.$i.'&username='.$user.'">'.$i.'</a></li>';
}
  }
  echo'</ul>';
}
if($num_page>1)
{
 pagination($page,$num_page,$user);
}
$conn->close();


echo "</div>";


?>
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
