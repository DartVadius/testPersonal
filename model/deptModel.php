<?php

/**
 * deptModel
 *
 * @author DartVadius
 */
class deptModel {
    public static function findTitleById($id) {
        $pdo = PDOLib::getInstance()->getPdo();
        $sql = "SELECT dept_title FROM dept WHERE dept_id = :dept_id";
        $arr = array(
            'dept_id' => $id
        );
        $res = $pdo->prepare($sql);
        $res->execute($arr);
        return $res->fetchColumn();
    }

}
