<?php

require("connection.php");

$postImage = $_POST['postImage'];
$postTitle = $_POST['postTitle'];
$postContent = $_POST['postContent'];


$sql = "INSERT INTO blog_posts(postImage, postTitle, postContent) VALUES ('$postImage', '$postTitle', '$postContent')";
$connect = $conn->query($sql) or die("Cannot connect.");

$conn->close();

header("location:index.php");


?>
