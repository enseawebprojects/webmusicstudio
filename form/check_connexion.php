<?php
	function check_connexion($bdd) {
		// On récupère tout le contenu de la table
		$reponse = $bdd->query('SELECT * FROM connexion');
		while ($donnees = $reponse->fetch())
		{
			$login = $donnees['login'];
			$pwd = $donnees['pwd'];
			if(isset($_COOKIE['m_login']) && $_COOKIE['m_login'] == $login && $_COOKIE['m_pwd'] == $pwd && $donnees['rights'] == $_COOKIE['m_rights'])
			{
				return true;
			}
		}
		$reponse->closeCursor(); // Termine le traitement de la requête
		return false;
	}
?>
