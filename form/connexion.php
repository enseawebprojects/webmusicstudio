<?php

	if(isset($_POST['login']) && isset($_POST['pwd'])) {
		include_once('../mysql.php');
		extract($_POST);

		// On récupère tout le contenu de la table connexion
		$response = $bdd->query('SELECT * FROM connexion');
		foreach($_COOKIE as $cle => $element) {
			setcookie($cle, '', time() - 3600, '/');
		}
		$badlogin=false;
		while ($donnees = $response->fetch()) {
			if($login == $donnees['login'] && $pwd == $donnees['pwd']) {
				setcookie("m_login", $login, time() + 30*24*3600, '/');
				setcookie("m_pwd", $pwd, time() + 30*24*3600, '/');
				setcookie("m_rights", $donnees['rights'], time() + 30*24*3600, '/');
				echo "Success";
				$badlogin = true;
				break;
			}
		}
		$response->closeCursor(); //Termine le traitement de la requête
		if(!$badlogin)
			echo "Erreur, il y a eu un problème lors de la connexion, vérifiez vos informations ou contactez un administrateur";
	}

?>
