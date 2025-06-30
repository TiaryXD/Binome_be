<?php 
require ("../inc/fonction.php");
$employe = $_GET['employe'];
$fiche = get_one_empl($employe);
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
<body>
<main class="container my-5">
    <table class="table table-bordered table-striped align-middle">
    <thead>
    <tr>   
        <th scope="col" class="table-primary" >Departement</th>  
        <th scope="col" class="table-primary" >Name</th>
        <th scope="col" class="table-primary" >Birth date</th>
        <th scope="col" class="table-primary" >Salary</th>
        <th scope="col" class="table-primary" >Date</th>
        <th scope="col" class="table-primary" >From</th>
        <th scope="col" class="table-primary" >To</th>
        <th scope="col" class="table-primary" >Gender</th>

    </tr>
    </thead>
    <?php for ($i=0; $i < count($fiche) ; $i++) {?>
        <tr>
        <td><?php echo $fiche[$i]['dept_name'] ?></td>
        <td><?php echo $fiche[$i]['first_name']." ".$fiche[$i]['last_name'] ?></a></td>
        <td><?php echo $fiche[$i]['birth_date'] ?></td>
        <td><?php echo $fiche[$i]['salary'] ?></td>
        <td><?php echo $fiche[$i]['hire_date'] ?></td>
        <td><?php echo $fiche[$i]['from_date'] ?></td>
        <td><?php echo $fiche[$i]['to_date'] ?></td>
        <td><?php echo $fiche[$i]['gender'] ?></td>
        </tr>
    </tr>
    <?php } ?>
    </table>
</main>
</body>
</html>