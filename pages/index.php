<?php
require ("../inc/fonction.php");
$dep = get_Depart();

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
          <a class="nav-link" href="recherche.php">Search</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
<main class="container my-5">
    <table class="table table-bordered table-striped align-middle">
    <thead>
    <tr>        
        <th scope="col" class="table-primary" > </th>
        <th scope="col" class="table-primary" >No</th>
        <th scope="col" class="table-primary" >Name</th>
        <th scope="col" class="table-primary" >Manager</th>

    </tr>
    </thead>
    <?php for ($i=0; $i < count($dep) ; $i++) { 
        $manager = get_Manager($dep[$i]['dept_no'])?>
        <tr>
        <td><a href="../pages/liste.php?no=<?= $dep[$i]['dept_no']?>">🏢</a></td>
        <td><?php echo $dep[$i]['dept_no'] ?></td>
        <td><?php echo $dep[$i]['dept_name'] ?></td>
        <td><?php echo $manager['first_name'] ." ". $manager['last_name']?></td>
        </tr>
    </tr>
    <?php } ?>
    </table>
    <br><br>
    <h5><a href="recherche.php">Formulaire de recherche</a></h5>
</main>

</body>
</html>