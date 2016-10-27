<?php

require("connection.php");

$id = $_POST['id'];


$sql = "DELETE FROM blog_posts WHERE id = " . $id;
$connect = $conn->query($sql) or die("Cannot connect.");

$conn->close();

header("location:blog.php?p=1");

?>