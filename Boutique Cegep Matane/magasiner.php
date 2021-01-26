<?php
require "./accesseur/ProduitDAO.php";
$listeProduits = ProduitDAO::listerProduits();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title> Boutique du Cégep de Matane </title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./Decoration/magasiner.css">
</head>
<body>
	<?php include 'menu.php' ?>

  	<div class="magasiner_titre">
  		<h1> Liste des items à vendre </h1>

  	</div> 
  	<ul class="magasiner_items_a_vendre">
  	<?php

            foreach($listeProduits as $produit)
            {        
                ?>
                    <li>
                        <div>
                            <a href="detaillerProduit.php?id=<?=$produit->id;?>" title = "appuyez pour le détail">
                                <img src=<?=$produit->image;?> alt="logo-item">
                            </a>
                        </div>
                        
                        <h3 class="titre"><?=$produit->titre;?></h3>
                        <span>n° article : <?=$produit->id;?> | Prix : <?=$produit->prix;?>$</span>
                        <button>Acheter</button>
                    </li>

                <?php
            }
        ?>
    </ul>

  <?php include 'footer.php' ?>

</body>
</html>








