<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $usager = 'postgres';
    $motdepasse = 'password';
    $hote = 'localhost';
    $base = 'boutiquecegep';
    $dsn = "pgsql:host=$hote;dbname=$base;";
    $basededonnees = new PDO($dsn, $usager, $motdepasse);
?>