<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class BaseDeDonnees{
  public static function getConnexion(){
    $usager = 'kenny';
    $motdepasse = 'Toad781227@';
    $hote = 'localhost';
    $base = 'boutiquecegep';
    $dsn = "pgsql:host=$hote;dbname=$base;";
    $connexion = new PDO($dsn, $usager, $motdepasse);
    return $connexion;
  }
}
?>