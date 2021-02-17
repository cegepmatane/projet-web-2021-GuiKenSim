<?php
    require "./accesseur/UtilisateurDAO.php";  
    $succes_ajout = "";
    if(isset($_POST['BoutonInscription'])){ //check if form was submitted
        
        $pseudo = $_REQUEST['pseudo'];
        $courriel = $_REQUEST['courriel'];
        $motdepasse = $_REQUEST['motdepasse'];
        $motdepasseVerif = $_REQUEST['motdepasseVerif'];
        $utilisateur = new Utilisateur(null,$pseudo,$courriel,$motdepasse);
        $erreurs= array(); // tableau ou on stocke les erreurs
        
        // vérification des entrées utilisateur
        if (!preg_match("/^[a-zA-Z-0-9-' ]*$/",$utilisateur->getPseudo())) {
          $erreurs[]="Seulement des lettres, chiffres et espaces sont autorisés";
        }
        if (strlen($utilisateur->getMotDePasse()) < 7 ) {
            $erreurs[]="Le mot de passe doit faire 8 caractères minimum";
        }
        if ($utilisateur->getMotDePasse() !== $motdepasseVerif) {
            $erreurs[]="Les mots de passe ne correspondent pas";
        }
        if(empty($utilisateur->getPseudo())==true || empty($utilisateur->getCourriel())==true ||empty($utilisateur->getMotDePasse())==true) {
            $erreurs[]="Un des champs obligatoire est vide !";
        }
        if (!filter_var($utilisateur->getCourriel(), FILTER_VALIDATE_EMAIL)) {
          $erreurs[]="Veuillez entrer un courriel valide";
        }
         if(!is_string($utilisateur->getPseudo())){
            $erreurs[]="Le pseudo doit être du texte !";
        }
        if(!is_string($utilisateur->getCourriel())){
            $erreurs[]="Le courriel doit être du texte !";
        }
        if(is_link($utilisateur->getPseudo()) || is_link($utilisateur->getCourriel()) || is_link($utilisateur->getMotDePasse())){
            $erreurs[]="Il ne faut pas mettre de liens dans les champs";
        }
        
        // s'il n'y a pas d'erreur avant l'envoi
        if(empty($erreurs)==true) {
            $utilisateur->setMotDePasse(password_hash($utilisateur->getMotDePasse(), PASSWORD_DEFAULT));
            $erreurs[]= UtilisateurDAO::ajouterUtilisateur($utilisateur); // on exécute la fonction ajouterUtilisateur
            
            // On vérifie qu'il n'y a pas d'erreurs
            if($erreurs[0] == false){
                $succes_ajout = "succès";
                header('location:index.php');
            }else{
                // foreach pour afficher toutes les erreurs venant de la base
                foreach ($erreurs as $erreur){
                    $succes_ajout = $succes_ajout."● erreur : ".$erreur."<br/>";
                }
            }
            
        }else{
            foreach ($erreurs as $erreur){
                    $succes_ajout = $succes_ajout."● erreur : ".$erreur."<br/>";
                    echo "erreur : ".$erreur;
                }
        }
        // Tuto pour les forms https://magemastery.net/courses/user-registration-with-php-mysql/form-validation
        // Faire dans l'utilisateur pour les erreurs envoyer une erreur : https://www.php.net/manual/fr/function.filter-var.php
        // Session pour les cookies https://www.sitepoint.com/users-php-sessions-mysql/
        //valider le mot de passe : https://www.w3schools.com/howto/howto_js_password_validation.asp
        //crypter le mot de passe : https://www.php.net/manual/fr/function.password-verify.php | https://www.php.net/manual/fr/function.password-hash.php
        
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
                    title="nom d'utilisateur"
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
                title="adresse courriel"
                required=true
                />
                <label>
                    Mot de passe :
                </label>
                <input
                name="motdepasse"
                type = "password"
                class="page-inscription-formulaire-input"
                title="Doit contenir au moins un chiffre, une minuscule et une majuscule et faire plus de 8 caractères"
                required=true
                />
                <label>
                    Vérifier le mot de passe :
                </label>
                <input
                name="motdepasseVerif"
                type = "password"
                class="page-inscription-formulaire-input"
                title="Vérification du mot de passe"
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







