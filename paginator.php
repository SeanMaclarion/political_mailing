
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="copyright" content="">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="noindex, nofollow" />

<?php
require("connection.php");
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
$query=mysqli_query($conn,"select * from blog_posts limit $start, $limit");
$tot=mysqli_query($conn, "select * from blog_posts");
$total=mysqli_num_rows($tot);
$num_page=ceil($total/$limit);
echo'<table><th>Reg.Id</th><th>Name</th><th>Category</th>';
while($row=mysqli_fetch_array($query))
{
   echo "<br>". "<a href='view_post.php?id=".$row["id"]."'>" . $row["postTitle"] . "</a>" ."<br>". "<img src='images/".$row["postImage"]."'/ height='auto' width='100%'>" ."<br>";	
			echo substr($row["postContent"], 0, 500) . "...";
			echo "<a href='view_post.php?id=".$row["id"]."'>" . "Click here to read more</a><br>";
			
			if ($row["editUser"] != "")
			{
				echo "Edited on " . $row["editDate"] . " at " . $row["editTime"] . " by " . $row["editUser"] . "<br>";
			}
			else
			{
					echo "Posted on " . $row["postDate"] . " at " . $row["postTime"] . " by " . $row["username"] . "<br>";
			}
			if(isset($_SESSION["user"]))
			{
				echo "<a href='edit_post.php?id=".$row["id"]."'>" . "Click here to edit post</a><br>";
			}
			
		}
		if(isset($_SESSION["user"]))
			{
				echo "<a href='create_post.php'>Click here to create post</a><br>";
			}
else
{
	echo "Zero results.";
}

echo'</table>';
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
 echo'<li style="float:left;padding:5px;"><a href="paginator.php?p='.$i.'">'.$i.'</a></li>';
}
  }
  echo'</ul>';
}
if($num_page>1)
{
 pagination($page,$num_page);
}
?>