
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="copyright" content="">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="robots" content="noindex, nofollow" />
<style>
body
{
	margin-top:80px;
}
</style>
<?php
require("connection.php");
require("header.php");
$id = $_GET['id'];
$sql = "select * from blog_posts where id = $id";
date_default_timezone_set('America/New_York');
$result = mysqli_query($conn, $sql);

if ($result){
    $row = mysqli_fetch_row($result);
    $title = $row[2];
    $content = $row[3];
	$tags = $row[12];
	$img = $row[1];
	
    }
$timestamp = time();
$mysqldate = date( 'm/d/y', $timestamp );
$mysqltime = date( 'H:i:s', $timestamp );
$user = $_SESSION["user"];
?>

<form action="update_post.php" method="POST">
Change Title: <br>
<input name="postTitle" type="text" value="<?php echo $title; ?>"><br>
Post Content:<br>
<input name = "file" id="fileInput" type="file" style="display:none;" form = "uploadImage"/>
<input type="button" value="Choose Files!" onclick="document.getElementById('fileInput').click();" />
	<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a  id = "text_label" role="tab" data-toggle="tab" aria-expanded="true">Text</a></li>
							<li role="presentation" class="active"><a  id = "preview_label" role="tab" data-toggle="tab" aria-expanded="true">Preview</a></li>
						</ul>

<textarea id = "text" name="postContent" style="width:600px; height:300px;" placeholder="<?php echo $content; ?>"><?php echo $content; ?></textarea>
<div id='fake_textarea' name = 'fake_textarea' contenteditable = "true" style="display: none;"></div>
Tag Post *Seperated by commas*<br>
<input " name="tags" type="text" value="<?php echo $tags; ?>"><br>

<input type='hidden' name='id' value=<?php echo $id;?>> 
<input type='hidden' name='editDate' value=<?php echo $mysqldate;?>> 
<input type='hidden' name='editTime' value=<?php echo $mysqltime;?>> 
<input type='hidden' name='editUser' value=<?php echo $user;?>> 

<input class="store-btn" type="submit" value="Update Post">
</form>

<form action ="delete_post.php" method="POST">
<input type='hidden' name='id' value=<?php echo $id;?>>
<input type="submit" value="Delete Post">
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
		

		$("textarea").likeaboss();
		$("#title").val(localStorage.getItem("title_val"));
		$("#tags").val(localStorage.getItem("description_val"));
		$("#text").val(localStorage.getItem("textarea_val"));

		var textarea = $('#text');
		var preview = $('#fake_textarea');

		$('#preview_label').on('click', function(){
			var input = textarea.val();
			preview.html(micromarkdown.parse(input));
			preview.show();
			textarea.hide();
		});

		$('#text_label').on('click', function(){
			console.log(localStorage.getItem("textarea_val"));
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