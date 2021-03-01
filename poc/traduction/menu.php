<?php 
	$locale = "en_CA";

	$racine = "D:/Xampp/htdocs/poc_traduction/locale";
	$domaine = "messages";

	putenv('LC_ALL='.$locale);
	setlocale(LC_ALL, $locale);

	bindtextdomain($domaine, $racine);
	textdomain($domaine);	
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title><?=_("Boutique du Cégep de Matane")?></title>
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
	         <a href="index.php" class="bouton-menu"><?=_("Accueil")?></a>
	         <a href="magasiner.php" class="bouton-menu"><?=_("Magasiner")?></a>
	         <a href="./administration/administration-accueil.php" class="bouton-menu"><?=_("Administration")?></a>
	         <a href="apropos.php" class="bouton-menu"><?=_("À propos de nous")?></a>
        </div>
  	</header>
</body>