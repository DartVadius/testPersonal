<?php

/**
 * deptController
 *
 * @author DartVadius
 */
class deptController extends baseController {

    public function indexAction($id = NULL) {        
            header("Location: /index");
            exit();       
    }
    
    public function idAction($id = NULL) {        
        if (!empty($id)) {
            $data = [];
            $pos = employesModel::findByDept($id);
            $i = 0;
            foreach ($pos as $employe) {
                $employe->salaryMonth(50);
                $data[$i]['employe'] = $employe;
                $pos = positionModel::findTitleById($employe->employePos);
                $data[$i]['pos'] = $pos;
                $dept = deptModel::findTitleById($employe->employeDept);
                $data[$i]['dept'] = $dept;
                $i++;
            }            
            $param = array(
                ['dept/id', ['data' => $data]],
            );            
            $this->view->render($param);
        } else {
            header("Location: /index");
            exit();
        }
    }

}
