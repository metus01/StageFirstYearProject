<?php
include_once("../connexion.php");

$id = $_GET['id'];

$suppr2 = $connexion->query("DELETE FROM annee WHERE id_annee = $id");

header("Location:../annee.php");

?>
