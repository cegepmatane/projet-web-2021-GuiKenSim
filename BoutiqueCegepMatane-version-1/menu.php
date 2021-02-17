<?php
    require_once "./modele/Utilisateur.php";
    session_start();
    if(empty($_SESSION)){
        $bouton_utilisateur ='<a href="connexion.php" class="bouton-menu"> Connexion </a>';
        $bouton_administration ="";
    }
    else{
        $bouton_utilisateur ='<a href="profil.php" class="bouton-menu"> Profil </a>';
        if($_SESSION["utilisateur"]->getPseudo() == "FuZzyy14" || $_SESSION["utilisateur"]->getPseudo() == "guillaume" || $_SESSION["utilisateur"]->getPseudo() == "kenny" ){
            $bouton_administration ='<a href="./administration/administration-accueil.php" class="bouton-menu"> Administration </a>';
        }
        else{
            $bouton_administration ="";
        }
    }
    
    

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title> Boutique du Cégep de Matane </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./Decoration/menu.css">
</head>
<body>
	<header class="menu">
    	<div class="logo-menu">    
	        <a href="index.php"><img src="./Ressources/images/logo_cegep.png" alt="Logo Cégep Matane"/></a>	        
    	</div>
        <div class="menu-navigation">
	         <a href="index.php" class="bouton-menu"> Accueil </a>
	         <a href="magasiner.php" class="bouton-menu"> Magasiner </a>
             <?php echo $bouton_administration?>
	         <a href="apropos.php" class="bouton-menu"> À Propos de nous </a>
             <?php echo $bouton_utilisateur ?>
        </div>
  	</header>
</body>