<!DOCTYPE html>
<html>
	<head>
		<title>Web Music Studio</title>
		<link rel="stylesheet" type="text/css" href="theme.css">
	</head>
	<body>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<header>
			<h1>WEB MUSIC STUDIO</h1>
		</header>

		<section>
			<?php include_once('/mysql.php'); ?>
			<div id="formConnexion">
				Login :<br>
				<input type="text" name="login" id="login" ><br><br>
				Mot De Passe :<br>
				<input type="password" name="pwd" id="pwd" ><br><br><br>
				<button id="sendConnexion">Se Connecter</button><br>
			</div>
			<div id="resultat">
			</div>
		</section>

		<footer>
			Ce site a été créé par Tony SCHMITT.
		</footer>

		<script>

			$(document).ready(function() {
				$("#sendConnexion").click(function() {
					var datastring = "login="+$("#login").val()+"&pwd="+$("#pwd").val();
					$.ajax({
						type: "POST",
						url: "form/connexion.php",
						data: datastring,
						cache: false,
						success: function(html) {
							if(html == "Success")
								redirect();
							else
								$("#resultat").html(html);
						}
					});
				});
			});

			function redirect() {
				$("#resultat").html("<meta http-equiv='refresh' content='0;/accueil.php'>");
			}

		</script>
	</body>
</html>
