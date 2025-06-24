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