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
<body>
<main class="container my-5">
    <table class="table table-bordered table-striped align-middle">
    <thead>
    <tr>        
        <th scope="col" class="table-primary" >Name</th>
        <th scope="col" class="table-primary" >Birth date</th>
        <th scope="col" class="table-primary" >Salary</th>
        <th scope="col" class="table-primary" >Date</th>
        <th scope="col" class="table-primary" >From</th>
        <th scope="col" class="table-primary" >To</th>
    </tr>
    </thead>
    <?php for ($i=0; $i < count($dep) ; $i++) { 
        $manager = get_Manager($dep[$i]['dept_no'])?>
        <tr>
        <td><?php echo $dep[$i]['dept_no'] ?></a></td>
        <td><?php echo $dep[$i]['dept_name'] ?></td>
        <td><?php echo $manager['first_name'] ." ". $manager['last_name']?></td>
        </tr>
    </tr>
    <?php } ?>
    </table>
</main>
</body>
</html>