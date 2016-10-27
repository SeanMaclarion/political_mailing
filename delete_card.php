<?php

require("connection.php");

$id = $_POST['id'];


$sql = "DELETE FROM portfolio WHERE id = " . $id;
$connect = $conn->query($sql) or die("Cannot connect.");

$conn->close();

header("location:portfolio.php");

?>