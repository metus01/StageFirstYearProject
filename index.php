<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface de gestion</title>
    <link rel="stylesheet" href="./bootstrap-icons-1.9.1/bootstrap-icons.css">
    <link rel="stylesheet" href="index.css" />
</head>
<style>
    * {
  margin: 0;
  padding: 0;
  font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}

nav {
  position: absolute;
  width: 250px;
  height: 100vh;
  background:#a7ffeb;
}
h1 {
  position: absolute;
  margin: 20px 0 0 60px;
}
.menu {
  position: absolute;
  margin: 80px 0px 0px 15px;
  font-size: 1.1rem;
}
.menu li {
  list-style-type: none;
  padding: 30px 0px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.329);
}
.menu li a {
  text-decoration: none;
  color: black;
}
.menu li span {
  margin: 0px 40px 0px 0px;
  font-size: 1.3rem;
}
nav .menu li:hover a {
  color: orange;
}

</style>
<body>
    <header>
        <nav>
            <h1><span class="bi bi-house-door"></span> Acceuil</h1>
            <ul class="menu">
                <li><a href="./matieres.php"><span class="bi bi-book"></span>Matières</a></li>
                <li><a href="./filiere.php"><span class="bi bi-journals"></span>Filières</a></li>
                <li><a href="./annee.php"><span class="bi bi-calendar-date"></span>Années académiques</a></li>
                <li><a href="./etudiant.php"><span class="bi bi-person-video3 "></span>Etudiants</a></li>
                <li><a href="./fil_mat.php"><span class="bi bi-link-45deg"></span>Liaisons</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>