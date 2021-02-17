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
    <form action="" method="post">
        <input type="submit" name="deconnexion" value="déconnexion" />
    </form>
    <p>Nom d'utilisateur :<?php echo $_SESSION["utilisateur"]->getPseudo() ?></p>
    <p>Courriel :<?php echo $_SESSION["utilisateur"]->getCourriel() ?></p>
    <p>Mot de passe crypté :<?php echo $_SESSION["utilisateur"]->getMotDePasse() ?></p>
	
</body>