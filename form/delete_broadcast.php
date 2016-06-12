<?php

	if(isset($_GET['id'])) {
		include_once('../mysql.php');

		$response = $bdd->query('SELECT * FROM broad_episode WHERE id='.$_GET['id']);

		while($donnees = $response->fetch()) {
			$episode = $donnees;
		}
		$response->closeCursor();
?>
<h3 style="text-align: center;">Supprimer un broadcast</h3><br><br>
<div class="form">
	<input type="hidden" name="id" id="iddel" value="<?= $episode['id'] ?>" />
	<button id="sendFormD" class="delete">Supprimer vraiment L'émission <?= $episode['titre'] ?></button>

	<div id="resultat">
	</div>
</div>


<script>
	$("#sendFormD").click(function() {
		$.post("/form/treatment_delete_broadcast.php", {id: $("#iddel").val() }, function(data) {
			if(data == 'ok') {
				$("#content").hide(1000, function() {
					$("#content").html('<div style="text-align: center">L\'émission <?= $episode["titre"] ?> a bien été supprimée sur la base de données.<br>Choississez une nouvelle action.<br></div>');
				});
				$("#content").show(1000);
			}
			else {
				$("#resultat").html('<br><br>Il y a eu une erreur lors de l\'envoi des données.');
				console.log(data);
			}
		});
	});
</script>
<?php
	}

?>

