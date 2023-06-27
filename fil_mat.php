<?php
include_once("./connexion.php");

$requete1 = $connexion->query("SELECT Filiere.nom_filiere,Filiere_matiere.credit,Filiere_matiere.masse,Filiere_matiere.id_fm FROM Filiere INNER JOIN Filiere_matiere ON Filiere.id_f = Filiere_matiere.id_filiere ");

$requete2 = $connexion->query(" SELECT Matiere.nom FROM Matiere INNER JOIN Filiere_matiere WHERE Matiere.id_m = Filiere_matiere.id_matiere ");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liaison</title>
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
    input
    {
        font-weight: bolder;
    }
</style>


<body>
    <section class="mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 mt-4">
                    <a class="btn btn-dark" href="./index.php"><span class="bi bi-arrow-return-left"></span>   Retour au menu</a>
                </div>
                <div class="col-lg-4 mt-4">
                    <a class="btn btn-secondary" href='./fil_mat/ajouter.php'><span class="bi bi-pencil-square"></span>  Ajouter une liaison</a>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped table-bordered table-responsive table-secondary mt-4">
                        <tr>
                            <th>Filières</th>
                            <th>Matières</th>
                            <th>Crédits</th>
                            <th>Masses horaires</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                        <?php
                        while ($afrq1 = $requete1->fetch() and $afrq2 = $requete2->fetch()) {
                        ?>
                            <tr>
                                <td><?php echo $afrq1['nom_filiere']; ?></td>
                                <td><?php echo $afrq2['nom'] ?></td>
                                <td><?php echo $afrq1['credit']; ?></td>
                                <td><?php echo $afrq1['masse']; ?></td>
                                <td><a class="btn btn-warning  col-8 mx-4 " href="./fil_mat/modifier.php?id=<?php echo $afrq1["id_fm"]; ?>"><span class='bi bi-pencil '></span></a></td>
                                <td><a class="btn btn-danger col-8 mx-4 " href="./fil_mat/supprimer.php?id=<?php echo $afrq1["id_fm"]; ?>"><span class='bi bi-trash '></span></a></td>

                            </tr>
                        <?php
                        }

                        ?>
                    </table>
                </div>
            </div>

        </div>
        </div>
    </section>
</body>

</html>