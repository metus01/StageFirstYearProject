<?php
include_once("../connexion.php");

$id = $_GET['id'];
$recuperation1 = $connexion->query("SELECT nom_filiere FROM filiere WHERE id_f = $id");
$afrc1 = $recuperation1->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <title>Filière</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../bootstrap-icons-1.9.1/bootstrap-icons.css">

    <link rel="stylesheet" href="fontawesome-free-5.15.3-desktop/fontawesome-free-6.1.1-web/fontawesome-free-6.1.1-web/css/all.css" />

    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 mb-5">
                    <a href="../filiere.php" class="btn btn-primary"><span class="bi bi-arrow-left-short"></span>Retour</a>
                </div>
                <div class="col-md-6 text-start mb-5">
                    <h2 class="heading-section">Modification de filière</h2>
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
                                <input type="text" class="form-control rounded-left" placeholder="Nom de la filière" required name="fil" value="<?php echo $afrc1['nom_filiere']; ?>">
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
    $nom = $_POST['fil'];



    $recuperation1 =  $connexion->query("UPDATE filiere SET nom_filiere ='$nom' WHERE id_f = $id");

    header("Location:../filiere.php");
}




?>

</html>