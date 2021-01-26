<?php
require "./accesseur/ProduitDAO.php";
$listeProduits = ProduitDAO::listerProduits();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title> Boutique du Cégep de Matane </title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./decoration/magasiner.css">
</head>
<body>
	<header class="menu">
    	<div class="logo">    
	        <img src="./decoration/logo_cegep.png" alt="Logo Cégep Matane" class="logo" />	        
    	</div>
    	<div class="liens_header">
            <a href="index.php"> Accueil </a>
            
            <a href="magasiner.php"> Magasiner </a>
            
            <a href="administration.php"> Administration </a>
            
            <a href="apropos.php"> À propos </a>
    	</div>
  	</header>

  	<div class="magasiner_titre">
  		<h1> Liste des items à vendre </h1>

  	</div> 
  	<ul class="magasiner_items_a_vendre">
  	<?php
        $compter = 1;
            foreach($listeProduits as $produit)
            {
                
                ?>
                    <li>
                        <div>
                            <a href="article?id=<?=$compter;?>" title = "appuyez pour le détail">
                                <img src=<?=$produit->image;?> alt="logo-item">
                            </a>
                        </div>
                        
                        <h3 class="titre"><?=$produit->titre;?></h3>
                        <span>n° article : <?=$compter;?> | Prix : <?=$produit->prix;?>$</span>
                        <button>Acheter</button>
                    </li>

                <?php
                $compter++;
            }
        ?>
    </ul>
  	<footer class="copyright">
  		<div>
  			<p> © Tous droits réservés - Site développé par Kenny Maréchal, Simon Delarue et Guillaume d'Albignac </p>
  		</div>  		
  	</footer>

</body>
</html>








