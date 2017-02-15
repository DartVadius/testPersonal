<?php

/**
 * indexController
 *
 * @author DartVadius
 */
class indexController extends baseController {

    public function indexAction() {        
        $empl = employesModel::pagination();
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
