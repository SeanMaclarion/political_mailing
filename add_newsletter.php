<?php

require("connection.php");

$fullname = $_POST['fullname'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];

$sql = "INSERT INTO newsletter(fullname, address, city, state, zip) VALUES ('$fullname', '$address', '$city', '$state', '$zip')";
$connect = $conn->query($sql) or die("Cannot connect.");

$conn->close();

header("location:index.php#newsletter");


?>
