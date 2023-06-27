<!doctype html>
<html lang="en">

<head>
    <title>Matières</title>
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
                    <a href="../matieres.php" class="btn btn-primary"><span class="bi bi-arrow-left-circle"></span>  Retour</a>
                </div>
                <div class="col-md-6 text-start mb-5">
                    <h2 class="heading-section">Ajout de matière</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <form action="" method="POST" class="login-form">
                            <div class="form-group">
                                <input type="text" class="form-control rounded-left" placeholder="Nom de la matiere" required name="mat">
                            </div>
                            <!-- <div class="form-group d-flex"> -->
                                <!-- <input type="number" class="form-control rounded-left" placeholder="Crédit" required name="cr"> --> 
                            <!-- </div>    -->
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary rounded submit p-3 px-5" value="Valider" name="envoi">
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

    <?php

    include_once("../connexion.php");
    if ($_POST) {

        $insertion =  $connexion->prepare("INSERT INTO matiere(nom) VALUES (:nom)");
        $insertion->bindParam(':nom', $_POST['mat']);
        $insertion->execute();
       /* $req = $connexion->prepare("SELECT id_m  FROM matiere WHERE matiere = ?");
        $req->execute(array($_POST['mat']));
        $id_matiere = $req->fetch()['id_m'];
      /* $insertion2 = $connexion->prepare("INSERT INTO credits(id_matiere,credit) VALUES(:id_m,:credit)");
       $insertion2->bindParam(':id_m',$id_matiere);
       $insertion2->bindParam(':credit' , $_POST['cr']);
       $insertion2->execute();*/
        header("Location:../matieres.php");
    }
    ?>
</body>
</html>