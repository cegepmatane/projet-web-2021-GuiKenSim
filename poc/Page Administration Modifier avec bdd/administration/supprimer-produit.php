<?php
$id = filter_input(INPUT_GET, 'id' , FILTER_VALIDATE_INT);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title> Boutique du Cégep de Matane </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../Decoration/supprimer.css">
</head>

<body class="body">
	<?php include "menu-administration.php"?>

  <div class="div_produit_supprimer">
    <h1> Produit supprimé ! </h1>
    <a href="administration-accueil.php" class="bouton_retour"> Retour </a>
  </div>   	
</body>
</html>