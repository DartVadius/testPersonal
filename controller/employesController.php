<?php

/**
 * employesController
 *
 * @author DartVadius
 */
class employesController extends baseController {
    public function indexAction() {        
            header("Location: /index");
            exit();       
    }
    public function pageAction($page) {
        if ($page < 1) {
            $page = 1;
        }
        if (!empty($_SESSION['page_num']) && $page > $_SESSION['page_num']) {
            $page = $_SESSION['page_num'];
        }
        $empl = employesModel::pagination($page);
        $data = [];        
        $i = 0;
        foreach ($empl as $employe) {
            $employe->salaryMonth(50);
            $data[$i]['employe'] = $employe;
            $pos = positionModel::findTitleById($employe->employePos);
            $data[$i]['pos'] = $pos;
            $dept = deptModel::findTitleById($employe->employeDept);
            $data[$i]['dept'] = $dept;
            $i++;
        }
        $param = array(
            ['index/index', ['data' => $data]]
        );
        $this->view->render($param);
    }
}
