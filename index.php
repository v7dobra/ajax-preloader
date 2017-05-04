<!DOCTYPE html> <!-- 1. сделать прелоудер на весь екран по центру, сделать прелоудер на кнопке, подгрузка контента должна біть через тег button
2. использовать вместо функции $.ajax функцию $.POST, $.LOAD
3. подгрузить контент страници через ajax в формате html or json-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="style.css" >
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<script>
		function funcBefor() {
			$("#information").text("waiting data");
		}
		function funcSuccess(data) {
			//	$("#information").text(data);

		}

		$(document).ready(function () {
			$("#load").bind("click", function () {
				var admin = "Admin";
				$.ajax({
					url: "content.php",
					type: "POST",
					data: ({name: admin, number: 5}),
					dataType: "json",
					beforeSend: funcBefor,
					success: funcSuccess,
					complete: function (jqXHR, textStatus) {
						console.log(jqXHR);
						console.log(textStatus);
						if (textStatus === 'success' || textStatus === 'notmodified') {
							var data = $.parseJSON(jqXHR.responseText);
							//$("<li class='item'>Тест</li>").insertBefore($("#information"));
							$("<li class='item'>Тест</li>").insertAfter($("#information"));
//							$.('<h2 class="igor-sget">' + data.username + ' ' + data.pass + '</h2>').insertBefore( $("") );

						}
					}
				});
			});

		});


	</script>
</head>
<body>










<button id="load">Load</button>
<div id="wrapper">

	<!--	<div id="information" class="loader">
			<div class="loader-inner">
				<div class="loader-line-wrap">
					<div class="loader-line"></div>
				</div>
				<div class="loader-line-wrap">
					<div class="loader-line"></div>
				</div>
				<div class="loader-line-wrap">
					<div class="loader-line"></div>
				</div>
				<div class="loader-line-wrap">
					<div class="loader-line"></div>
				</div>
				<div class="loader-line-wrap">
					<div class="loader-line"></div>
				</div>
			</div>
		</div>

-->

	</div>



</body>
</html>