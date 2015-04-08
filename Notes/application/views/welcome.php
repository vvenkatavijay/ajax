<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Notes</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/notes.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {

			function update_page(res) {
				console.log(res);

				var html_string = '';

				for (var i = 0; i < res.length; i++) {

					html_string += "<h2>" + res[i]['heading'] + '</h2>';
					html_string += "<a href= '#' note =" + res[i]['id'] + "> delete </a>";
					html_string += "";
					html_string += "<form action = /main/edit_description/" + res[i]['id']
									+ " method= 'post' class='edit_description' id= " +res[i]['id'] + ">" 
									+ "<textarea name='description' class='description'>"
									+ res[i]['description'] +"</textarea>"
									+ "</form>"; 

				};

				$('#post').html(html_string);
			}

			$.get("/main/index_json", update_page, 'json');

			$('#post').on('keypress', '.edit_description',function(e){
				console.log("Form updated");

				console.log($(this).attr('id'));

				if(e.keyCode == 13) {

					$(this).submit();
				}
			});

			$('#post').on('submit', 'form', function(){

				var ajax_req = 'main/edit_description/' + $(this).attr('id');

				$.post(ajax_req, $(this).serialize(), update_page, 'json');

				return false;
			});

			$('#post').on('click', 'a', function(){
				var id = $(this).attr('note');
				var url = "/main/delete/" + id;
				
				$.post(url, $(this).serialize(), update_page, 'json');

				return false;
			});

			$("#new_post").submit(function(){

				var url = "/main/create";
				$.post(url, $(this).serialize(), update_page, 'json');


				return false;
			});

		});
	</script>
</head>
<body>
	<div class="container">
		<h2>Notes</h2>
		<div id="post">
			
		</div>

		<h2>Add a new note</h2>
		<form action="/main/create" method="post" id="new_post">
			<input type="text" placeholder="Insert Note heading .." name="heading">
			<input type="submit" value="Post">
		</form>
	</div>
</body>
</html>