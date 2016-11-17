
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="copyright" content="">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="noindex, nofollow" />

<?php
require ("connection.php");
   session_start();
   $error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn, $_POST['user']);
      $mypassword = mysqli_real_escape_string($conn, $_POST['password']); 
	  
	  $_SESSION['user'] = $myusername; 
	  
      $sql = "SELECT * FROM blog_users WHERE user = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  $_SESSION['initial'] = $row['initial'];
      
      $count = mysqli_num_rows($result); 
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
        header("location: blog.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
<form action="" method="post">
<label>UserName :</label>
<input name="user" placeholder="username" type="text">
<label>Password :</label>
<input name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login ">
</form>
</html>