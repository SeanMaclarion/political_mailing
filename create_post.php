
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="copyright" content="">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="noindex, nofollow" />

<?php
require("connection.php");
require("header.php");
$user = $_SESSION["user"];
echo $user;
date_default_timezone_set('America/New_York');
?>

<form action="add_post.php" method="POST">
Post Title: <br>
<input type="text" name="postTitle"><br>
<br>
Post Image Upload:<br>
<input type="file" NAME="postImage"><br>
<br>
Post Content:<br>
<textarea required placeholder="Type your post here"rows="8" cols="50" name="postContent"></textarea><br>
<br>
Tag Post *Seperated by commas*<br>
<textarea placeholder="Type your tags here"rows="1" cols="50" name="postTags"></textarea><br><br>

<?php
$timestamp = time();
$mysqldate = date( 'm/d/y', $timestamp );
$mysqltime = date( 'H:i:s', $timestamp );
$sidebarMonth= date('m', $timestamp);
$sidebarYear= date('y', $timestamp);
?>

<input type='hidden' name='postDate' value=<?php echo $mysqldate;?>> 
<input type='hidden' name='postTime' value=<?php echo $mysqltime;?>> 
<input type='hidden' name='username' value=<?php echo $user;?>> 
<input type='hidden' name='sidebarMonth' value=<?php echo $sidebarMonth;?>> 
<input type='hidden' name='sidebarYear' value=<?php echo $sidebarYear;?>> 

<input type="submit" value="Submit Post">
</form>


<?php
require("footer.php");
?>
