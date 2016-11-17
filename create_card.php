
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

<form action="add_card.php" method="POST">
Post Title: <br>
<input type="text" name="title"><br>
<br>
Front Image Upload:<br>
<input type="file" NAME="imageFront"><br>
Back Image Upload:<br>
<input type="file" NAME="imageBack"><br>
<br>
Post Content:<br>
<textarea required placeholder="Type your caption here"rows="8" cols="50" name="caption"></textarea><br>
<br>
Result<br>
<textarea placeholder="Type your result here"rows="1" cols="50" name="result"></textarea><br><br>

<input type="submit" value="Submit Post">
</form>


<?php
require("footer.php");
?>
