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
        $sql_pub = "SELECT dept_no,dept_name FROM departments ORDER BY dept_no ASC";
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
        $sql = "SELECT e.first_name, e.last_name 
        FROM dept_manager dm
        JOIN employees e ON dm.emp_no = e.emp_no
        WHERE dm.dept_no= '%s' AND dm.to_date= '9999-01-01'";
        $sql = sprintf($sql,$deptno);
        $result = mysqli_query($connexion, $sql);
        $res = mysqli_fetch_assoc($result);
        return $res;
        
    }
    function get_liste_empl($deptno){
        $connexion = dbconnect();
        $sql = "SELECT*FROM v_get_gender AS v
        WHERE v.dept_no ='%s' ORDER BY v.first_name ASC";
        $sql = sprintf($sql, $deptno);
        $result = mysqli_query($connexion, $sql);
        $res = array();
        while ($data = mysqli_fetch_assoc($result)) {
            $res[] = $data;
        }
        return $res;
    }

        function get_female_empl($deptno){
        $connexion = dbconnect();
        $sql = "SELECT*FROM v_get_gender AS v
        WHERE v.dept_no ='%s' AND v.gender='F'";
        $sql = sprintf($sql, $deptno);
        $result = mysqli_query($connexion, $sql);
        $res = array();
        while ($data = mysqli_fetch_assoc($result)) {
            $res[] = $data;
        }
        return $res;
    }

        function get_male_empl($deptno){
        $connexion = dbconnect();
        $sql = "SELECT*FROM v_get_gender AS v
        WHERE v.dept_no ='%s' AND v.gender='M'";
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
        $sql = "SELECT*FROM v_get_one_empl AS v
        WHERE v.emp_no='%s'";
        $sql = sprintf($sql, $id);
        $result = mysqli_query($connexion, $sql);
        $res = array();
        while ($data = mysqli_fetch_assoc($result)) {
            $res[] = $data;
        }
        return $res;
    }

    function get_dept_long($id){
        $connexion = dbconnect();
        $sql ="SELECT*FROM v_emploi_plus_long WHERE emp_no = '$id'";
        $result = mysqli_query($connexion, $sql);
    
        $res = array();
        while ($data = mysqli_fetch_assoc($result)) {
            $res[] = $data;
        }
    
        return $res;
    }
    

    function search($dept, $empl, $min, $max, $offset=0){
        $connexion = dbconnect();
        if (empty($min)) {
            $min ='00';
        }
        if (empty($max)) {
            $max ='now()';
        }
        $sql = "SELECT * FROM v_search AS v
        WHERE 1=1
        AND (v.dept_name LIKE '%$dept%')
        AND (v.first_name LIKE '%$empl%')
        AND (TIMESTAMPDIFF(YEAR, v.birth_date, CURDATE()) >= $min)
        AND (TIMESTAMPDIFF(YEAR, v.birth_date, CURDATE()) <= $max)
        ORDER BY v.first_name
        LIMIT 20 OFFSET $offset";

        $result = mysqli_query($connexion, $sql);
        $res = array();
        while ($data = mysqli_fetch_assoc($result)) {
            $res[] = $data;
        }
        return $res;
    }

    function get_isa_search($dept, $empl, $min, $max){
        $connexion = dbconnect();
        if (empty($min)) {
            $min ='00';
        }
        if (empty($max)) {
            $max ='now()';
        }
        
        $sql = "SELECT*FROM v_empl_dept AS v
        WHERE 1=1
        AND (v.dept_name LIKE '%$dept%')
        AND (v.first_name LIKE '%$empl%')
        AND (TIMESTAMPDIFF(YEAR, v.birth_date, CURDATE()) >= $min)
        AND (TIMESTAMPDIFF(YEAR, v.birth_date, CURDATE()) <= $max)";
        $result = mysqli_query($connexion, $sql);
        $res = array();
        while ($data = mysqli_fetch_assoc($result)) {
            $res[] = $data;
        }
        return count($res);
    }
    

    function get_salaire_moyen_dept($dept_no) {
    $connexion = dbconnect(); 
    $sql = "SELECT AVG(salary) as salaire_moyen
            FROM employees e
            JOIN dept_emp de ON e.emp_no = de.emp_no
            JOIN salaries s ON e.emp_no = s.emp_no
            WHERE de.dept_no = '$dept_no' 
              AND s.to_date = '9999-01-01'";

    $result = mysqli_query($connexion, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['salaire_moyen'];

    }

    function insert_dept($empno, $option, $debut){
        $connexion = dbconnect(); 
        $sql1 = "INSERT INTO dept_emp (emp_no, dept_no, from_date, to_date)
                 VALUES ('$empno', '$option', '$debut', '9999-01-01')";
        mysqli_query($connexion, $sql1);

        $sql2 = "INSERT INTO salaries (emp_no, salary, from_date, to_date)
        SELECT '$empno', salary, '$debut', '9999-01-01'
        FROM salaries
        WHERE emp_no = '$empno'
        ORDER BY to_date DESC
        LIMIT 1";
        mysqli_query($connexion, $sql2);
        
    }

    function become_manager($emp_no, $option, $debut) {
        $connexion = dbconnect();
        $sql1 = "UPDATE dept_manager
                SET to_date = '$debut'
                WHERE dept_no = '$option' AND to_date = '9999-01-01'";
        mysqli_query($connexion,$sql1);

        $sql2 = "INSERT INTO dept_manager(emp_no, dept_no, from_date, to_date)
                VALUES ('$emp_no', '$option', '$debut', '9999-01-01')";
        mysqli_query($connexion,$sql2);
    }
?>
