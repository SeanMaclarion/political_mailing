<?php

require("connection.php");

$postTitle = $_POST['postTitle'];
$postContent = $_POST['postContent'];
$editUser = $_POST['editUser'];
$editDate = $_POST['editDate'];
$editTime = $_POST['editTime'];
$id = $_POST['id'];
$postTags = $_POST['postTags'];

$sql = "UPDATE blog_posts SET tags='$postTags', postTitle='$postTitle', postContent='$postContent', editUser='$editUser', editDate='$editDate', editTime='$editTime' WHERE id='$id'";
$connect = $conn->query($sql) or die("Cannot connect.");


$conn->close();

header("location:blog.php?p=1");


?>
