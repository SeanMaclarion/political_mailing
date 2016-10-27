<?php
require("connection.php");
require("header.php");
?>

<form action="add_post.php">
Post Title: <br>
<input type="text" name="postTitle"><br>
<br>
Post Image Upload:<br>
<input type="file" NAME="postImage"><br>
<br>
Post Content:<br>
<textarea required placeholder="Type your post here"rows="8" cols="50" name="postContent"></textarea><br>

<input type="submit" value="Submit Post">
</form>

<?php
require("footer.php");
?>
