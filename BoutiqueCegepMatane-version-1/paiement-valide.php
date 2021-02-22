<?php
require_once "./modele/Utilisateur.php";
require_once "./modele/Transaction.php";
require "./accesseur/TransactionDAO.php";
require './lib/fpdf182/fpdf.php';
session_start();
$prix = $_GET['amt'];
$produit = $_GET['item_name'];

$utilisateurCourent = $_SESSION['utilisateur'];

$tableau = array(       
  'utilisateur_id' => $utilisateurCourent->getId(),
  'pseudo_utilisateur' => $utilisateurCourent->getPseudo(),
  'prix' => $prix
);

$transaction = new Transaction($tableau);

TransactionDAO::ajouterTransaction($transaction);

$nomFichierPDF = TransactionDAO::listerDernierNomFactureParId($utilisateurCourent->getPseudo());


$contenuFichierPDFLigne1 = "Bonjour " . $utilisateurCourent->getPseudo() . ", voici le detail de votre achat : ";
$contenuFichierPDFLigne2 = "". $produit . " pour la maudite somme de " . $prix . "CAD";

$destinationOption = 'F';
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10, $contenuFichierPDFLigne1,0,1);
$pdf->Cell(0,10, $contenuFichierPDFLigne2,0,2);
$pdf->SetTitle($nomFichierPDF);
$pdf->Output($destinationOption,'./facture/' . $nomFichierPDF . '.pdf');

$to      = $utilisateurCourent->getCourriel();
$subject = 'Votre facture';
$message = 'Retroouver votre facture sur : http://localhost/BoutiqueCegepMatane-version-1/facture/'. $nomFichierPDF .'.pdf';
$headers = 'From: boutiquecegep@vps-12cf53d3.vps.ovh.ca' . "\r\n" .
'Reply-To: boutiquecegep@vps-12cf53d3.vps.ovh.ca' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
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