<?php
require "accesseur/UtilisateurDAO.php";
$pseudoRequete = $_REQUEST['pseudo'];
$courrielRequete = $_REQUEST['courriel'];
$utilisateurRecupere = UtilisateurDAO::recupUtilisateurParPseudo($pseudoRequete);
$courrielRecupere = UtilisateurDAO::testCourrielExistant($courrielRequete);
header('Content-type: application/xml');
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
$erreurs= array();
?>
<erreurs>
<?php
    
	if($utilisateurRecupere != "utilisateur non existant"){
		$erreurs[]= "Le pseudo existe déjà";
	}
	if($courrielRecupere != "courriel non existant"){
		$erreurs[]= "Le courriel existe déjà";
	}

	foreach($erreurs as $erreur)
	{
		?>
		<erreur><?=$erreur?></erreur>
		<?php
	}
?>
</erreurs>