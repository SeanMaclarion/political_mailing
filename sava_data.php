<?php
require ("connection.php");

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$sql = "INSERT INTO newsletter(firstname, lastname, email, phone) VALUES ('$firstname', '$lastname', '$email', '$phone')";
$result = $conn->query($sql) or die('Error querying database.');
 
$conn->close();


exit();
?>

