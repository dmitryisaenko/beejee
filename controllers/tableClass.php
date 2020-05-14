<?php

namespace controllers{

    use \view\TableView;

    class Table extends System{
        
        //Main method for project starting. Its prepeare data for table view
        public function action_start(){
            $data = array();
            if (isset($_GET)) {
                $getQuery = $this->secureData($_GET);
            }
            if (isset($getQuery['page'])){
                $data['page'] = $getQuery['page'];
            }
            if (isset($getQuery['sortby'])) {
                $sortby = $_SESSION['sortby'] = ($getQuery['sortby']);
                $sort = $_SESSION['sort'] = ($getQuery['sort']);
                $data['data'] = $this->db->select("SELECT * FROM main ORDER BY $sortby $sort");
            }
            elseif (isset($_SESSION['sortby'])){
                $sortby = $_SESSION['sortby'];
                $sort = $_SESSION['sort'];
                $data['data'] = $this->db->select("SELECT * FROM main ORDER BY $sortby $sort");
            }
            else {
                $data['data'] = $this->db->select("SELECT * FROM main");
            }
            $data['page-title'] = 'Главная';
            $isAuth = $this->isAuth();
            $view = new TableView($data, $isAuth);
            $view->showTemplate('showTable');
        }

        //Method for change values in DB when admin click checkbox "Task done"
        public function post_ajax(){
            $data = $this->secureData($_POST);
            $task_id = (int)$data["checkbox_id"];
            $task_done = $data["checkbox_status"];
            $db_update = $this->db->update(
                'main',
                array(
                    'task_done' => $task_done 
                ),
                'id=:id',
                array(
                    'id' => $task_id
                )
            );
            if ($db_update) exit("Данные сохранены");
            else exit("Ошибка сохранения");
        }
        
    }
}