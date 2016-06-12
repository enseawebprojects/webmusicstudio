<?php
	if(isset($_POST['emission']) && isset($_POST['titre'])){

		include_once("../mysql.php");

		extract($_POST);

		$req = $bdd->prepare('UPDATE broad_episode SET id_emission = :id_emission, titre = :titre, date = :date, dateOrb = :dateOrb, time = :time, chroniqueur = :chroniqueur, description = :description WHERE id='.$id);
		if($req->execute(array(
			'id_emission' => $emission,
			'titre' => $titre,
			'date' => $date,
			'dateOrb' => $dateOrb,
			'time' => $time,
			'chroniqueur' => $chroniqueur,
			'description' => $description)))
			echo 'ok';
		else
			echo 'false';
	}  else {
		echo 'false';
	}
?>
