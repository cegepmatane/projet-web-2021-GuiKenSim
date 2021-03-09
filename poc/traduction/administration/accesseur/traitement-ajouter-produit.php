<?php
    require "ProduitDAO.php";

    if(isset($_FILES['fichierImage'])){
        
        $nom_image = $_FILES['fichierImage']['name'];
        $file_size = $_FILES['fichierImage']['size'];
        $file_tmp = $_FILES['fichierImage']['tmp_name'];
        $file_type = $_FILES['fichierImage']['type'];
        $file_ext = strtolower(pathinfo("../ressources/images/".$nom_image,PATHINFO_EXTENSION));
        
        $erreurs= array();
        $succes_ajout = "erreur durant l'ajout";
        $extensions= array("jpeg","jpg","png");
        
        $nom = $_REQUEST['nom'];
        $prix = $_REQUEST['prix'];
        $description = $_REQUEST['description'];
        
        if(in_array($file_ext,$extensions)=== false){
            $erreurs[]="Extension de fichier non autorisée, veuillez upload une image en jpg,jpeg ou png.";
        }
        if($file_size > 2097152) {
            $erreurs[]="Limage ne doit pas faire plus de 2MB";
        }
        if(empty($nom)==true || empty($prix)==true ||empty($description)==true) {
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
            $nom_image = $nom.".".$file_ext;
            
           
            
            if(ProduitDAO::ajouterProduit($nom,$description,$prix,$nom_image)){
                move_uploaded_file($file_tmp,"../../ressources/images/".$nom_image);
                $succes_ajout = "succès";
            }else{
                $succes_ajout = "erreur : problème avec la base de données";
            }
            
        }else{
            $succes_ajout = "erreur durant l'ajout ".$erreurs[0];
        }
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title> Boutique du Cégep de Matane </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../decoration/ajouter.css">
</head>

<body class="body">

  <div class="div_produit_ajouter">
    <h1> Ajout du produit : <?=$succes_ajout?> </h1>
    <a href="../administration-accueil.php"> Retour </a>
  </div>   	
</body>
</html>