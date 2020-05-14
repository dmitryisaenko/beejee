<?php

namespace controllers{

    use \view\taskView;

    class Task extends System{

        public function action_start(){
            $data['page-title'] = 'Добавить задачу';
            $isAuth = $this->isAuth();
            $view = new taskView($data, $isAuth);
            $view->showTemplate('newTask');
        }
        
        //Method for save NEW task (for any users)
        public function saveNewTask(){
            $data['userData'] = $this->secureData($_POST);
            if ($this->validation($data['userData']) === true){
                
                //If validation of inputed data is OK, add data to the DB:
                $this->db->insert('main', ['user_name' => $data['userData']['user_name'], 'user_email' => $data['userData']['user_email'], 'user_task' => $data['userData']['user_task']]);
                $_SESSION['message'] = 'addTaskOk';
                header("Location: /");
            }
            else {
                $data['error'] = $this->validation($data['userData']);
                $data['page-title'] = 'Добавить задачу';
                $isAuth = $this->isAuth();
                $view = new taskView($data, $isAuth);
                $view->showTemplate('newTask');
            }
        }

        //Method show existing task (for admin only)
        public function showTask(){
            if (!$this->isAuth()) {
                $_SESSION['message'] = 'noAuth';
                header("Location: /");
                exit;
            }
            $get = $this->secureData($_GET);
            $idTask = $get['id'];
            $data['userData'] = $this->db->select('SELECT * FROM main WHERE id=:id', array('id' => $idTask))[0];
            $isAuth = $this->isAuth();
            $data['page-title'] = 'Редактировать задачу';
            $view = new taskView($data, $isAuth);
            $view->showTemplate('editTask');
        }

        //Method lets change existing task (for admin only)
        public function saveEditedTask(){
            if (!$this->isAuth()) {
                $_SESSION['message'] = 'noAuth';
                header("Location: /");
                exit;
            }

            $data['userData'] = $this->secureData($_POST);

            //If validation of inputed data is OK, change data in the DB:
            if ($this->validation($data['userData']) === true){
                
                //If admin changed field 'Task', add to the DB timestamp of changes:
                if ($data['userData']['user_task'] !== $data['userData']['task-pervision']){
                    $db_update = $this->db->update(
                        'main',
                        array(
                            'user_name' => $data['userData']['user_name'], 
                            'user_email' => $data['userData']['user_email'], 
                            'user_task' => $data['userData']['user_task'],
                            'task_edited' => time()
                        ),
                        'id=:id',
                        array(
                            'id' => $data['userData']['id']
                        )
                    );
                }
                else {
                    $db_update = $this->db->update(
                        'main',
                        array(
                            'user_name' => $data['userData']['user_name'], 
                            'user_email' => $data['userData']['user_email'], 
                            'user_task' => $data['userData']['user_task']
                        ),
                        'id=:id',
                        array(
                            'id' => $data['userData']['id']
                        )
                    );
                }
                $_SESSION['message'] = 'editTaskOk';
                header("Location: /");
            }
            else {
                $data['error'] = $this->validation($data['userData']);
                $data['page-title'] = 'Редактировать задачу';
                $isAuth = $this->isAuth();
                $view = new taskView($data, $isAuth);
                $view->showTemplate('editTask');
            }
        }

        
        //Validation inputed data - returns "Empty" if present one empty field. Then return "Email" if Email-field was inputed incorrect. 
        //IF all OK - returns "true"
        private function validation($data){
            foreach ($data as $key => $value){
                if ($value === '') return "empty";
            }
            $pattern = '/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u';
            if (!preg_match($pattern, $data['user_email'])) return 'email';
            return true;
        }

        
    }
}