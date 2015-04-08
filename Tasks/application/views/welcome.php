<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>To do List!</title>
	<link rel="stylesheet" type="text/css" href="">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			function update_page(res) 
			{
				var html_str = "";
				
				for (var i = 0; i < res.length; i++) {

					var id = res[i]['id'];
					console.log(res[i]['task']);
					var checkbox = '';
					var styling = "";

					if (res[i]['state'] == "Done") {
						checkbox = 'checked disabled';
						styling = "style = text-decoration:line-through";
					};

					html_str += "<form action='/main/form_process/' method='post' id = " + res[i]['id']+" class='task'>";
					html_str += "<button type='button' class = 'edit_button'> Edit </button>";
					html_str += "<input type='checkbox' name='task'" + checkbox 
								+ " class = 'check_box'> <span class = 'edit' " + styling +
								" >" + res[i]['task'] + "</span>";
					html_str += "<input type='hidden' name='id' value = " + res[i]['id'] + ">";
					html_str += "</form>";
					html_str += "<br>";
				};

				$('#tasks').html(html_str);
			};

			$.get('/main/index_json', update_page, 'json');

			$('#tasks').on('click','.check_box', function(){

				/*console.log($(this).prop('checked'));
				console.log($(this).parent());*/
				if($(this).prop('checked')) {

					$(this).next().css('text-decoration', 'line-through');
					$(this).prop('disabled', true);

					$(this).parent().submit();
				} 
				else 
				{
					$(this).next().css('text-decoration', 'none');
				}

			});

			$('#tasks').on('submit','.task' ,function(){
				$.post('/main/form_process', $(this).serialize(),update_page,'json');
				return false;
			});

			$('#create').submit(function(){
				$.post("/main/create", $(this).serialize(), update_page, 'json');

				return false;
			});

			$('#tasks').on('click', 'button', function(){

				var task = $(this).siblings('.edit').html();

				html_str = "<input type = text name = edit_task value = '" + task + "'>";
				$(this).siblings('.edit').html(html_str);
			});
		});
	</script>
</head>
<body>
	<div class='container'>
		<div>
			<h2>List of Tasks</h2>
			<div id="tasks">
				
			</div>
		</div>
		<div>
			<h2>Add a new task</h2>
			<form action="/main/create" method="post" id="create">
				<input type="text" name="task" >
				<input type="submit" value = "Create">
			</form>
		</div>
	</div>
</body>
</html>