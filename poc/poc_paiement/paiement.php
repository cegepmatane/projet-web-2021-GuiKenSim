<?php
  require "./accesseur/ProduitDAO.php"; 

  //Récupération des donnnées
  $titre = $_POST['titre'];
  $prix = $_POST['prix'];

  $prixTTC = $prix * 1.15;

  $nomClient = "d'Albignac";
  $prenomClient = "Guillaume";
  $courrielClient = "dalbignacguillaume@gmail.com";
  $adresseClient = "101-602 Avenue St-Rédempteur, Matane, Qc";
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title> Boutique du Cégep de Matane </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./Decoration/paiement.css">
</head>

<body class="page_paiement">
	<?php include 'menu-paiement.php' ?>

	<div class="informations-gloabales">
		<div class="informations-commande">
			<div class="titre-logo">
				<h1 class="titre-commande"> Commande </h1>
				<img class="logo-commande" src="./Ressources/images/logo-caddie.png">
			</div>
			<ul class="liste-commande">
				<li class="element-liste"> Produit :  <?=$titre?> </li>
				<li class="element-liste"> Prix :  <?=$prix?> $ </li>
				<li class="element-liste"> Quantité :  1 </li>
				<li class="element-liste"> ================== </li>
				<li class="element-liste"> Total TTC :  <?=round($prixTTC, 2)?> $ </li>
			</ul>
			<form class="transaction-produit" action="lien vers paypal" method="POST" enctype="multipart/form-data">
            	<input type="submit" value="Payer" class="bouton-payer"> 
            </form>			
		</div>

		<div class="informations-client">
			<div class="titre-logo-client">
				<h1 class="titre-client"> Informations Client </h1>
				<img class="logo-info" src="./Ressources/images/logo-info.png">
			</div>
			<ul class="liste-client">
				<li class="element-liste-client"> Nom :  <?=$nomClient?> </li>
				<li class="element-liste-client"> Prénom :  <?=$prenomClient?> </li>
				<li class="element-liste-client"> Courriel :  <?=$courrielClient?> </li>
				<li class="element-liste-client"> Adresse :  <?=$adresseClient?> </li>
			</ul>			
		</div>
	</div>

	<?php include 'footer.php' ?>
  	
</body>
</html>
