<?php
require "accesseur/UtilisateurDAO.php";
header('Content-type: application/xml');
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
$erreurs= array();
$valides= array();

$pseudoRequete = $_REQUEST['pseudo'];
if($pseudoRequete != ""){
	$utilisateurRecupere = UtilisateurDAO::recupUtilisateurParPseudo($pseudoRequete);
	if($utilisateurRecupere != "utilisateur non existant"){
		$erreurs[]= "Le pseudo existe déjà";
	}
	else{
		$valides[]= "Le pseudo est disponible";
	}

}

$courrielRequete = $_REQUEST['courriel'];
if($courrielRequete != ""){
	$courrielRecupere = UtilisateurDAO::testCourrielExistant($courrielRequete);
	if($courrielRecupere != "courriel non existant"){
		$erreurs[]= "Le courriel existe déjà";
	}
	else{
		$valides[]= "Le courriel est disponible";
	}

}

?>
<verification>
	<erreurs>
	<?php

		foreach($erreurs as $erreur)
		{
			?>
			<erreur><?=$erreur?></erreur>
			<?php
		}
		
	?>
	</erreurs>
	<valides>
	<?php

		foreach($valides as $valide)
		{
			?>
			<valide><?=$valide?></valide>
			<?php
		}
	?>
	</valides>
</verification>