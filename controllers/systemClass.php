<?php

namespace controllers{
    
    use \core\sql;

	abstract class System{
        
        protected $params;
        protected $db;

        abstract function action_start();

        public function __construct(){
            $this->db = sql::app();
        }

		public function request($params = [], $action){
            $this->params = $params;
            $this->$action();
        }
        
        public function __call($params, $name){
            echo '404';
        }

        protected function isAuth(){
            if ( (isset($_SESSION['isAuth'])) && ($_SESSION['isAuth'] === true) ) {
                return true;
            }
            else {
                return false;
            }
        }

        protected function secureData($data) {
            foreach($data as $key => $value) {
                if (is_array($value)) $this->secureData($value);
                else $data[$key] = htmlspecialchars($value);
            }
            return $data;
        }

	}
}