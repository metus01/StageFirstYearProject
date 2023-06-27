      <?php
        include_once("./connexion.php");

        $req_fil = $connexion->query("SELECT nom_filiere FROM filiere");

        $affil = $req_fil->fetchAll(PDO::FETCH_NUM);

        $req_an = $connexion->query("SELECT annee FROM annee");

        $afan = $req_an->fetchAll(PDO::FETCH_NUM);
        //   var_dump($affil);
        //   die();

        ?>



      <!DOCTYPE html>
      <html>

      <head>
          <meta charset="utf-8">
          <title>Etudiant</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="./bootstrap-icons-1.9.1/bootstrap-icons.css">
          <!-- LINEARICONS -->
          <link rel="stylesheet" href="./etudiant/fonts/linearicons/style.css">

          <!-- STYLE CSS -->
          <link rel="stylesheet" href="./etudiant/css/style.css">
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

          <div class="wrapper">
              <div class="inner">
                  <img src="./etudiant/images/image-1.png" alt="" class="image-1">
                  <form action="" method="POST">
                      <h3>Nouvel Etudiant <span class="bi bi-person-circle"></span></h3>
                      <div class="form-holder">
                          <input type="text" class="form-control" placeholder="Nom" name="nom" required>
                      </div>
                      <div class="form-holder">
                          <input type="text" class="form-control" placeholder="Prenoms" name="prenoms" required>
                      </div>
                      <div class="form-holder">
                          <input type="number" class="form-control" placeholder="Matricule" name="matricule" required>
                      </div>
                      <div class="form-holder">
                          <select name="filiere" id="fil" class="form-control" required>
                              <option value="">Filière</option>
                              <?php
                                foreach ($affil as $data) {
                                ?>
                                  <option value="<?php echo $data[0]; ?>"><?php echo $data[0]; ?></option>
                              <?php
                                }
                                ?>
                          </select>
                      </div>
                      <div class="form-holder">
                          <select name="annee" id="an" class="form-control" required>
                              <option value="">Année académique</option>
                              <?php
                                foreach ($afan as $data) {
                                ?>
                                  <option value="<?php echo $data[0]; ?>"><?php echo $data[0]; ?></option>
                              <?php
                                }
                                ?>
                          </select>
                      </div>
                      <button type="submit">
                          <span>Valider</span>
                      </button>
                  </form>
                  <img src="./etudiant/images/image-2.png" alt="" class="image-2">
              </div>

          </div>

          <script src="./etudiant/js/jquery-3.3.1.min.js"></script>
          <script src="./etudiant/js/main.js"></script>

          <?php 
          if($_POST){

                      $value = $_POST['filiere'];
                    $insert = $connexion->prepare("INSERT INTO etudiants(nom,prenom,matricule,filiere,annee_academique		
                    ) VALUES (:nom,:prenoms,:matricule,:filiere,:annee) ");

                    $insert->bindParam(':nom', $_POST['nom']);
                    $insert->bindParam(':prenoms', $_POST['prenoms']);
                    $insert->bindParam(':matricule', $_POST['matricule']);
                    $insert->bindParam(':filiere', $_POST['filiere']);
                    $insert->bindParam(':annee', $_POST['annee']);

                    $insert->execute();

                    header("Location:./notes.php?filiere=$value");

                }
                
          ?>
      </body>

      </html>