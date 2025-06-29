<?php 
require ("../inc/fonction.php");
if (
    isset($_GET['dept']) &&
    isset($_GET['empl']) &&
    isset($_GET['min']) &&
    isset($_GET['max'])
) {
    $dept = $_GET['dept'];
    $empl = $_GET['empl'];
    $min = $_GET['min'];
    $max = $_GET['max'];
}

$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
$limit = 20;
$offset = $page * $limit;
$result = search($dept, $empl, $min, $max, $offset);

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
        <th scope="col" class="table-primary" >Employé</th>
        <th scope="col" class="table-primary" >Date de naissance</th>
    </tr>
    </thead>
    <?php for ($i=0; $i < count($result) ; $i++) {?>
    <tr>
        <td><?php echo $result[$i]['dept_name']?></td>
        <td><?php echo $result[$i]['first_name'] ." ".$result[$i]['last_name']?></td>
        <td><?php echo $result[$i]['birth_date']?></td>
    </tr>
    <?php } ?>
    </table>
    <div class="d-flex justify-content-between">
        <?php if ($page > 0) { ?>
            <a class="btn btn-primary" href="result_search.php?dept=<?=$dept?>&empl=<?=$empl?>&min=<?=$min?>&max=<?=$max?>&page=<?=($page-1)?>">← Précédent</a>
        <?php } else { echo "<div></div>"; } ?>

        <?php if (count($result) == $limit) { ?>
            <a class="btn btn-primary" href="result_search.php?dept=<?=$dept?>&empl=<?=$empl?>&min=<?=$min?>&max=<?=$max?>&page=<?=($page+1)?>">Suivant →</a>
        <?php } ?>
    </div>
</main>
</body>
</html>