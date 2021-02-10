<?php
require "../accesseur/ProduitDAO.php";
//$produit = ProduitDAO::ajouterProduit($titre,$description,$prix,$image);
//../accesseur/upload-images.php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title> Boutique du Cégep de Matane </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./decoration/inscription.css">
</head>

<body class="body">
	<?php include 'menu-administration.php' ?>
    <h2 class="titre">Inscription</h2>
  	<div class="formulaire-box">
            
  		<form class="formulaire" method="post" enctype="multipart/form-data" action= "../accesseur/traitement-ajouter-produit.php">

            <label for="nom" class="nom-champs">Nom </label>
            <input type="text" class="champs" name="nom" required>
            <label for="prix" class="nom-champs">Prix </label>
            <input type="text" class="champs" name="prix" required>
            <label for="description" class="nom-champs" >Description </label>
            <textarea class="champs" name="description" placeholder="entrez la description" required></textarea>
            <label for="monFichier" class="nom-champs">Image </label>
            <input type="file" class="fichierImage" name="fichierImage" required>
            <input type="submit" value="Ajouter" class="boutonAjouter">
        
        </form>
      
        
  	</div> 

  <?php include '../footer.php' ?>
  	
</body>
</html>








