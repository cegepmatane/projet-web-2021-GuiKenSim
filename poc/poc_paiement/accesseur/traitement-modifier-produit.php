<?php
  require "./ProduitDAO.php"; 

  //Récupération des donnnées
  $id = $_POST['id'];
  $titre = $_POST['titre'];
  $prix = $_POST['prix'];
  $description = $_POST['description'];
  $image = $_POST['image'];

  if(isset($titre) || isset($description) || isset($prix) || isset($image)){ 

    $erreurs= array();
    $succes_modifier = "erreur durant la modification";
    $extensions= array("jpeg","jpg","png");   

    if(isset($_FILES['NouvelleImage'])){ 
      $nom_image = $_FILES['NouvelleImage']['name'];
      $file_size = $_FILES['NouvelleImage']['size'];
      $file_tmp = $_FILES['NouvelleImage']['tmp_name'];
      $file_type = $_FILES['NouvelleImage']['type'];
      $file_ext = strtolower(pathinfo("./Ressources/images/".$nom_image,PATHINFO_EXTENSION));
    }

    if (isset($_POST['image'])){
      $nom_image = $image;
    }
        
        if($file_size > 2097152) {
            $erreurs[]="L'image ne doit pas faire plus de 2MB";
        }

        if(empty($titre)==true || empty($prix)==true ||empty($description)==true) {
            $erreurs[]="Un des champs obligatoire est vide !";
        }

        if (strpos($prix, '$') !== false || strpos($prix, '€') !== false) {
            $erreurs[]="Le prix ne doit pas contenir de signe";
        }

        if(!is_string($titre)){
            $erreurs[]="Le nom doit être du texte !";
        }

        if(!is_string($description)){
            $erreurs[]="La description doit être du texte !";
        }

        if(is_link($description) || is_link($titre) || is_link($prix)){
            $erreurs[]="Il ne faut pas mettre de liens dans les champs";
        }

        if(empty($erreurs)==true) {
            ProduitDAO::modifierProduit($id,$titre,$description,$prix,$nom_image);
            move_uploaded_file($file_tmp,"./Ressources/images/".$nom_image);

            $succes_modifier = "succès";
        }
        else{
            $succes_modifier = "erreur durant la modification ".$erreurs[0];
        }
    }   
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
  <div class="div_produit_supprimer">
    <h1> Modification du produit : <?=$succes_modifier?> </h1>
    <a href="../administration/administration-accueil.php" class="bouton_retour"> Retour </a>
  </div>    
</body>
</html>
