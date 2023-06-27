<?php
include_once("../connexion.php");

$id = $_GET['id'];

$suppr = $connexion->query("DELETE FROM matiere WHERE id_m = $id");

header("Location:../matieres.php");

?>
