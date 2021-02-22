<?php
	print_r($_GET['amt']);
	print_r($_GET['item_name']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title> Boutique du Cégep de Matane </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./decoration/paiement.css">
</head>

<body class="body-page-succes-comande">
	<?php include "menu.php"?>

  <div class="succes-commande">
    <h1> Commande validé avec succès ! </h1>
    <a class="bouton-retour" href="index.php"> Retour </a>
  </div> 

  <?php include "footer.php"?>

</body>
</html>