<!-- destroys the session and logs the user out -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="copyright" content="">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="noindex, nofollow" />

<?php
session_start();
	session_destroy();
	header("location: blog.php");
?>

 ?>