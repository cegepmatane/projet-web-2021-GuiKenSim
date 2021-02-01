<?php
require "../accesseur/ProduitDAO.php";
$listeProduits = ProduitDAO::listerProduits();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title> Boutique du Cégep de Matane </title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./Decoration/magasiner.css">
</head>
<body>

    <?php include "menu-administration.php"?>

  	<ul class="magasiner-items-a-vendre">
  	<?php
        foreach($listeProduits as $produit)
        {        
        ?>
            <li class="item">
                <div class="image-contenant">
                    <a class="lien-image" href="modifier-produit.php?id=<?=$produit->id;?>" title = "appuyez pour le détail">
                        <img class="image" src="./Ressources/images/<?=$produit->image;?>" alt="logo-item">
                    </a>
                </div>
                
                <h3 class="titre"><?=$produit->titre;?></h3>
                <span class="description">n° article : <?=$produit->id;?> | Prix : <?=$produit->prix;?>$</span>
                <div class="bouton-contenant">
                    <a class="bouton" href="modifier-produit.php?id=<?=$produit->id;?>">Modifier</a>
                    <a class="bouton" href="supprimer-produit.php">Supprimer</a>
                </div>
            </li>
        <?php
        }
    ?>
    </ul>
</body>
</html>








