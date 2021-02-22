<?php
    require_once "./modele/Utilisateur.php";
    require "./accesseur/UtilisateurDAO.php";  
    session_start();
    if(isset($_POST['deconnexion']))
    {
        session_destroy();
        header('location:index.php');
    }
    $sessionUtilisateur = new Utilisateur($_SESSION["utilisateur"]->getId(),$_SESSION["utilisateur"]->getPseudo(),$_SESSION["utilisateur"]->getCourriel(),$_SESSION["utilisateur"]->getMotDePasse());
    $succes_pseudo_courriel = "";
    $succes_motdepasse = "erreur les mots de passe ne correspondent pas";



    if(isset($_POST['BoutonChangementNomCourriel'])){ //check if form was submitted
        
        // récupération des variables + les mettres dans un objet utilisateurs
        $pseudo = $_REQUEST['pseudo'];
        $courriel = $_REQUEST['courriel'];
        $motdepasse = $_REQUEST['motdepasse'];
        $changementsUtilisateur = new Utilisateur(null,$pseudo,$courriel,$motdepasse);
        $erreurs= array(); // tableau ou on stocke les erreurs
        // vérification que le mot de passe est bon
        
        if (!password_verify($changementsUtilisateur->getMotDePasse(), $sessionUtilisateur->getMotDePasse())) {
            $erreurs[]= "Le mot de passe est incorrect";
        }
        // vérification des entrées utilisateur
        
            
        if (!preg_match("/^[a-zA-Z-0-9-' ]*$/",$changementsUtilisateur->getPseudo())) {
            $erreurs[]="Seulement des lettres, chiffres et espaces sont autorisés";
        }

        if(empty($changementsUtilisateur->getPseudo())==true || empty($changementsUtilisateur->getCourriel())==true) {
            $erreurs[]="Un des champs obligatoire est vide !";
        }
        if (!filter_var($changementsUtilisateur->getCourriel(), FILTER_VALIDATE_EMAIL)) {
            $erreurs[]="Veuillez entrer un courriel valide";
        }
        if(!is_string($changementsUtilisateur->getPseudo())){
            $erreurs[]="Le pseudo doit être du texte !";
        }
        if(!is_string($changementsUtilisateur->getCourriel())){
            $erreurs[]="Le courriel doit être du texte !";
        }
        if(is_link($changementsUtilisateur->getPseudo()) || is_link($changementsUtilisateur->getCourriel())){
            $erreurs[]="Il ne faut pas mettre de liens dans les champs";
        }
            
        
        
        
        // s'il n'y a pas d'erreur avant l'envoi
        if(empty($erreurs)==true) {
            
            
            $erreurs[]= UtilisateurDAO::modifierUtilisateur($sessionUtilisateur,$changementsUtilisateur); // on exécute la fonction ajouterUtilisateur
            
            // On vérifie qu'il n'y a pas d'erreurs
            if($erreurs[0] == false){
                $succes_pseudo_courriel = "succès";
                $_SESSION["utilisateur"]->setPseudo($changementsUtilisateur->getPseudo());
                $_SESSION["utilisateur"]->setCourriel($changementsUtilisateur->getCourriel());
                header('location:profil.php');
            }else{
                // foreach pour afficher toutes les erreurs venant de la base
                foreach ($erreurs as $erreur){
                    $succes_pseudo_courriel = $succes_pseudo_courriel."● erreur : ".$erreur."<br/>";
                }
            }
            
        }else{
            foreach ($erreurs as $erreur){
                    $succes_pseudo_courriel = $succes_pseudo_courriel."● erreur : ".$erreur."<br/>";
                    echo "erreur : ".$erreur;
                }
        }
   
}












?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title> Boutique du Cégep de Matane </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./decoration/profil.css">
</head>
<body class="page-profil">
    <?php include 'menu.php' ?>
    <div class="conteneur-boites">
        <div class="boite-decoration">
            <form action="" class="page-profil-formulaire" method="post">
                <h2>Modifier les informations de profil</h2>
                <label>
                    Nom d'utilisateur:
                </label>
                <input
                    type="text"
                    name="pseudo"
                    autocomplete="off" 
                    value="<?php echo $sessionUtilisateur->getPseudo();?>"
                    class="page-profil-formulaire-input"
                    title="Nom d'utilisateur"
                    required=true
                />
                <label>
                    Adresse courriel :
                </label>
                <input
                name="courriel"
                type = "text"
                autocomplete="off" 
                value="<?php echo $sessionUtilisateur->getCourriel(); ?>"
                class="page-profil-formulaire-input"
                title="Adresse courriel"
                required=true
                />
                <label>
                    Mot de passe :
                </label>
                <input
                name="motdepasse"
                type = "password"
                class="page-profil-formulaire-input"
                title="Mot de passe"
                required=true
                />
                <p class="page-profil-msgIncorrect"><?php echo $succes_pseudo_courriel ?></p>
                <input type="submit" value="Modifier" class="page-profil-bouton" name="BoutonChangementNomCourriel"/>
            </form>
        </div>
        
        
        
        <div class="boite-decoration">
            <form action="" class="page-profil-formulaire" method="post">
                <h2>Changer le mot de passe</h2>
                <label>
                    Ancien mot de passe : 
                </label>
                <input
                    name="ancienMotDePasse"
                    type = "password"
                    autocomplete="off"    
                    class="page-profil-formulaire-input"
                    title="Ancien mot de passe"
                    required=true
                />
                <label>
                    Nouveau mot de passe :
                </label>
                <input
                name="nouveauMotDePasse"
                type = "password"
                autocomplete="off" 
                class="page-profil-formulaire-input"
                title="Nouveau mot de passe"
                required=true
                />
                <label>
                    Confirmer le mot de passe :
                </label>
                <input
                name="confirmerNouveauMotDePasse"
                type = "password"
                class="page-profil-formulaire-input"
                title="Confirmer le mot de passe"
                required=true
                />
                <p class="page-profil-msgIncorrect"><?php echo $succes_motdepasse ?></p>
                <input type="submit" value="Modifier" class="page-profil-bouton" name="BoutonChangementMotdepasse"/>
            </form>
            
        </div>
        
    </div>
    
    <form action="" method="post">
        <input type="submit" name="deconnexion" value="déconnexion" />
    </form>
    <?php include 'historique-transaction.php' ?>
	<?php include 'footer.php' ?>
</body>