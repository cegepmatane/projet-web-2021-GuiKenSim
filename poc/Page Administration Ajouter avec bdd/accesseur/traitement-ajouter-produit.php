<?php
    if(isset($_FILES['fichierImage'])){
        $erreurs= array();
        $file_name = $_FILES['fichierImage']['name'];
        $file_size = $_FILES['fichierImage']['size'];
        $file_tmp = $_FILES['fichierImage']['tmp_name'];
        $file_type = $_FILES['fichierImage']['type'];
        $file_ext = strtolower(pathinfo("../ressources/images/".$file_name,PATHINFO_EXTENSION));
        $succes_ajout = "erreur durant l'ajout";
        $extensions= array("jpeg","jpg","png");
      
        if(in_array($file_ext,$extensions)=== false){
            $erreurs[]="Extension de fichier non autorisée, veuillez upload une image en jpg,jpeg ou png.";
        }
      
        if($file_size > 2097152) {
            $erreurs[]="Limage ne doit pas faire plus de 2MB";
        }
      
        if(empty($erreurs)==true) {
            move_uploaded_file($file_tmp,"../ressources/images/".$file_name);
            $succes_ajout = "succès";
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
	<link rel="stylesheet" href="../Decoration/ajouter.css">
</head>

<body class="body">
	<?php include "menu-administration.php"?>

  <div class="div_produit_ajouter">
    <h1> Ajout du produit : <?=$succes_ajout?> </h1>
    <a href="../administration/administration-accueil.php"> Retour </a>
  </div>   	
</body>
</html>