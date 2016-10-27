<?php
require("connection.php");
require("header.php");
$id = $_GET['id'];
$sql = "select * from portfolio where id = $id";
date_default_timezone_set('America/New_York');
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0){
    $row = mysqli_fetch_row($result);
    $title = $row[1];
    $caption = $row[4];
	$result = $row[5];
	
    }
$user = $_SESSION["user"];
?>

<form action="update_card.php" method="POST">
Change Title: <br>
<input type="text" name="title" value="<?php echo $title?>"><br>
<br>
Change Caption:<br>
<textarea required rows="8" cols="50" name="caption"><?php echo $caption?></textarea><br>
Change Result*<br>
<textarea placeholder="Type Result Here"rows="1" cols="50" name="result"><?php echo $result?></textarea><br><br>
<input type='hidden' name='id' value=<?php echo $id;?>> 
<input type="submit" value="Update Post">
</form>

<form action ="delete_card.php" method="POST">
<input type='hidden' name='id' value=<?php echo $id;?>>
<input type="submit" value="Delete Post">
</form>