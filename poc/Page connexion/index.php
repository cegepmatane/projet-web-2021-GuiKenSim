<?php
    require "./accesseur/UtilisateurDAO.php";  
    $succes_connexion = "";
    if(isset($_POST['BoutonConnexion'])){ //check if form was submitted
        
        $pseudo = $_REQUEST['pseudo'];
        $motdepasse = $_REQUEST['motdepasse'];
        $utilisateur = new Utilisateur(null,$pseudo,null,$motdepasse);
        $erreurs= array(); // tableau ou on stocke les erreurs
        
        // vérification des entrées utilisateur
        if (!preg_match("/^[a-zA-Z-0-9-' ]*$/",$utilisateur->getPseudo())) {
          $erreurs[]="Seulement des lettres, chiffres et espaces sont autorisés";
        }
        if(empty($utilisateur->getPseudo())==true || empty($utilisateur->getMotDePasse())==true) {
            $erreurs[]="Un des champs obligatoire est vide !";
        }
         if(!is_string($utilisateur->getPseudo())){
            $erreurs[]="Le pseudo doit être du texte !";
        }
        if(is_link($utilisateur->getPseudo()) || is_link($utilisateur->getMotDePasse())){
            $erreurs[]="Il ne faut pas mettre de liens dans les champs";
        }
        // s'il n'y a pas d'erreur avant l'utilisation de la base de données
        if(empty($erreurs)==true) {
            $utilisateurRecupere = UtilisateurDAO::recupUtilisateurParPseudo($utilisateur->getPseudo());
            //print_r($utilisateurRecupere);
            if($utilisateurRecupere == "utilisateur non existant"){
                $erreurs[]= "L'utilisateur demandé n'existe pas";
            }
            else{
                // on teste si les mot de passe sont les mêmes
                if (!password_verify($utilisateur->getMotDePasse(), $utilisateurRecupere['motdepasse'])) {
                    echo 'Le mot de passe est faux';
                    $erreurs[]= "Le mot de passe est incorrect";
                }
                else{
                    $utilisateur->setCourriel($utilisateurRecupere['courriel']);
                    $utilisateur->setMotDePasse($utilisateurRecupere['motdepasse']); 
                }
            } 
 
            // On vérifie qu'il n'y a pas d'erreurs
            if(empty($erreurs[0])){
                $succes_connexion = "succès";
                session_start();
                $_SESSION["utilisateur"] = $utilisateur;
                header('location:testSession.php');
            }else{
                // foreach pour afficher toutes les erreurs venant de la base
                foreach ($erreurs as $erreur){
                    $succes_connexion = $succes_connexion."● erreur : ".$erreur."<br/>";
                }
            }
            
        }else{
            foreach ($erreurs as $erreur){
                    $succes_connexion = $succes_connexion."● erreur : ".$erreur."<br/>";
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
	<link rel="stylesheet" href="./Decoration/connexion.css">
</head>

<body class="page-connexion">
	<?php include 'menu.php' ?>

  	<div class="accueil">
  		<h1 class="titre-page"> Connexion à la boutique </h1>
        <div class="boite-decoration">
            <form action="" class="page-connexion-formulaire" method="post">
                <label>
                    Nom d'utilisateur:
                </label>
                <input
                    type="text"
                    name="pseudo"
                    autocomplete="off"    
                    class="page-connexion-formulaire-input"
                    required=true
                />
                <label>
                    Mot de passe :
                </label>
                <input
                name="motdepasse"
                type = "password"
                class="page-connexion-formulaire-input"
                required=true
                />
                <p class="page-connexion-msgIncorrect"><?php echo $succes_connexion ?></p>
                <a href="inscription.php" class="lien-inscription"> Nouveau client ? Cliquez-ici </a>
                <input type="submit" value="Connexion" class="page-connexion-bouton" name="BoutonConnexion"/>
            </form>
            
        </div>
  			
  	</div> 

  <?php include 'footer.php' ?>
  	
</body>
</html>








