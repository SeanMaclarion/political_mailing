
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="copyright" content="">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="noindex, nofollow" />

<?php

require("connection.php");

$id = $_POST['id'];


$sql = "DELETE FROM portfolio WHERE id = " . $id;
$connect = $conn->query($sql) or die("Cannot connect.");

$conn->close();

header("location:portfolio.php");

?>