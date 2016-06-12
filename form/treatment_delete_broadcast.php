<?php
	if(isset($_POST['id'])){

		include_once("../mysql.php");

		extract($_POST);

		$bdd->exec('DELETE FROM broad_episode WHERE id='.$id);
		echo 'ok';
	}  else {
		echo 'false';
	}
?>
