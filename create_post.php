<!--form for adding new post to blog, sends info to add_post.php -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="copyright" content="">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="noindex, nofollow" />
<head>
<style>
body
{
	margin-top:80px;
}
</style>
</body>
<?php
require("connection.php");
require("header.php");
$user = $_SESSION["user"];
date_default_timezone_set('America/New_York');
?>

<form action="add_post.php" method="POST" enctype="multipart/form-data">
Post Title: <br> <!--sets title for post -->
<input type="text" id="title" name="postTitle" value="adsads"><br>
<br>
Post Image Upload:<br> <!--sets header image-->
<input required id = "file" type="file" NAME="file"><br>
<br>
Post Content:<br> <!-- sets post content -->
<input name = "file" id="fileInput" type="file" style="display:none;" form = "uploadImage"/>
<input type="button" value="Choose Files!" onclick="document.getElementById('fileInput').click();" />
	<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a  id = "text_label" role="tab" data-toggle="tab" aria-expanded="true">Text</a></li>
							<li role="presentation" class="active"><a  id = "preview_label" role="tab" data-toggle="tab" aria-expanded="true">Preview</a></li>
						</ul>
<textarea id = "text" name="postContent" style=" width:600px; height:300px;"></textarea>
<div id='fake_textarea' name = 'fake_textarea' contenteditable = "true" style="display: none;"></div>
<br>
Tag Post *Seperated by commas*<br> <!-- sets tags for post -->
<textarea placeholder="Type your tags here"rows="1" id="tags" cols="50" name="postTags"></textarea><br><br>

<?php
$timestamp = time(); //creates time variable
$mysqldate = date( 'm/d/y', $timestamp ); //sets date timestamp
$mysqltime = date( 'H:i:s', $timestamp ); //sets time timestamp
$sidebarMonth= date('m', $timestamp); //sets month for sorting purposes
$sidebarYear= date('y', $timestamp); //sets year for sorting purposes
?>
<!--These hidden inputs send PHP variables through html forms -->
<input type='hidden' name='postDate' value=<?php echo $mysqldate;?>> 
<input type='hidden' name='postTime' value=<?php echo $mysqltime;?>> 
<input type='hidden' name='username' value=<?php echo $user;?>> 
<input type='hidden' name='sidebarMonth' value=<?php echo $sidebarMonth;?>> 
<input type='hidden' name='sidebarYear' value=<?php echo $sidebarYear;?>> 

<input class="store-btn" type="submit" value="Submit Post">
</form>

		<form id = "uploadImage" action = "<?php
			  $name = '';
				$tmp_name ='';
			  if (isset($_FILES["file"]["name"])) {
			      $name = $_FILES["file"]["name"];
			      $tmp_name = $_FILES['file']['tmp_name'];
			      $error = $_FILES['file']['error'];
			      if (!empty($name)) {
			          $location = 'C:\xampp\htdocs\political_mailing\images/';
			          move_uploaded_file($tmp_name, $location.$name);
			      } else {
			          echo 'please choose a file';
			      }
			  }

			?>" method = "POST" enctype="multipart/form-data">
			</form>


<?php
require("footer.php");
?>

<link rel="stylesheet" href="css/likeaboss.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="likeaboss.js" type="text/javascript"></script>
<script type="text/javascript" src="micromarkdown.js"></script>
<script>
	$(document).ready(function(){
		$("#title").val(localStorage.getItem("title_val"));
		$("#tags").val(localStorage.getItem("description_val"));
		$("#text").val(localStorage.getItem("textarea_val"));
		$("textarea").likeaboss();
		var textarea = $('#text');
		var preview = $('#fake_textarea');

		$('#preview_label').on('click', function(){
			var input = textarea.val();
			preview.html(micromarkdown.parse(input));
			preview.show();
			textarea.hide();
		});

		$('#text_label').on('click', function(){
			console.log(localStorage.getItem("title_val"));
			preview.hide();
			textarea.show();
		});

		$( "#fileInput" ).change(function() {
			nameoffile = $(this).val().replace(/^.*\\/, "");
			console.log(nameoffile);
			var imageURL = "![An Image](/political_mailing/images/"+nameoffile+")";
			textarea.val(textarea.val() +"\n"+ imageURL);

			localStorage.setItem("textarea_val", $('#text').val());
			localStorage.setItem("title_val", $('#title').val());
			localStorage.setItem("description_val",$('#tags').val());

			document.getElementById("uploadImage").submit(function () {
					return false;
			});
		});

		$('.store-btn').on('click', function(){
			localStorage.removeItem("textarea_val");
			localStorage.removeItem("title_val");
			localStorage.removeItem("description_val");

		});

	});
</script>

