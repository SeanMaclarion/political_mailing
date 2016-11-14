<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
	<script src="twitter.js"></script>
	<style>
	body {
  background:#bae0f6;
  font-size:14px;
  font-family: 'Helvetica', arial, sans-serif;
}

* {
  -webkit-box-sizing:border-box;
  -moz-box-sizing:border-box;
  box-sizing:border-box;
}

#jstwitter {
	width: 300px;
	font-size: 15px;
	color: #333333;
  margin: 0 auto;
  text-align:center;
}

#jstwitter .tweet {
	margin: 0 auto 15px auto;
	padding: 15px;
	border-radius:3px;
  background:#ffffff;
  text-align:left;
  box-shadow: 0 0 2px 1px rgba(0,0,0,0.1);
}

#jstwitter .tweet a {
	text-decoration: none;
	color: #13c9d0;
}

#jstwitter .tweet a:hover {
	text-decoration: underline;
}

#jstwitter img {
  display:block;
  margin-bottom:5px;
  max-width:100%;
}

#jstwitter .tweet .time {
	font-size: 10px;
	font-style: italic;
	color: #666666;
  display:block;
  margin-top:3px;
}
	</style>
</head>

<?php

require_once 'twitter-php/twitter.class.php';

//Twitter OAuth Settings, enter your settings here:
$CONSUMER_KEY = '...';
$CONSUMER_SECRET = '...';
$ACCESS_TOKEN = '...';
$ACCESS_TOKEN_SECRET = '...';

$twitter = new Twitter($CONSUMER_KEY, $CONSUMER_SECRET, $ACCESS_TOKEN, $ACCESS_TOKEN_SECRET);

// retrieve data
$q = $_POST['q'];
$count = $_POST['count'];
$api = $_POST['api'];

// api data
$params = array(
	'screen_name' => $q,
	'q' => $q,
	'count' => 20,
  'includes_rts' => true
);

$results = $twitter->request($api, 'GET', $params);

// output as JSON
echo json_encode($results);
?>

<body>
	
	<div id="jstwitter">
	</div>
	
</body>
</html>