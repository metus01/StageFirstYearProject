<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin</title>
    <link rel="stylesheet" href="./bootstrap-5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap-icons-1.9.1/bootstrap-icons.css">
    <link rel="stylesheet" href="print.css" media="print">
</head>
<style>
   * {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
    body
    {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
    a
    {
        text-align: center;
    }
    th
    {
        text-align: center;
    }
    tr
    {
        text-align: center;
    }
    td
    {
        text-align: center;
    }
    h5
    {
        text-align: center;
        color: crimson;
        font-weight: bold;
    }

</style>
<body>
    <?php
    include_once("./connexion.php");

    $value = $_GET['filiere'];
    $tab = [];
    $tab2 = [];
    $tab3 = [];

    function moy(array $tab, array $tab2)
    {
        $somme = 0;
        $moyenne = 0;
        $som_coef = 0;

        for ($i = 0; $i < sizeof($tab); $i++) {
            $somme += $tab[$i] * $tab2[$i];
        }
        for ($i = 0; $i < sizeof($tab2); $i++) {
            $som_coef += $tab2[$i];
        }

        $moyenne = $somme / $som_coef;

        return $moyenne;
    }

    function som(array $tab)
    {
        $somme = 0;
        for ($i = 0; $i < sizeof($tab); $i++) {
            $somme += $tab[$i];
        }
        return $somme;
    }


    $req_name = $connexion->query("SELECT Etudiants.matricule,Etudiants.nom, Etudiants.prenom,Etudiants.filiere, Etudiants.annee_academique, Etudiants.id FROM Etudiants INNER JOIN Notes ON Etudiants.id = Notes.id_etudiant ORDER BY Etudiants.id  DESC LIMIT 0,1");

    $afname = $req_name->fetchAll(PDO::FETCH_NUM);
    // var_dump($afname);
    // die();

    $id = $afname[0][5];

    $id1 = $connexion->prepare("SELECT id_f FROM filiere WHERE filiere.nom_filiere = ?");
    $id1->execute(array($value));
    $afid = $id1->fetch(PDO::FETCH_NUM);
    $req_mat = $connexion->query("SELECT nom FROM matiere INNER JOIN Filiere_matiere ON matiere.id_m = Filiere_matiere.id_matiere WHERE Filiere_matiere.id_filiere = {$afid[0]}");
    $afmat = $req_mat->fetchAll(PDO::FETCH_NUM);
    $req_cr =  $connexion->query("SELECT Filiere_matiere.credit FROM Filiere_matiere INNER JOIN Matiere ON Matiere.id_m = Filiere_matiere.id_matiere WHERE Filiere_matiere.id_filiere = {$afid[0]}");
    $afcr = $req_cr->fetchAll(PDO::FETCH_NUM);
    $req_mas =  $connexion->query("SELECT Filiere_matiere.masse FROM Filiere_matiere INNER JOIN Matiere ON Matiere.id_m = Filiere_matiere.id_matiere WHERE Filiere_matiere.id_filiere = {$afid[0]}");
    $afmas = $req_mas->fetchAll(PDO::FETCH_NUM);
    $counter = sizeof($afmat);
    $req_notes = $connexion->query("SELECT Notes.notes FROM Notes INNER JOIN Etudiants ON Notes.id_etudiant = Etudiants.id WHERE Etudiants.id=$id ");
    $afnotes = $req_notes->fetchAll(PDO::FETCH_NUM);
    foreach ($afnotes as $data) {
        array_push($tab, $data[0]);
    }
    
    foreach ($afcr as $data) {
        array_push($tab2, $data[0]);
    }
    foreach ($afmas as $data) {
        array_push($tab3, $data[0]);
    }

    ?>
    <div class="container-fluid">
        <div class="row  mt-4">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <h2 class="text-center"><u style="font-size: 1.3rem;">Bulletin  de fin de Semestre<span class=""></span> </u></h2>
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <table class="mt-4 text-center table table-borderless  table-responsive" cellpadding="40">
                                <tr>
                                    <th><u>Nom :</u></th>
                                    <td class="text-end"><?php echo $afname[0][1]; ?></td>
                                    <th><u>Filière : </u></th>
                                    <td class="text-end"><?php echo $afname[0][3]; ?></td>
                                </tr>
                                <tr>
                                    <th><u>Prénoms : </u></th>
                                    <td class="text-end"><?php echo $afname[0][2]; ?></td>
                                    <th><u>Année académique : </u></th>
                                    <td class="text-end"><?php echo $afname[0][4]; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <table border="1" cellspacing="0" cellpadding="20" class="table-responsive table table-secondary table-secondary table-bordered ">
                        <tr>

                            <th rowspan="2" class="text-center">Semestre Unique <p class="mt-2"> <span class=""></span></p>
                            </th>

                            <?php foreach ($afmat as $data) {
                            ?>
                                <td colspan="4" class="text-center"><?php echo $data[0]; ?></td>
                            <?php
                            } ?>


                            <th rowspan="2" class="text-center">Moyenne</th>
                        </tr>
                        <tr>

                            <?php for ($i = 0; $i < sizeof($tab2); $i++) {
                            ?>
                                <td>Crédit</td>
                                <td><?php echo $tab2[$i]; ?></td>
                                <td>Masse</td>
                                <td><?php echo $tab3[$i];  ?></td>
                            <?php

                            }
                            ?>

                        </tr>
                        <tr>

                            <td class="text-center"><?php echo $afname[0][0]; ?></td>
                            <?php foreach ($tab as $data) {
                            ?>
                                <td colspan="4" class="text-center"><?php echo $data ?></td>
                            <?php
                            }
                            ?>
                            <td class="text-center"><?php echo moy($tab, $tab2);  ?></td>
                        </tr>
                    </table>
                </div>

            </div>

        </div>
    </div>
    <div class="container align-items-center" id="print1">
        <div class="row align-items-center justify-content-center">
            <div class=" mt-2 d-grid gap-2 align-items-center justify-content-center">
                <form action="">
                <button type="button" class="btn btn-warning" onclick="window.print()"><span class=" bi bi-printer" ></span> Impression</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container align-items-center justify-content-center">
        <div class="row align-items-center jusitfy-content-center">
            <div class=" mt-2 d-grid gap-2 align-items-center justify-content-center">
                <a href="./index.php" class="btn btn-dark text-center align-items-center justify-content-center" id="print2"> Nouvel  enregistrement    <span class="bi bi-person-plus"></span>    </a>
            </div>
        </div>
    </div>

</body>

</html>