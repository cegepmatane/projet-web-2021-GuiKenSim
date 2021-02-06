<?php
require "../accesseur/ProduitDAO.php";
$id = filter_input(INPUT_GET, 'id' , FILTER_VALIDATE_INT);
$produit = ProduitDAO::listerProduitParId($id);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title> Boutique du Cégep de Matane </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./decoration/modifier-produit.css">
</head>
<body>

	<?php include "menu-administration.php"?>

  	<div class="contenu">
		<div class="contenu-image">
			<img src="../Ressources/images/<?=$produit["image"];?>" alt="logo-item" >
		</div>
		<div class="contenu-detailler">
		<h1>Modifier Un Produit : </h1>
		<form class="produit-formulaire" action="../accesseur/traitement-modifier-produit.php" method="POST" enctype="multipart/form-data">
			<div class="champ">
				<div class="label-contenant">
					<label class="label">Titre</label>
				</div>
				<div class="input-contenant">
					<input class="input" type="text" name="titre" value="<?=$produit["titre"]?>"/>
				</div>
			</div>
			<div class="champ">
				<div class="label-contenant">
					<label class="label">Prix</label>
				</div>
				<div class="input-contenant">
					<input class="input" type="text" name="prix" value="<?=$produit["prix"]?>"/>
				</div>
			</div>
			<div class="champ">
				<div class="label-contenant-description">
					<label class="label">Description</label>
				</div>
				<div class="input-contenant-description">
					<textarea class="textarea-description" name="description"> <?=$produit["description"]?> </textarea>
				</div>
			</div>
			<div class="champ">
				<div class="label-contenant"> 
					<label class="label" for="image">Image</label>
				</div>
				<div class="input-contenant">
					<input class="input" type="file" id="image" name="image"/>
				</div>
			</div>
			<div class="champ">
				<input type="hidden" name="id" value=<?=$id?> />
				<input type="hidden" name="image" value=<?=$produit["image"];?> />
				<input type="submit" value="Modifier"/>
			</div>
		</form>
		</div>
  	</div> 

</body>
</html>