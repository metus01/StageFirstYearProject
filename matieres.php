<?php
include_once("./connexion.php");

$requete = $connexion->query("SELECT  *  FROM matiere");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matières</title>
    <link rel="stylesheet" href="./bootstrap-5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap-icons-1.9.1/bootstrap-icons.css">
    <link rel="stylesheet" href="matieres.css">
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
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
            <div class="col-lg-4 mt-4">
                    <a class="btn btn-secondary" href="./index.php"><span class="bi bi-arrow-return-left"></span>  Retour au menu</a>
                </div>
                <div class="col-lg-4 mt-4">
                    <a class="btn btn-primary" href="./matieres/ajoutermat.php"><span class="bi bi-pencil-square">  </span>Ajouter une matière</a>
                </div>

            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12 mt-4">
                    <table class="table table-striped table-bordered table-responsive table-info">
                        <tr>

                            <th>Matières</th>
                            <th>Modifier</th>
                            <th>Effacer</th>
                        </tr>
                        <?php
                        if ($requete->rowCount() == 0) {
                            echo '<h5>Il n\' y a pas de matière enregistrée</h5> ';
                        } else {
                            while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                                <tr>

                                    <td><?php echo $ligne['nom'] ?></td>
                                    <td><a class="btn btn-warning  col-8 mx-4 " href="./matieres/modifier.php?id=<?php echo $ligne["id_m"]; ?> "><span class='bi bi-pencil '></span></a></td>
                                    <td><a class="btn btn-danger col-8 mx-4 " href="./matieres/supprimer.php?id=<?php echo $ligne["id_m"]; ?>"><span class='bi bi-trash '></span></a></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </section>

</body>

</html>