<?php
require ("../inc/fonction.php");
$no = $_GET['no'];
$liste = get_liste_empl($no);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="recherche.php">Search</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
<main class="container my-5">
      <p class="h1">Details du departement <?= $liste[0]['dept_name'] ?></p>
      <table class="table table-bordered table-striped align-middle">
    <thead>
    <tr> 
        <th scope="col" class="table-primary" >Femmes</th>
        <th scope="col" class="table-primary" >Hommes</th>
    </tr>
    </thead>

        <tr>
        <td><?=count(get_female_empl($no))?></td>
        <td><?=count(get_male_empl($no))?></td>
    </tr>
    </tr>
    </table>
    <p class="h6"> Salaire moyen du departement : <?=number_format(get_salaire_moyen_dept($no), 2, ',', ' ') ?> $</p>

</main>

</body>
</html>
