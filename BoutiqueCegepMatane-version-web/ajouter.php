<!DOCTYPE html>
<html lang="fr">
<head>
	<title> Boutique du Cégep de Matane </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./decoration/ajouter.css">
</head>

<body class="body">
	<?php include 'menu.php' ?>
    <h2 class="titre">Ajouter un produit</h2>
  	<div class="formulaire-box">
            
  		<form class="formulaire">

            <label for="nom" class="nom-champs">Nom </label>
            <input type="text" class="champs" name="nom">
            <label for="prix" class="nom-champs">Prix </label>
            <input type="text" class="champs" name="prix">
            <label for="description" class="nom-champs">Description </label>
            <textarea class="champs" name="description" placeholder="entrez la description"></textarea>
            <label for="monFichier" class="nom-champs">Image </label>
            <input type="file" class="monFichier" name="monFichier">
            <input type="submit" value="Ajouter" class="boutonAjouter">
        
        </form>
        
  	</div> 

  <?php include 'footer.php' ?>
  	
</body>
</html>








