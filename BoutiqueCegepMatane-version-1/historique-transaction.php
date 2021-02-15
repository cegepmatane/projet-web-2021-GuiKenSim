<?php

$tableau = [
    [
    "id" => 1,
    "date" => "15/02/2021",
    "prix" => "223.33$",
    "facture" => "facture_15-02-2021_11_1"
],
    [
    "id" => 2,
    "date" => "15/02/2021",
    "prix" => "223$",
    "facture" => "facture_15-02-2021_11_2"
],
    [
    "id" => 3,
    "date" => "15/02/2021",
    "prix" => "22$",
    "facture" => "facture_15-02-2021_11_3"
],
    [
    "id" => 4,
    "date" => "16/02/2021",
    "prix" => "2$",
    "facture" => "facture_15-02-2021_11_4"
],
    [
    "id" => 5,
    "date" => "23/02/2021",
    "prix" => "22$",
    "facture" => "facture_15-02-2021_11_5"
],
    [
    "id" => 6,
    "date" => "23/02/2021",
    "prix" => "22$",
    "facture" => "facture_15-02-2021_11_6"
],
    [
    "id" => 7,
    "date" => "23/02/2021",
    "prix" => "22$",
    "facture" => "facture_15-02-2021_11_7"
],
    [
    "id" => 8,
    "date" => "23/02/2021",
    "prix" => "22$",
    "facture" => "facture_15-02-2021_11_8"
    ]
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title> Boutique du Cégep de Matane </title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="decoration/historique-transaction.css">
</head>
<body>
	<?php include 'menu.php' ?>

    <div class="contenu-page-transaction">
        <div class="contenu-titre">
            <h1>Mon Historique de transaction</h1>
        </div>
        <div class="contenu-tableau">
            <h2>Mes Achats</h2>
            <table class="tableau">
                <tr class="titre-colonne">
                    <th>Numéro de Commande</th>
                    <th>Date de transaction</th>
                    <th>Prix</th>
                    <th>Facture</th>
                </tr>

            <?php
            foreach($tableau as $transaction)
            {    
            ?>
                <tr>
                    <td><?=$transaction["id"]?></td>
                    <td><?=$transaction["date"]?></td>
                    <td><?=$transaction["prix"]?></td>
                    <td><a href="#"><?=$transaction["facture"]?></a></td>
                </tr> 
                <?php
                }
                ?>
            </table>
        </div>
        
    </div>
    
    <?php include 'footer.php' ?>

</body>
</html>