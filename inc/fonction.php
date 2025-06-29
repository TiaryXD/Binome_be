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
        $sql = "SELECT e.emp_no, e.first_name, e.last_name, e.gender, d.dept_name dept_name 
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
        $connexion = dbconnect();
        $sql = "SELECT e.birth_date, e.first_name, e.last_name, e.gender, e.hire_date, s.salary, s.from_date, s.to_date, d.dept_name 
        FROM employees e
        JOIN salaries s ON e.emp_no = s.emp_no
        JOIN dept_emp dept ON e.emp_no = dept.emp_no
        JOIN departments d ON dept.dept_no = d.dept_no
        WHERE e.emp_no='%s'";
        $sql = sprintf($sql, $id);
        $result = mysqli_query($connexion, $sql);
        $res = array();
        while ($data = mysqli_fetch_assoc($result)) {
            $res[] = $data;
        }
        return $res;
    }

    function search($dept, $empl, $min, $max, $offset=0){
        $connexion = dbconnect();
        $sql = "SELECT e.first_name, e.last_name, e.birth_date, TIMESTAMPDIFF(YEAR, e.birth_date, CURDATE()) AS age, d.dept_name
        FROM employees AS e
        JOIN dept_emp AS de ON e.emp_no = de.emp_no
        JOIN departments AS d ON de.dept_no = d.dept_no
        WHERE 1=1
        AND (d.dept_name LIKE '%$dept%')
        AND (e.first_name LIKE '%$empl%')
        AND (TIMESTAMPDIFF(YEAR, e.birth_date, CURDATE()) >= $min)
        AND (TIMESTAMPDIFF(YEAR, e.birth_date, CURDATE()) <= $max)
        ORDER BY e.first_name
        LIMIT 20 OFFSET $offset";
        $result = mysqli_query($connexion, $sql);
        $res = array();
        while ($data = mysqli_fetch_assoc($result)) {
            $res[] = $data;
        }
        return $res;
    }

function search($mots){
    $connexion = dbconnect();
    $sql = "SELECT ";
}


?>
<!-- SELECT e.first_name, e.last_name, 
       TIMESTAMPDIFF(YEAR, e.birth_date, CURDATE()) AS age, 
       d.dept_name
FROM employees AS e
JOIN dept_emp AS de ON e.emp_no = de.emp_no
JOIN departments AS d ON de.dept_no = d.dept_no
WHERE 1=1
  AND (d.dept_name LIKE '%Customer Service%')
  AND (TIMESTAMPDIFF(YEAR, e.birth_date, CURDATE()) >= 60)
  AND (TIMESTAMPDIFF(YEAR, e.birth_date, CURDATE()) <= 70)
ORDER BY e.first_name
LIMIT 20;

SELECT e.first_name, e.last_name, e.birth_date, TIMESTAMPDIFF(YEAR, e.birth_date, CURDATE()) AS age, d.dept_name
        FROM employees AS e
        JOIN dept_emp AS de ON e.emp_no = de.emp_no
        JOIN departments AS d ON de.dept_no = d.dept_no
        WHERE 1=1
        AND (d.dept_name LIKE '%Customer Service%')
        AND (e.first_name LIKE '%Aamer%')
        AND (TIMESTAMPDIFF(YEAR, e.birth_date, CURDATE()) >= 60)
        AND (TIMESTAMPDIFF(YEAR, e.birth_date, CURDATE()) <= 70)
        ORDER BY e.first_name
        LIMIT 20

SELECT e.first_name, e.last_name, 
       TIMESTAMPDIFF(YEAR, e.birth_date, CURDATE()) AS age, 
       d.dept_name
FROM employees AS e
JOIN dept_emp AS de ON e.emp_no = de.emp_no
JOIN departments AS d ON de.dept_no = d.dept_no
LIMIT 20; -->