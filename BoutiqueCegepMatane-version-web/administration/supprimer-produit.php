<?php
require "../accesseur/ProduitDAO.php";
$id = filter_input(INPUT_GET, 'id' , FILTER_VALIDATE_INT);
$produit = ProduitDAO::listerProduitParId($id);
//print_r($produit->getId());
ProduitDAO::supprimerProduit($produit->getId());
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title> Boutique du Cégep de Matane </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./decoration/supprimer.css">
</head>

<body class="body">
	<?php include "menu-administration.php"?>

  <div class="div_produit_supprimer">
    <h1> Produit supprimé ! </h1>
    <a href="administration-accueil.php"> Retour </a>
  </div>   	
</body>
</html>