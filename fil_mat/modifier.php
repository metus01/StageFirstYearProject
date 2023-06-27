<?php

include_once("../connexion.php");
$id = $_GET['id'];

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

$req_val1 = $connexion->query("SELECT Filiere.nom_filiere,Filiere_matiere.credit,Filiere_matiere.masse,Filiere_matiere.id_fm FROM Filiere INNER JOIN Filiere_matiere ON Filiere.id_f = Filiere_matiere.id_filiere WHERE Filiere_matiere.id_fm= $id");

$afval1 = $req_val1->fetch();
$req_val2 = $connexion->query(" SELECT Matiere.nom FROM Matiere INNER JOIN Filiere_matiere ON Matiere.id_m = Filiere_matiere.id_matiere WHERE Filiere_matiere.id_fm = $id ");

$afval2 = $req_val2->fetch();

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

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 mb-5">
                    <a href="../fil_mat.php" class="btn btn-primary"><span class="bi bi-arrow-left-short"></span>Retour</a>
                </div>
                <div class="col-md-6 text-start mb-5">
                    <h2 class="heading-section">Modification de la liaison</h2>
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
                                <label for="fil_m" class="form-label">Filière à modifier</label>
                                <input type="text" id="fil_m" class="form-control" value="<?php echo $afval1['nom_filiere']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="mat_m" class="form-label">Matiere à modifier</label>
                                <input type="text" class="form-control" value="<?php echo $afval2['nom']; ?>" id="mat_m" readonly>
                            </div>
                            <div class="form-group">
                                <select name="filiere" id="fil" class="form-control">
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
                                <select name="matiere" id="mat" class="form-control">
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
                                <input type="number" placeholder="Crédit" name="credit" class="form-control" value="<?php echo $afval1['credit']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="number" placeholder="Masse horaire" name="masse" class="form-control" value="<?php echo $afval1['masse']; ?>"">
                            </div>
                            <div class=" form-group">
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
        $fil = $_POST['filiere'];
        $mat = $_POST['matiere'];
        $cr = $_POST['credit'];
        $masse = $_POST['masse'];

        $req1 = $connexion->query("SELECT Filiere.id_f FROM Filiere WHERE Filiere.nom_filiere = '$fil'");

        $af1 = $req1->fetch();
        $req2 = $connexion->query(" SELECT Matiere.id_m FROM Matieres WHERE Matiere.nom = '$mat'");

        $af2 = $req2->fetch();
        $nfil = $af1[0];
        $nmat = $af2[0];
        $envoi = $connexion->query("UPDATE Filiere_matiere SET id_filiere='$nfil', id_matiere='$nmat', credit='$cr',masse='$masse' WHERE Filiere_matiere.id_fm = $id");

        header("Location:../fil_mat.php");

        // for ($i = 0; $i < sizeof($af1); $i++) {
        //     array_push($tab3, $af1[$i]);
        // }

        // foreach ($af2 as $data) {
        //     array_push($tab3, $data);
        // }

        // $envoi = $connexion->prepare("INSERT INTO filiere_matiere(id_fil,id_mat,credit,masse) VALUES(:id_fil,:id_mat,:credit,:masse)");
        // $envoi->bindParam(':id_fil', $tab3[0]);
        // $envoi->bindParam(':id_mat', $tab3[1]);
        // $envoi->bindParam(':credit', $_POST['credit']);
        // $envoi->bindParam(':masse', $_POST['masse']);
        // $envoi->execute();
    }

    ?>

</body>


</html>