<div style="text-align: center;">
<?php

	include_once("../mysql.php");

	$response = $bdd->query('SELECT * FROM broad_episode ORDER BY date ASC');

	while ($donnees = $response->fetch()) {
		echo $donnees['titre'].'<br><br>
		<button class="modify" onclick="changePage(\'/form/modify_broadcast.php?id='.$donnees['id'].'\')">Modifier</button> <button class="delete" onclick="changePage(\'/form/delete_broadcast.php?id='.$donnees['id'].'\');">Supprimer</button><br><br>';
	}
	$response->closeCursor();

?>
</div>
