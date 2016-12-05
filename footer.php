
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="copyright" content="">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="noindex, nofollow" />

<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require ("connection.php");
?>
<head>
<link rel="stylesheet" type="text/css" href="footer.css">
</head>

<div class="footer">
<ul class="links">
<li class="links2">Links<br></li>
<li class="links2"><a href="services.php">Services</a></li>
<li class="links2"><a href="Portfolio.php">Portfolio</a></li>
<li class="links2"><a href="contact.php">Contact</a></li>
</ul>

<ul class="links">
<li class="links2">Other Services<br></li>
<li class="links2"><a href="dataconsulate.com">Dataconsulate</a></li>
<li class="links2"><a href="EDDMToday.com">EDDMToday</a></li>
<li class="links2"><a href="crst.net">CRST.net</a></li>
</ul>

<ul class="links">
<li class="links2">Social Media<br></li>
<li class="links2"><a href="Facebook.com">Facebook</a></li>
<li class="links2"><a href="Twitter.com">Twitter</a></li>
<li class="links2"><a href="Pintrest.com">Pintrest</a></li>
<li class="links2"><a href="Linkedin.com">Linkedin</a></li>
</ul>

<ul class="links">
<li>
<form action="send_data.php" method="POST">
Sign up for our Newsletter!
  <input type="text" name="email" placeholder="Enter email here">
  <input type="submit" value="Sign Up!">
</form>
</li>
</ul>

</div>
</body>
</html>