<?php

/**
 * employesModel
 *
 * @author DartVadius
 */
class employesModel {

    public static $tableName = 'employes';
    protected $employeId = NULL;
    protected $employeName = NULL;
    protected $employeBirthday = NULL;
    protected $employeDept = NULL;
    protected $employePos = NULL;
    protected $employeSalary = NULL;
    protected $monthPay = NULL;

    public function __construct($employeName, $employeBirthday, $employeDept, $employePos, $employeSalary) {
        $this->employeName = $employeName;
        $this->employeBirthday = $employeBirthday;
        $this->employeDept = $employeDept;
        $this->employePos = $employePos;
        $this->employeSalary = $employeSalary;
    }

    public function setId($id) {
        $this->employeId = $id;
    }

    public function __get($name) {
        return $this->$name;
    }

    public static function findAll() {
        $emplList = array();
        $sql = "SELECT * FROM " . employesModel::$tableName;
        $pdo = PDOLib::getInstance()->getPdo();
        $res = $pdo->query($sql);
        $empl = $res->fetchAll();
        if ($empl) {
            foreach ($empl as $employe) {
                $newEmploye = new employesModel($employe['employes_name'], $employe['employes_birthday'], $employe['employes_dept_id'], $employe['employes_pos_id'], $employe['employes_salary']);
                $newEmploye->setId($employe['employes_id']);
                array_push($emplList, $newEmploye);
            }
            return $emplList;
        } else {
            return FALSE;
        }
    }

    public static function findByPos($id) {        
        $emplList = array();        
        $pdo = PDOLib::getInstance()->getPdo();
        $sql = "SELECT * FROM " . employesModel::$tableName . " WHERE employes_pos_id = :id";
        $arr = array(
            'id' => $id,
        );
        $res = $pdo->prepare($sql);
        $res->execute($arr);
        $pos = $res->fetchAll();        
        if ($pos) {
            foreach ($pos as $employe) {
                $newEmploye = new employesModel($employe['employes_name'], $employe['employes_birthday'], $employe['employes_dept_id'], $employe['employes_pos_id'], $employe['employes_salary']);
                $newEmploye->setId($employe['employes_id']);
                array_push($emplList, $newEmploye);
            }
            return $emplList;
        } else {
            return FALSE;
        }
    }
    
    public static function findByDept($id) {
        $emplList = array();
        $pdo = PDOLib::getInstance()->getPdo();
        $sql = "SELECT * FROM " . employesModel::$tableName . " WHERE employes_dept_id = :employes_dept_id";
        $arr = array(
            'employes_dept_id' => $id
        );
        $res = $pdo->prepare($sql);
        $res->execute($arr);
        $pos = $res->fetchAll();
        if ($pos) {
            foreach ($pos as $employe) {
                $newEmploye = new employesModel($employe['employes_name'], $employe['employes_birthday'], $employe['employes_dept_id'], $employe['employes_pos_id'], $employe['employes_salary']);
                $newEmploye->setId($employe['employes_id']);
                array_push($emplList, $newEmploye);
            }
            return $emplList;
        } else {
            return FALSE;
        }
    }

    public function salaryMonth($hour = NULL) {
        $pdo = PDOLib::getInstance()->getPdo();
        if ($this->employeSalary == 'hour' && $hour) {
            $sql = "SELECT position_salary_hour FROM position WHERE position_id = :position_id";
            $arr = array(
                'position_id' => $this->employePos
            );
            $res = $pdo->prepare($sql);
            $res->execute($arr);
            $pay = $res->fetchColumn();
            $this->monthPay = $pay * $hour;
        } elseif ($this->employeSalary == 'month') {
            $sql = "SELECT position_salary_month FROM position WHERE position_id = :position_id";
            $arr = array(
                'position_id' => $this->employePos
            );
            $res = $pdo->prepare($sql);
            $res->execute($arr);
            $this->monthPay = $res->fetchColumn();
        } else {
            return FALSE;
        }
    }
    
    public static function pagination($page = 1, $limit = 2) {
        $emplList = array();
        $pdo = PDOLib::getInstance()->getPdo();
        $sql = "SELECT count(*) FROM " . employesModel::$tableName;        
        $res = $pdo->query($sql);
        $count = $res->fetchColumn();        
        $pages = ceil($count / $limit);
        $_SESSION['page_num'] = $pages;
        $_SESSION['page'] = $page;
        if ($page <= 0) {
            $page = 1;
        }
        if ($page > $pages) {
            $page = $pages;
        }
        $start = $page * $limit - $limit;
        $sql="SELECT * FROM " . employesModel::$tableName . " LIMIT $start, $limit";
        $res = $pdo->query($sql);
        $output = $res->fetchAll();
        if ($output) {
            foreach ($output as $employe) {
                $newEmploye = new employesModel($employe['employes_name'], $employe['employes_birthday'], $employe['employes_dept_id'], $employe['employes_pos_id'], $employe['employes_salary']);
                $newEmploye->setId($employe['employes_id']);
                array_push($emplList, $newEmploye);
            }
            return $emplList;
        } else {
            return FALSE;
        }
    }

}
