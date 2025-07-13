<?php require ("../inc/fonction.php");
if (!isset($_GET['employe'])) {
  die("Aucun employé sélectionné.");
}
$employe = $_GET['employe'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <title>Document</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
    <header>
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Navbar</a>
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
    <main>
    <div class="container-sm cont">
        <p class="h2">Devenir Manager</p>
      <form action="../traitement/traitement_manager.php" method="get">
        <input type="hidden" name="employe" value="<?php echo $employe;?>">
      </p>
      </select>
      <p>
      <span class="h6">Date de début : </span>
      <span><input type="date" name="debut" id=""></span>
      </p>
      <input type="submit" value="Valider">
      </form>
      <br>
      <a class="btn btn-danger" href="fiche.php?employe=<?=$employe?>">Retour</a>
    </div>
    </main>
</body>
</html>