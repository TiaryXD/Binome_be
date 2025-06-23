<?php
require ("../inc/fonction.php");
$dep = get_Depart();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste depart</h1>
    <table border="1">
    <tr>
        <th>Name</th>
    </tr>
    <?php for ($i=0; $i < count($dep) ; $i++) { ?>
        <tr>
        <td><?php echo $dep[$i]['dept_name'] ?></td>
        </tr>
    </tr>
    <?php } ?>
    </table>
</body>
</html>