<?php
require("connection.php");
require("header.php");
include('login.php');
if(isset($_SESSION['username']))
{
	header("location: blog.php");
}

?>

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