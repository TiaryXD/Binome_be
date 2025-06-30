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
        <th scope="col" class="table-primary " > </th>
        <th scope="col" class="table-primary" >Employees</th>
        <th scope="col" class="table-primary" >Gender</th>

    </tr>
    </thead>
    <?php for ($i=0; $i < count($liste) ; $i++) {?>
        <tr>
        <td><a href="../pages/fiche.php?employe=<?=$liste[$i]['emp_no']?>">👤</a></td>
        <td><?php echo $liste[$i]['first_name'] ." ".$liste[$i]['last_name'] ?></a></td>
        <td><?php echo $liste[$i]['gender']?></td>
    </tr>
    </tr>
    <?php } ?>
    </table>
</main>
    
</body>
</html>