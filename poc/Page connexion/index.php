<?php

session_start();
                $_SESSION["donneesUtilisateur"] = $utilisateur;
                $_SESSION["pseudo"] = $utilisateur->getPseudo();
                $_SESSION["courriel"] = $utilisateur->getCourriel();


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
            <form action="action.php" class="page-connexion-formulaire">
                <label>
                    Nom d'utilisateur:
                </label>
                <input
                    type="text"
                    name="nomUtilisateur"
                    autocomplete="off"    
                    class="page-connexion-formulaire-input"
                    required=true
                />
                <label>
                    Mot de passe :
                </label>
                <input
                name="motDePasse"
                type = "password"
                class="page-connexion-formulaire-input"
                required=true
                />
                <p class="page-connexion-msgIncorrect">Mot de passe incorrect</p>
                <a href="inscription.php" class="lien-inscription"> Nouveau client ? Cliquez-ici </a>
                <input type="submit" value="Connexion" class="page-connexion-bouton"/>
            </form>
            
        </div>
  			
  	</div> 

  <?php include 'footer.php' ?>
  	
</body>
</html>








