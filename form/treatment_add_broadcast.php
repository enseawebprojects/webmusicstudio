<?php
	if(isset($_POST['emission']) && isset($_POST['titre'])){

		include_once("../mysql.php");

		extract($_POST);

		if(isset($_FILES['mp3'])) {
			$dossier = 'musique';
			$fichier = basename($_FILES['mp3']['name']);
			if(!move_uploaded_file($_FILES['mp3']['tmp_name'], $dossier.$fichier))
				echo 'Echec de l\'upload 2';
		}

		$req = $bdd->prepare('INSERT INTO broad_episode(id_emission, titre, date, dateOrb, time, chroniqueur, description) VALUES(:id_emission, :titre, :date, :dateOrb, :time, :chroniqueur, :description)');
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
