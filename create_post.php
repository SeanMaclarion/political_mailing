<!--form for adding new post to blog, sends info to add_post.php -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="copyright" content="">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="noindex, nofollow" />
<head>
<style>
body
{
	margin-top:80px;
}
</style>
</body>
<?php
require("connection.php");
require("header.php");
$user = $_SESSION["user"];
date_default_timezone_set('America/New_York');
?>

<form action="add_post.php" method="POST" enctype="multipart/form-data">
Post Title: <br> <!--sets title for post -->
<input type="text" name="postTitle"><br>
<br>
Post Image Upload:<br> <!--sets header image-->
<input type="file" NAME="file"><br>
<br>
Post Content:<br> <!-- sets post content -->
<textarea required placeholder="Type your post here"rows="8" cols="50" name="postContent"></textarea><br>
<br>
Tag Post *Seperated by commas*<br> <!-- sets tags for post -->
<textarea placeholder="Type your tags here"rows="1" cols="50" name="postTags"></textarea><br><br>

<?php
$timestamp = time(); //creates time variable
$mysqldate = date( 'm/d/y', $timestamp ); //sets date timestamp
$mysqltime = date( 'H:i:s', $timestamp ); //sets time timestamp
$sidebarMonth= date('m', $timestamp); //sets month for sorting purposes
$sidebarYear= date('y', $timestamp); //sets year for sorting purposes
?>
<!--These hidden inputs send PHP variables through html forms -->
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
