<?php

require("connection.php");

$title = $_POST['title'];
$caption = $_POST['caption'];
$result = $_POST['result'];
$id = $_POST['id'];

$sql = "UPDATE portfolio SET title='$title', caption='$caption', result='$result' WHERE id='$id'";
$connect = $conn->query($sql) or die("Cannot connect.");


$conn->close();

header("location:portfolio.php");


?>
