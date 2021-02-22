<?php
    require_once "./modele/Utilisateur.php";
    session_start();
    if(isset($_POST['deconnexion']))
    {
        session_destroy();
        header('location:index.php');
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title> Boutique du Cégep de Matane </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php include 'menu.php' ?>
    <div class="boite-decoration">
            <form action="" class="page-profil-pseudo-courriel" method="post">
                <h2>Informations de profil</h2>
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
    <form action="" method="post">
        <input type="submit" name="deconnexion" value="déconnexion" />
    </form>
    <p>Nom d'utilisateur :<?php echo $_SESSION["utilisateur"]->getPseudo() ?></p>
    <p>Courriel :<?php echo $_SESSION["utilisateur"]->getCourriel() ?></p>
    <p>Mot de passe crypté :<?php echo $_SESSION["utilisateur"]->getMotDePasse() ?></p>
    <p>id :<?php echo $_SESSION["utilisateur"]->getId() ?></p>
    <?php include 'historique-transaction.php' ?>
	
</body>