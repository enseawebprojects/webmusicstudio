<div style="text-align: center;">
<?php

	include_once("../mysql.php");

	$response = $bdd->query('SELECT * FROM broad_episode ORDER BY date ASC');

	while ($donnees = $response->fetch()) {
		echo $donnees['titre'].'<br>';
	}
	$response->closeCursor();

?>
</div>
