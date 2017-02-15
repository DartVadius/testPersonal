<?php

/**
 * positionModel
 *
 * @author DartVadius
 */
class positionModel {
    public static function findTitleById($id) {
        $pdo = PDOLib::getInstance()->getPdo();
        $sql = "SELECT position_title FROM position WHERE position_id = :position_id";
        $arr = array(
            'position_id' => $id
        );
        $res = $pdo->prepare($sql);
        $res->execute($arr);
        return $res->fetchColumn();
    }    
}
