<?php

require("connection.php");
$email = $_POST['email'];


$sql = "INSERT INTO newsletter(email) VALUES ('$email')";
$connect = $conn->query($sql) or die("Cannot connect.");

$conn->close();

header("location:index.php");


?>

