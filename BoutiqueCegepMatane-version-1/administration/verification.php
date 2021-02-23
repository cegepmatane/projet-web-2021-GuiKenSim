<?php

require_once "../modele/Utilisateur.php";
session_start();
if(empty($_SESSION['utilisateur']) || $_SESSION["utilisateur"]->getPseudo() != "simon" || $_SESSION["utilisateur"]->getPseudo() != "guillaume" || $_SESSION["utilisateur"]->getPseudo() != "kenny" ){
            header('location:../index.php');
        }
?>