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
    <title>Document</title>
</head>
<body>
<main class="container my-5">
    <table class="table table-bordered table-striped align-middle">
    <thead>
    <tr>        
        <th scope="col" class="table-primary" ><?php echo $liste[0]['dept_name'] ?></th>
    </tr>
    </thead>
    <?php for ($i=0; $i < count($liste) ; $i++) {?>
        <tr>
        <td><?php echo $liste[$i]['first_name'] ." ".$liste[$i]['last_name'] ?></td>
        </tr>
    </tr>
    <?php } ?>
    </table>
</main>
    
</body>
</html>