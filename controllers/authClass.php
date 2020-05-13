<?php

namespace controllers{

    use \view\taskView;
    use \core\sql;

    class Auth extends System{

      public function action_start(){
         $data['userData'] = $this->secureData($_POST);
         $location = $_SERVER['HTTP_REFERER'];
         if ($this->validation($data['userData']) === true){
               
            //If validation of inputed data is OK, add true to session "isAuth" and redirect to ref-page:
            $_SESSION['isAuth'] = true;
            header("Location: " . $location);
         }
         else {
               $modalError = $this->validation($data['userData']);
               $_SESSION['show-modal-login'] = true;
               $_SESSION['modal-error'] = $modalError;
               $_SESSION['login'] = $data['userData']['login'];
               $_SESSION['password'] = $data['userData']['login'];
               header("Location: " . $location);
         }
      }

      public function logout(){
         $_SESSION['isAuth'] = false;
         header("Location: /");
      }

      private function validation($data){
         foreach ($data as $key => $value){
               if ($value === '') return "empty";
         }
         $result = $this->db->select('SELECT * FROM users WHERE login=:login AND password=:password', array('login' => $data['login'], 'password' => md5($data['password'])));
         if ($result) return true;
         else return 'login';
      }
        
    }
}