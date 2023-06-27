<?php

include_once("../connexion.php");

$req_fil = $connexion->query("SELECT nom_filiere FROM filiere ");
$affil = $req_fil->fetchAll(PDO::FETCH_NUM);

$req_mat = $connexion->query("SELECT nom FROM matiere ");
$afmat = $req_mat->fetchAll(PDO::FETCH_NUM);

$tab1 = [];
$tab2 = [];
for ($i = 0; $i < sizeof($affil); $i++) {
    for ($j = 0; $j < 1; $j++) {
        array_push($tab1, $affil[$i][$j]);
    }
}

for ($i = 0; $i < sizeof($afmat); $i++) {
    for ($j = 0; $j < 1; $j++) {
        array_push($tab2, $afmat[$i][$j]);
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Liaison</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../bootstrap-icons-1.9.1/bootstrap-icons.css">

    <link rel="stylesheet" href="fontawesome-free-5.15.3-desktop/fontawesome-free-6.1.1-web/fontawesome-free-6.1.1-web/css/all.css" />

    <link rel="stylesheet" href="css/style.css">

</head>
<style>
* {
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
                    <a href="../fil_mat.php" class="btn btn-primary"><span class="bi bi-arrow-left-short"></span>Retour</a>
                </div>
                <div class="col-md-6 text-start mb-5">
                    <h2 class="heading-section">Liaison</h2>
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
                                <select name="filiere" id="fil" class="form-control" required>
                                    <?php
                                    foreach ($tab1 as $data) {
                                    ?>
                                        <option value="<?php echo $data; ?>"><?php echo $data; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group d-flex">
                                <select name="matiere" id="mat" class="form-control" required>
                                    <?php
                                    foreach ($tab2 as $data) {
                                    ?>
                                        <option value="<?php echo $data; ?>"><?php echo $data; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="number" placeholder="Crédit" name="credit" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="number" placeholder="Masse horaire" name="masse" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary rounded submit p-3 px-5" value="Valider" name="envoi" >
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
        $fil = $_POST['filiere'];
        $mat = $_POST['matiere'];
        $tab3 = [];

        $req1 = $connexion->query("SELECT Filiere.id_f FROM Filiere WHERE Filiere.nom_filiere = '$fil'");
        $af1 = $req1->fetch(PDO::FETCH_NUM);

        $req2 = $connexion->query(" SELECT Matiere.id_m FROM Matiere WHERE Matiere.nom = '$mat'");
        $af2 = $req2->fetch(PDO::FETCH_NUM);



        for ($i = 0; $i < sizeof($af1); $i++) {
            array_push($tab3, $af1[$i]);
        }

        foreach ($af2 as $data) {
            array_push($tab3, $data);
        }

        $envoi = $connexion->prepare("INSERT INTO filiere_matiere(id_filiere,id_matiere,credit,masse) VALUES(:id_fil,:id_mat,:credit,:masse)");
        $envoi->bindParam(':id_fil', $tab3[0]);
        $envoi->bindParam(':id_mat', $tab3[1]);
        $envoi->bindParam(':credit', $_POST['credit']);
        $envoi->bindParam(':masse', $_POST['masse']);
        $envoi->execute();
        header("Location:../fil_mat.php");
    }
    ?>

</body>
</html>