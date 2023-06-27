<?php
include_once("../connexion.php");

$id = $_GET['id'];

$suppr1 = $connexion->query("DELETE FROM filiere_matiere WHERE id_fm = $id");

header("Location:../fil_mat.php");
