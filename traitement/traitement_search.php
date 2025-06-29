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
    $page = isset($_GET['page']) ? intval($_GET['page']) : 0;

    header("Location: ../pages/result_search.php?dept=$dept&empl=$empl&min=$min&max=$max&page=$page");
    exit;
} else {
    header("Location: recherche.php");
    exit;
}
