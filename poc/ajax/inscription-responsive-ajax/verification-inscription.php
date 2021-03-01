<?php
require "accesseur/UtilisateurDAO.php";
$pseudoRequete = $_POST['pseudo'];
$utilisateurRecupere = UtilisateurDAO::recupUtilisateurParPseudo($pseudoRequete);
header('Content-type: application/xml');
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
$erreurs= array();
?>
<produits>
<?php
    
	if($utilisateurRecupere != "utilisateur non existant"){
		$erreurs[]= "Le pseudo existe déjà";
	}

		?>
	<produit>
	    <id><?=$produit->id?></id>
        <image><?=$produit->image;?></image>
	    <titre><?=$produit->titre?></titre>
        <prix><?=$produit->prix?></prix>
	</produit>
</produits>