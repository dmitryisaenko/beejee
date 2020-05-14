<?php

namespace view{
	
	abstract class View{

		protected $data;
		protected $isAuth;

		public function __construct($data = array(), $isAuth = false){
			$this->data = $data;
			$this->isAuth = $isAuth;
	  }
	
		public function showTemplate($action, $params = array()){
			$sr = array();
			$sr["PAGE-TITLE"] = $this->data['page-title'] . ' | Приложение "СПИСОК ЗАДАЧ"';
			$sr['MENU'] = $this->getMenuPart($action);
			$sr['MESSAGE'] = $this->getMessage();
			$sr["MAIN-PART"] = $this->$action();
			$sr['MODALS'] = $this->getModal();
			$sr['SHOW-MODALS'] = $this->showModal();
			
			$result = $this->getReplaceContent($sr, "tpl/main-page.tpl");
			echo $result;
		}

		protected function getModal(){
			$userData = isset($this->data['userData']) ? $this->data['userData'] : '';
			if (!$this->isAuth) {
				$sr['MODAL-ERROR'] = '';
				$sr['LOGIN'] = '';
				$sr['PASSWORD'] = '';
				if (isset($_SESSION['modal-error'])) {
					if ($_SESSION['modal-error'] === 'empty') {
						$sr['MODAL-ERROR'] = file_get_contents('tpl/error-empty-modal.tpl');
					}
					elseif ($_SESSION['modal-error'] === 'login') {
						{
							$sr['MODAL-ERROR'] = file_get_contents('tpl/error-login-modal.tpl');
						}
					}
					unset($_SESSION['modal-error']);
				}
				if ( (isset($_SESSION['login']) && ($_SESSION['login'] !== '') ) ) {
					$sr['LOGIN'] = $_SESSION['login'];
					unset($_SESSION['login']);
				}
				if ( (isset($_SESSION['password']) && ($_SESSION['password'] !== '') ) ) {
					$sr['PASSWORD '] = $_SESSION['password'];
					unset($_SESSION['password']);
				}
				return $this->getReplaceContent($sr, "tpl/modals.tpl");
			}
			else {
				return '';
			}
		}

		//Show modal login-window with text erorr:
		protected function showModal(){
			if ( (isset($_SESSION['show-modal-login'])) && ($_SESSION['show-modal-login'] === true) )
				{
					unset($_SESSION['show-modal-login']);
					return "<script>$('#modal-login').modal('show'); </script>";
				}
			else {
				return '';
			}
		}

		//Show right part of menu according Auth/Noauth. For Auth show greeting and Logout-button. For Noauth - show only Login-button
		protected function getMenuPart($action){
			$fileName = '';
			$sr['LIST-ACTIVE'] = '';
			$sr['NEWTASK-ACTIVE'] = '';
			if ($action == 'newTask') $sr['NEWTASK-ACTIVE'] = 'active';
			else $sr['LIST-ACTIVE'] = 'active';
			($this->isAuth) ? $fileName  = 'menu-right-block-auth' : $fileName  = 'menu-right-block-noauth';
			$sr['MENU-RIGHT-BLOCK'] = file_get_contents('tpl/' . $fileName . '.tpl');

			return $this->getReplaceContent($sr, 'tpl/menu.tpl');
		}

		//Show message if it present in Session
		protected function getMessage(){
			if ( (isset($_SESSION['message'])) && ($_SESSION['message'] !== '') ){
				$message = $_SESSION['message'];
				unset($_SESSION['message']);
				switch($message){
					case ('addTaskOk'):
						$result = file_get_contents('tpl/message-add-data-ok.tpl');
						break;
					case ('editTaskOk'):
						$result = file_get_contents('tpl/message-edit-data-ok.tpl');
						break;
					case ('noAuth'):
						$result = file_get_contents('tpl/message-noauth.tpl');
						break;
					default:
						$result = '';
				}
				return $result;
			}

		}

		//Method for convert templates to viewable mode
		protected function getReplaceContent($sr, $template) {
			$content = file_get_contents($template);		
			$search = array();
			$replace = array();
			$i = 0;
			foreach($sr as $key => $value) {
				$search[$i] = "%$key%";
				$replace[$i] = $value;
				$i++;
			}
			return str_replace($search, $replace, $content);
		}
	}
}
