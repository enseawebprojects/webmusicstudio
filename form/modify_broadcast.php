<?php

	if(isset($_GET['id'])) {
		include_once('../mysql.php');

		$response = $bdd->query('SELECT * FROM broad_episode WHERE id='.$_GET['id']);

		while($donnees = $response->fetch()) {
			$episode = $donnees;
		}
		$response->closeCursor();
?>
<h3 style="text-align: center;">Modifier un broadcast</h3><br><br>
<div class="form">
	<input type="hidden" name="id" id="id" value="<?= $episode['id'] ?>" />
	<table style="max-width: 100%; width: 800px; margin: auto;">
		<tr>
			<td style="text-align: right; width: 48%;">Emission : </td>
			<td style="text-align: left;"><input type="title" name="emission" id="emission" value="<?= $episode['id_emission'] ?>"/></td>
		</tr>
		<tr>
			<td style="text-align: right;">Titre de l'émission : </td>
			<td style="text-align: left;"><input type="title" name="titre" id="titre" style="width: 300px;" value="<?= $episode['titre'] ?>"/></td>
		</tr>
		<tr>
			<td style="text-align: right;">Date de sortie : </td>
			<td style="text-align: left;"><input type="date" name="date" id="date" value="<?= $episode['date'] ?>"/></td>
		</tr>
                <tr>
                        <td style="text-align: right;">Date de sortie en podcast : </td>
                        <td style="text-align: left;"><input type="date" name="dateOrb" id="dateOrb" value="<?= $episode['dateOrb'] ?>"/></td>
                </tr>
                <tr>
                        <td style="text-align: right;">Durée : </td>
                        <td style="text-align: left;"><input type="title" name="time" id="time" value="<?= $episode['time'] ?>"/></td>
                </tr>
                <tr>
                        <td style="text-align: right;">Chroniqueurs : </td>
                        <td style="text-align: left;"><input type="title" name="chroniqueur" id="chroniqueur" style="width: 300px;" value="<?= $episode['chroniqueur'] ?>"/></td>
                </tr>
		<tr>
			<td style="text-align: right; vertical-align: top;">Description : </td>
			<td style="text-align: left;"><textarea name="description" id="description" cols="50" rows="10"><?= $episode['description'] ?></textarea></td>
		</tr>
		<tr>
			<td style="text-align: right; vertical-align: top;">Upload du fichier : </td>
			<td style="text-align: left;">
			<input type="file" id="fileupload" name="files[]" data-url="server/php" multiple>
			</td>
		</tr>
	</table>

	<button id="sendForm">Modifier L'émission</button>

	<div id="resultat">
	</div>
</div>


<script>
	$("#sendForm").click(function() {
        	$.post("/form/treatment_modify_broadcast.php", {id: $("#id").val(), emission: $("#emission").val(), titre: $("#titre").val(), date: $("#date").val(), dateOrb: $("#dateOrb").val(),
		time: $("#time").val(), chroniqueur: $("#chroniqueur").val(), description: $("#description").val() }, function(data) {
			if(data == 'ok') {
				$("#content").hide(1000, function() {
					$("#content").html('<div style="text-align: center">L\'émission '+$("#titre").val()+' a été modifiée sur la base de données.<br>Choississez une nouvelle action.<br></div>');
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

