<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $usager = 'postgres';
    $motdepasse = '';
    $hote = 'localhost';
    $base = 'boutique_cegep';
    $dsn = "pgsql:host=$hote;dbname=$base;";
    $basededonnees = new PDO($dsn, $usager, $motdepasse);
?>