<?php 
require ("../inc/fonction.php");
if (isset($_GET['option']) && 
    isset($_GET['debut']) && 
    isset($_GET['employe'])) {

    $employe = $_GET['employe'];
    $option = $_GET['option'];
    $debut = $_GET['debut'];
    
    insert_dept($employe, $option, $debut);
    header("Location: ../pages/fiche.php?employe=$employe");
}
?>