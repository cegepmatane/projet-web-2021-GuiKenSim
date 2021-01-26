<?php
require "./accesseur/ProduitDAO.php";
$produit = ProduitDAO::listerProduitParId(5);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title> Boutique du Cégep de Matane </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./Decoration/detaillerProduit.css">
</head>
<body>

	<?php include "menu.php"?>

  	<div class="contenu">
		<div class="contenu-image">
			<img src="https://place-hold.it/300x500" alt="#">
		</div>
		<div class="contenu-detailler">
			<h1><?=$produit["titre"];?></h1>
			<h3>Descriptif du produit</h3>
			<p><?=$produit["description"];?></p>
			<span>Prix : <?=$produit["prix"];?>$</span>
			<button class="bouton-acheter-produit">Acheter le produit</button>
		</div>
  	</div> 

</body>
</html>