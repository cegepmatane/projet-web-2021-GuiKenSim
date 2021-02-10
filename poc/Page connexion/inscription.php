<?php
//require "../accesseur/ProduitDAO.php";
//$produit = ProduitDAO::ajouterProduit($titre,$description,$prix,$image);
//../accesseur/upload-images.php
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
            <form action="action.php" class="page-inscription-formulaire">
                <label>
                    Nom d'utilisateur:
                </label>
                <input
                    type="text"
                    name="nomUtilisateur"
                    autocomplete="off"    
                    class="page-inscription-formulaire-input"
                    required=true
                />
                <label>
                    Adresse courriel :
                </label>
                <input
                name="adresseCourriel"
                type = "text"
                class="page-inscription-formulaire-input"
                required=true
                />
                <label>
                    Mot de passe :
                </label>
                <input
                name="motDePasse"
                type = "password"
                class="page-inscription-formulaire-input"
                required=true
                />
                <label>
                    Vérifier le mot de passe :
                </label>
                <input
                name="motDePasse"
                type = "password"
                class="page-inscription-formulaire-input"
                required=true
                />
                <p class="page-inscription-msgIncorrect">Les mots de passe ne correspondent pas</p>
                <input type="submit" value="Inscription" class="page-inscription-bouton"/>
            </form>
            
        </div>
  			
  	</div> 

  <?php include 'footer.php' ?>
  	
</body>
</html>







