<?php

namespace controllers{

    use \view\TableView;

    class Table extends System{
        
        public function action_start(){
            if (isset($_GET['sortby'])) {
                $sortby = $_SESSION['sortby'] = ($_GET['sortby']);
                $sort = $_SESSION['sort'] = ($_GET['sort']);
                $data['data'] = $this->db->select("SELECT * FROM main ORDER BY $sortby $sort");
            }
            elseif ($_SESSION['sortby']){
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