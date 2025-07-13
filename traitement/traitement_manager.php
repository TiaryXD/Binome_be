<?php 
require ("../inc/fonction.php");
if (isset($_GET['debut']) && 
    isset($_GET['employe'])) {

    $employe = $_GET['employe'];
    $deptlong = get_dept_long($employe);
    $option = $deptlong[0]['dept_no']; 
    $debut = $_GET['debut'];
    echo $employe;
    echo $option;
    echo $debut;
    become_manager($employe, $option, $debut);
    header("Location: ../pages/fiche.php?employe=$employe");
}
?>