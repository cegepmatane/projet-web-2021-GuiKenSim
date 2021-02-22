<?php
    require_once "./modele/Utilisateur.php";
    session_start();
    if(isset($_POST['deconnexion']))
    {
        session_destroy();
        header('location:index.php');
    }
    $sessionUtilisateur = $_SESSION["utilisateur"];
$succes_pseudo_courriel = "erreur l'utilisateur existe déjà";
$succes_motdepasse = "erreur les mots de passe ne correspondent pas";
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
                    value=<?php echo $sessionUtilisateur->getPseudo(); ?>
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
                value=<?php echo $sessionUtilisateur->getCourriel(); ?>
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