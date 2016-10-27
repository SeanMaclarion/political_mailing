<?php
require("header.php");
require("connection.php");

$to = "sgriffin@crst.net";
$subject = "Estimate from PoliticalMailing.com";
$name = trim(stripslashes($_POST['name'])); 
$email = trim(stripslashes($_POST['email'])); 
$phone = trim(stripslashes($_POST['phone'])); 
$comments = trim(stripslashes($_POST['comments'])); 

$type = trim(stripslashes($_POST['type'])); 
$count = trim(stripslashes($_POST['count'])); 
$area = trim(stripslashes($_POST['area'])); 

if ($name=="" || $email=="" || $message=="") {
  
$lastpage = $_SERVER['HTTP_REFERER'];
$error =  "Looks like you've done something wrong there. Make sure all those fields are filled in.";
$locstring = "Location: $lastpage?error=true&error_string=$error";
 
 
header($locstring); exit();

}

// prepare email body text
$body = "";
$body .= "Name: ";
$body .= $name;
$body .= "\n";
$body .= "Email: ";
$body .= $email;
$body .= "\n";
$body .= "Phone: ";
$body .= $phone;
$body .= "\n";
$body .= "I want to send a ";
$body .= $type;
$body .= " mailing of";
$body .= $count;
$body .= " pieces to: ";
$body .= $area;
$body .= "\n";
$body .= "Comments:";
$body .= "\n";
$body .= $comments;



// send email 
$success = mail($to, $subject, $body, "From: <$email>");
if ($success){
	alert("Email Sent, Thank you for your intrest!");
	header("Location: index.php");  

}
else
{
	alert("Email not Sent, Try again later!");
	header("Location: contact.php");
}
 exit();
require("footer.php");
?>

