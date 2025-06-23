<?php 
function dbconnect() {
    static $connect = null;

    if ($connect === null) {
        $connect = mysqli_connect('localhost', 'root', '', 'employees');

        if (!$connect) {
            die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
        }

        mysqli_set_charset($connect, 'utf8mb4');
    }

    return $connect;
    }

    function get_Depart() {
        $sql_pub = "SELECT dept_name FROM departments";
        $connexion = dbconnect();
        $dep = mysqli_query($connexion, $sql_pub);
    
        $all_dep = array();
    
        if ($dep) {
            while ($departt = mysqli_fetch_assoc($dep)) {
                $all_dep[] = [
                'dept_name' => $departt['dept_name']
            ];
            }
        } else {
            echo "Erreur SQL : " . mysqli_error($connexion);
        }
    
        return $all_dep;
    }

?>