
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="copyright" content="">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="noindex, nofollow" />

<?php
require("connection.php");
require("header.php");
$id = $_GET['id'];
$sql = "select * from blog_posts where id = $id";
date_default_timezone_set('America/New_York');
$result = mysqli_query($conn, $sql);

if ($result){
    $row = mysqli_fetch_row($result);
    $title = $row[2];
    $content = $row[3];
	$tags = $row[12];
	$img = $row[1];
	
    }
$timestamp = time();
$mysqldate = date( 'm/d/y', $timestamp );
$mysqltime = date( 'H:i:s', $timestamp );
$user = $_SESSION["user"];
?>

<form action="update_post.php" method="POST">
Change Title: <br>
<input type="text" name="postTitle" value="<?php echo $title?>"><br>
<br>
Post Content:<br>
<textarea required rows="8" cols="50" name="postContent"><?php echo $content?></textarea><br>
Tag Post *Seperated by commas*<br>
<textarea placeholder="Type your tags here"rows="1" cols="50" name="postTags"><?php echo $tags?></textarea><br><br>
<input type='hidden' name='id' value=<?php echo $id;?>> 

<input type='hidden' name='editDate' value=<?php echo $mysqldate;?>> 
<input type='hidden' name='editTime' value=<?php echo $mysqltime;?>> 
<input type='hidden' name='editUser' value=<?php echo $user;?>> 

<input type="submit" value="Update Post">
</form>

<form action ="delete_post.php" method="POST">
<input type='hidden' name='id' value=<?php echo $id;?>>
<input type="submit" value="Delete Post">
</form>