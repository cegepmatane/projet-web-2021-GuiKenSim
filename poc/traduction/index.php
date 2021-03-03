<?php
/*
$locale = "en_CA.UTF-8"; 

$racine = "./locale";
$domaine = "messages";

putenv('LC_ALL='.$locale);
setlocale(LC_ALL, $locale);

bindtextdomain($domaine, $racine);
textdomain($domaine);*/
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title> <?= gettext("Boutique du Cégep de Matane")?> </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./decoration/accueil.css">
</head>

<body class="page_accueil">

	<?php include 'menu.php'; ?>

  	<div class="accueil">
  		<h1 class="titre_accueil"> <?= gettext("Bienvenue sur la boutique en ligne du Cégep de Matane ! Cliquez sur MAGASINER pour commencer. ") ?> </h1>
  		<a href="magasiner.php" class="bouton_magasiner"> <?= gettext("MAGASINER")?> </a>
	  		<div class="lien_apropos">
	  			<a href="apropos.php"> <?= gettext("À Propos de nous")?> </a>
	  		</div> 		
  	</div> 

  <?php include 'footer.php'; ?>
  	
</body>
</html>








