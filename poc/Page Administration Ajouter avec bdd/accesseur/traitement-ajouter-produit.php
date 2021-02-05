<?php
    if(isset($_FILES['fichierImage'])){
        $erreurs= array();
        $file_name = $_FILES['fichierImage']['name'];
        $file_size = $_FILES['fichierImage']['size'];
        $file_tmp = $_FILES['fichierImage']['tmp_name'];
        $file_type = $_FILES['fichierImage']['type'];
        $file_ext = strtolower(pathinfo("../ressources/images/".$file_name,PATHINFO_EXTENSION));
      
        $extensions= array("jpeg","jpg","png");
      
        if(in_array($file_ext,$extensions)=== false){
            $erreurs[]="Extension de fichier non autorisée, veuillez upload une image en jpg,jpeg ou png.";
        }
      
        if($file_size > 2097152) {
            $erreurs[]="Limage ne doit pas faire plus de 2MB";
        }
      
        if(empty($erreurs)==true) {
            move_uploaded_file($file_tmp,"../ressources/images/".$file_name);
            echo "Succès";
        }else{
            print_r($erreurs);
        }
    }

    
?>