<?php
    require "./accesseur/UtilisateurDAO.php";
    require "./modele/Utilisateur.php";    
    $succes_ajout = "";
    if(isset($_POST['BoutonInscription'])){ //check if form was submitted
        
        $pseudo = $_REQUEST['pseudo'];
        $courriel = $_REQUEST['courriel'];
        $motdepasse = $_REQUEST['motdepasse'];
        $motdepasseVerif = $_REQUEST['motdepasseVerif'];
        echo $pseudo.$courriel.$motdepasse;
        $erreurs= array();
        
        if (!preg_match("/^[a-zA-Z-0-9-' ]*$/",$pseudo)) {
          $erreurs[]="Seulement des lettres et espaces sont autorisés";
        }
        if ($motdepasse !== $motdepasseVerif) {
            $erreurs[]="Les mots de passe ne correspondent pas";
        }
        if(empty($pseudo)==true || empty($courriel)==true ||empty($motdepasse)==true) {
            $erreurs[]="Un des champs obligatoire est vide !";
        }
        if (!filter_var($courriel, FILTER_VALIDATE_EMAIL)) {
          $erreurs[]="Veuillez entrer un courriel valide";
        }
         if(!is_string($pseudo)){
            $erreurs[]="Le pseudo doit être du texte !";
        }
        if(!is_string($courriel)){
            $erreurs[]="Le courriel doit être du texte !";
        }
        if(is_link($pseudo) || is_link($courriel) || is_link($motdepasse)){
            $erreurs[]="Il ne faut pas mettre de liens dans les champs";
        }
        if(empty($erreurs)==true) {
            
            $motdepasseCrypte = password_hash($motdepasse , PASSWORD_DEFAULT);
            $utilisateur = new Utilisateur(null,$pseudo,$courriel,$motdepasseCrypte);
            if(UtilisateurDAO::ajouterUtilisateur($utilisateur)){
                echo "succes";
                $succes_ajout = "succès";
            }else{
                $succes_ajout = "erreur : problème avec la base de données";
                echo "erreur bdd";
            }
            
        }else{
            $succes_ajout = "".$erreurs[0];
            echo "erreurs : ".$erreurs[0];
        }

}
        

?>



<!DOCTYPE html>
<html lang="fr">
<head>
	<title> Boutique du Cégep de Matane </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./Decoration/inscription.css">
</head>

<body class="page-inscription">
	<?php include 'menu.php' ?>
  	<div class="accueil">
  		<h1 class="titre-page">Inscription à la boutique</h1>
        <div class="boite-decoration">
            <form action="" class="page-inscription-formulaire" method="post">
                <label>
                    Nom d'utilisateur:
                </label>
                <input
                    type="text"
                    name="pseudo"
                    autocomplete="off"    
                    class="page-inscription-formulaire-input"
                    required=true
                />
                <label>
                    Adresse courriel :
                </label>
                <input
                name="courriel"
                type = "text"
                autocomplete="off" 
                class="page-inscription-formulaire-input"
                required=true
                />
                <label>
                    Mot de passe :
                </label>
                <input
                name="motdepasse"
                type = "password"
                class="page-inscription-formulaire-input"
                required=true
                />
                <label>
                    Vérifier le mot de passe :
                </label>
                <input
                name="motdepasseVerif"
                type = "password"
                class="page-inscription-formulaire-input"
                required=true
                />
                <p class="page-inscription-msgIncorrect"><?php echo $succes_ajout ?></p>
                <input type="submit" value="Inscription" class="page-inscription-bouton" name="BoutonInscription"/>
            </form>
            
        </div>
  			
  	</div> 

  <?php include 'footer.php' ?>
  
  	
</body>
</html>







