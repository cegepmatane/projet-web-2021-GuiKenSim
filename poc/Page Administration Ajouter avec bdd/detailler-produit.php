<?php
require "./accesseur/ProduitDAO.php";
$id = filter_input(INPUT_GET, 'id' , FILTER_VALIDATE_INT);
$produit = ProduitDAO::listerProduitParId($id);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title> Boutique du Cégep de Matane </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./decoration/detailler-produit.css">
</head>
<body>

	<?php include "menu.php"?>

  	<div class="contenu">
		<div class="contenu-image">
			<img src="./Ressources/images/<?=$produit["image"];?>" alt="image-produit">
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