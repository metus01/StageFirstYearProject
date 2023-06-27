<?php  

$serveur = "localhost";

$login = "root";

$pass = "";

$db = "r_base";

try {
    $connexion = new PDO("mysql:host=$serveur;dbname=$db;charset=utf8",$login,$pass);
} catch (PDOException $e) {
  echo " Erreur de connexion".$e->getMessage();
}
?>