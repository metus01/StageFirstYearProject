<?php
include_once("./connexion.php");

$value = $_GET['filiere'];
$tab = [];
$tab2 = [];

$id1 = $connexion->prepare("SELECT id_f FROM filiere WHERE Filiere.nom_filiere = ?");
$id1->execute(array($value));
$afid = $id1->fetch(PDO::FETCH_NUM);

$requete = $connexion->query("SELECT nom FROM matiere INNER JOIN Filiere_matiere ON Matiere.id_m = Filiere_matiere.id_matiere WHERE Filiere_matiere.id_filiere = $afid[0]");
$af = $requete->fetchAll(PDO::FETCH_NUM);

//  var_dump($af);
//  die();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <link rel="stylesheet" href="./bootstrap-5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap-icons-1.9.1/bootstrap-icons.css">
</head>
<style>
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
    <section class="mt-4">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <form action="" method="POST">
                    <table class="table table-striped table-bordered table-responsive table-info">
                        <tr>
                            <th>Matières</th>
                            <th>Notes</th>
                        </tr>

                        <?php
                        $c = 0;
                        if ($value) {
                            echo "<tr>";
                            foreach ($af as $data) {

                                echo "<td>" . $data[0] . "</td>";
                        ?>
                                <td><input type="number" name="<?php echo $c = $c + 1; ?>" id="" required></td>
                                </tr>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        ?>
                        <?php
                        if ($_POST) {
                            $value2 = $_GET['filiere'];
                            $req = $connexion->query("SELECT Etudiants.id, Annee.id_annee  FROM Etudiants INNER JOIN Annee ON Etudiants.annee_academique = Annee.annee  ORDER BY Etudiants.id DESC LIMIT 0,1 ");
                            $id2 = $req->fetchAll(PDO::FETCH_NUM);
                            // var_dump($id2);
                            // die();
                            $req_mat = $connexion->query("SELECT Matiere.id_m FROM Matiere INNER JOIN Filiere_matiere ON Matiere.id_m = Filiere_matiere.id_matiere WHERE  Filiere_matiere.id_filiere = $afid[0]");
                            $e_mat = $req_mat->fetchAll(PDO::FETCH_NUM);
                            // var_dump($e_mat);
                            // die();

                            for ($i = 1; $i <= sizeof($af); $i++) {
                                array_push($tab, $_POST[$i]);
                            }
                            // var_dump($tab);
                            // die();
                            for ($i = 0; $i < sizeof($e_mat); $i++) {
                                for ($j = 0; $j < 1; $j++) {
                                    array_push($tab2, $e_mat[$i][$j]);
                                }
                            }
                            // var_dump($tab2);
                            // die();
                            $d1 = $id2[0][0];
                            $d2 = $id2[0][1];

                            $req_notes = $connexion->prepare("INSERT INTO notes(id_etudiant,id_an,id_mat,notes) VALUES (?,?,?,?)");
                            for ($i = 0; $i < sizeof($e_mat); $i++) {

                                $req_notes->execute(array($d1, $d2, $tab2[$i], $tab[$i]));
                            }

                            header("Location:bulletin.php?filiere={$value2}");
                        }

                        ?>
                    </table>
                    <div class=" mt-2 d-grid gap-2">
                        <input type="submit" value="Soumettre" class="btn btn-dark ">
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>