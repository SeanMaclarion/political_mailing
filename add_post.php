<?php

require("connection.php");

$postTitle = $_POST['postTitle'];
$postImage= $_POST['postImage'];
$postContent = $_POST['postContent'];
$postDate = $_POST['postDate'];
$postTime = $_POST['postTime'];
$user = $_POST['username'];
$sidebarMonth = $_POST['sidebarMonth'];
$sidebarYear = $_POST['sidebarYear'];
$postTags = $_POST['postTags'];

$sql = "INSERT INTO blog_posts(postImage, postTitle, postContent, postDate, postTime, username, sidebarMonth, sidebarYear, tags) VALUES ('$postImage','$postTitle', '$postContent', '$postDate', '$postTime', '$user', '$sidebarMonth', '$sidebarYear', '$postTags')";
$connect = $conn->query($sql) or die("Cannot connect.");

$conn->close();

header("location:blog.php?p=1");


?>
