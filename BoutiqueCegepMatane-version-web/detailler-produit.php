<?php
require "configuration.php";
require "accesseur/ProduitDAO.php";
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
			<img src="./ressources/images/<?=$produit->getImage();?>" alt="image-produit">
		</div>
		<div class="contenu-detailler">
			<h1><?=$produit->getTitre();?></h1>
			<h3>Descriptif du produit</h3>
			<p><?=$produit->getDescription();?></p>
			<span>Prix : <?=$produit->getPrix();?>$</span>
			<form class="acheter-produit" action="paiement.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="titre" value="<?=$produit->getTitre();?>" />
                <input type="hidden" name="prix" value="<?=$produit->getPrix();?>" />
                <?php                      

                          if(!empty($_SESSION['utilisateur'])){
                            echo "<input type=\"submit\" value=\"Acheter\">";                    
                              }                          
                          ?> 
            </form>
		</div>
  	</div> 

</body>
</html>