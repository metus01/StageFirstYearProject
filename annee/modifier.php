<?php
include_once("../connexion.php");

$id = $_GET['id'];
$recuperation2 = $connexion->query("SELECT annee FROM annee WHERE id_annee = $id");
$afrc2 = $recuperation2->fetch(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">

<head>
    <title>Année académique</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../bootstrap-icons-1.9.1/bootstrap-icons.css">

    <link rel="stylesheet" href="fontawesome-free-5.15.3-desktop/fontawesome-free-6.1.1-web/fontawesome-free-6.1.1-web/css/all.css" />

    <link rel="stylesheet" href="css/style.css">

</head>
<style>
*{
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif !important;
    font-size: 1rem !important;
    font-weight: bolder;
 }
 </style>
<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 mb-5">
                    <a href="../annee.php" class="btn btn-primary"><span class="bi bi-arrow-left-circle">  </span>Retour</a>
                </div>
                <div class="col-md-6 text-start mb-5">
                    <h2 class="heading-section">Modification d'année académique</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <form action="" method="POST" class="login-form">
                            <div class="form-group d-flex">
                                <input type="text" class="form-control rounded-left" placeholder="Nom de l'année académique" required name="an" value="<?php echo $afrc2['annee']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary rounded submit p-3 px-5" value="Modifier" name="modifier">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>
<?php

include_once("../connexion.php");
if ($_POST) {
    $an = $_POST['an'];

    $recuperation2 =  $connexion->query("UPDATE annee SET annee ='$an' WHERE id_annee = $id");

    header("Location:../annee.php");
}




?>

</html>