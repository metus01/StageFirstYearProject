<?php
include_once("../connexion.php");

$id = $_GET['id'];

$suppr1 = $connexion->query("DELETE FROM filiere WHERE id_f = $id");

header("Location:../filiere.php");

?>
