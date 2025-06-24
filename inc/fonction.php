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
        $sql_pub = "SELECT dept_no,dept_name FROM departments";
        $connexion = dbconnect();
        $dep = mysqli_query($connexion, $sql_pub);
    
        $all_dep = array();
    
        if ($dep) {
            while ($departt = mysqli_fetch_assoc($dep)) {
                $all_dep[] = [
                'dept_no' => $departt['dept_no'],
                'dept_name' => $departt['dept_name']
            ];
            }
        } else {
            echo "Erreur SQL : " . mysqli_error($connexion);
        }
    
        return $all_dep;
    }
    function get_Manager($deptno){
        $connexion = dbconnect();
        $sql = "SELECT e.first_name, e.last_name FROM dept_manager dm
        JOIN employees e ON dm.emp_no = e.emp_no
        WHERE dm.dept_no= '%s' AND dm.to_date= '9999-01-01'";
        $sql = sprintf($sql,$deptno);
        $result = mysqli_query($connexion, $sql);
        $res = mysqli_fetch_assoc($result);
        return $res;
        
    }
    function get_liste_empl($deptno){
        $connexion = dbconnect();
        $sql = "SELECT e.first_name, e.last_name, e.gender, d.dept_name dept_name 
        FROM dept_emp demp
        JOIN employees e ON e.emp_no= demp.emp_no
        JOIN departments d ON d.dept_no=demp.dept_no
        WHERE d.dept_no ='%s'";
        $sql = sprintf($sql, $deptno);
        $result = mysqli_query($connexion, $sql);
        $res = array();
        while ($data = mysqli_fetch_assoc($result)) {
            $res[] = $data;
        }
        return $res;
    }


    function get_one_empl($id) {

$sql = "SELECT e.birth_date, e.firt_name, e.last_name, e.gender, e.hire_date, s.salary, s.from_date, s.to_date from employees e
join salaries s on e.emp_no = s.emp_no WHERE e.emp_no=$id";
$result = mysqli_query(dbconnect(), $sql);
$publications = mysqli_fetch_all($result, MYSQLI_ASSOC);
return $publications;
}


?>