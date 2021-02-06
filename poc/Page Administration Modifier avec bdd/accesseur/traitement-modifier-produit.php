<?php
   $id = $_POST['id'];
   $titre = $_POST['titre'];
   $prix = $_POST['prix'];
   $description = $_POST['description'];
   $image = $_POST['image'];

   //Traitement de l'image
   if(isset($_FILES['fichierImage'])){
      $errors= array();
      $file_name = $_FILES['fichierImage']['name'];
      $file_size = $_FILES['fichierImage']['size'];
      $file_tmp = $_FILES['fichierImage']['tmp_name'];
      $file_type = $_FILES['fichierImage']['type'];
      $file_ext = strtolower(pathinfo("../ressources/images/".$file_name,PATHINFO_EXTENSION));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="Extension de fichier non autorisée, veuillez upload une image en jpg,jpeg ou png.";
      }
      
      if($file_size > 2097152) {
         $errors[]="Limage ne doit pas faire plus de 2MB";
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../ressources/images/".$file_name);
         echo "Succès";
      }else{
         print_r($errors);
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

   <p> id : <?=$id?> | titre : <?=$titre?> | prix : <?=$prix?> | description : <?=$description?> | image : <?=$image?>
   <img src="../Ressources/images/<?=$image?>" alt="logo-item" >
   </p>

  <div class="div_produit_supprimer">
    <h1> Produit modifié ! </h1>
    <a href="../administration/administration-accueil.php" class="bouton_retour"> Retour </a>
  </div>    
</body>
</html>
