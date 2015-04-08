<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Post</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/post.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$.get('/main/index_html', function(res) {
				$('#posts').html(res);
			});

			$('form').submit(function(){

				$.post('/main/create', $(this).serialize(), function(res){

					$("#posts").html(res);
				});

				return false;
			});
		});

	</script>
</head>
<body>
	<div class="container">
		<h2>My Posts:</h2>
		<div id="posts">
			
		</div>
		<form action="/main/create" method="post">
			<label>Add a note:</label>
			<textarea name="post"></textarea>
			<input type="submit" value="Post it!">
		</form>
	</div>
</body>
</html>