
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="copyright" content="">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="noindex, nofollow" />



<?php

require("connection.php");

$title = $_POST['title'];
$frontImage= $_POST['imageFront'];
$backImage= $_POST['imageBack'];
$caption = $_POST['caption'];
$result = $_POST['result'];

$sql = "INSERT INTO portfolio(title,imageFront,imageBack,caption,result) VALUES ('$title','$frontImage', '$backImage', '$caption', '$result')";
$connect = $conn->query($sql) or die("Cannot connect.");

$conn->close();

header("location:index.php#portfolio");


?>
