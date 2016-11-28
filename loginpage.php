
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="copyright" content="">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="noindex, nofollow" />

<?php
require("connection.php");
require("header.php");
include('login.php');
if(isset($_SESSION['username']))
{
	header("location: blog.php");
}

?>

<!-- form for user to enter username and password which is sent to login.php -->
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<div id="login">
<form action="" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login ">
</form>
</div>
</div>
</body>
</html>
<?php require("footer.php"); ?>