<?php
    require "./UtilisateurDAO.php";
    require "../modele/Utilisateur.php";    
        
        $pseudo = $_REQUEST['pseudo'];
        $email = $_REQUEST['email'];
        $motdepasse = $_REQUEST['motdepasse'];

        if(empty($pseudo)==true || empty($email)==true ||empty($motdepasse)==true) {
            $erreurs[]="Un des champs obligatoire est vide !";
        }
        if (strpos($prix, '$') !== false) {
            $erreurs[]="Le prix ne doit pas contenir de signe";
        }
        if(!is_string($nom)){
            $erreurs[]="Le nom doit être du texte !";
        }
        if(!is_string($description)){
            $erreurs[]="La description doit être du texte !";
        }
        if(is_link($description) || is_link($nom) || is_link($prix)){
            $erreurs[]="Il ne faut pas mettre de liens dans les champs";
        }
        if(empty($erreurs)==true) {
            
            if(UtilisateurDAO::ajouterUtilisateur($pseudo,$email,$motdepasseCrypte)){
                $succes_ajout = "succès";
            }else{
                $succes_ajout = "erreur : problème avec la base de données";
            }
            
        }else{
            $succes_ajout = "erreur durant l'ajout ".$erreurs[0];
        }


?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title> Boutique du Cégep de Matane </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../Decoration/ajouter.css">
</head>

<body class="body">

  <div class="div_produit_ajouter">
    <h1> Ajout du produit : <?=$succes_ajout?> </h1>
    <a href="../administration/administration-accueil.php"> Retour </a>
  </div>   	
</body>
</html>