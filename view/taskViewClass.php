<?php

namespace view{
	
	class TaskView extends View{

		protected function newTask(){
			$error = isset($this->data['error']) ? $this->data['error'] : '';
			$userData = isset($this->data['userData']) ? $this->data['userData'] : '';
			$sr['ERROR-EMPTY'] =  '';
			$sr['ERROR-EMAIL'] = '';
			if ($error == 'empty') $sr['ERROR-EMPTY'] = file_get_contents('tpl/error-empty.tpl');
			elseif ($error == 'email') $sr['ERROR-EMAIL'] = file_get_contents('tpl/error-email.tpl');

			$sr['TITLE'] = 'Новая задача';
			$sr['TASK-ACTION'] = 'saveNewTask';
			$sr['HIDDEN-INPUT'] = '';
			$sr['USER-NAME'] = '';
			$sr['USER-EMAIL'] = '';
			$sr['TASK'] = '';
			if ( (isset($userData['user_name']) && ($userData['user_name'] !== '') ) ) $sr['USER-NAME'] = $userData['user_name'];
			if ( (isset($userData['user_email']) && ($userData['user_email'] !== '') ) ) $sr['USER-EMAIL'] = $userData['user_email'];	
			if ( (isset($userData['user_task']) && ($userData['user_task'] !== '') ) ) $sr['TASK'] = $userData['user_task'];

			return $this->getReplaceContent($sr, 'tpl/task.tpl');
		}

		protected function editTask(){
			if ($this->isAuth) {
				$error = isset($this->data['error']) ? $this->data['error'] : '';
				$userData = isset($this->data['userData']) ? $this->data['userData'] : '';
				$sr['ERROR-EMPTY'] =  '';
				$sr['ERROR-EMAIL'] = '';
				if ($error == 'empty') $sr['ERROR-EMPTY'] = file_get_contents('tpl/error-empty.tpl');
			elseif ($error == 'email') $sr['ERROR-EMAIL'] = file_get_contents('tpl/error-email.tpl');
				$sr['TITLE'] = 'Редактирование задачи';
				$sr['TASK-ACTION'] = 'saveEditedTask';
				$sr['USER-NAME'] = $userData['user_name'];
				$sr['USER-EMAIL'] = $userData['user_email'];
				$sr['TASK'] = $userData['user_task'];
				$sr['TASK-ID'] = $userData['id'];
				$sr['HIDDEN-INPUT'] = $this->getReplaceContent($sr, 'tpl/hidden-inputs.tpl');
				return $this->getReplaceContent($sr, 'tpl/task.tpl');
			}
			else {
				$_SESSION['message'] = 'noAuth';
				header("Location: /");
			}
			

			
		}

	}
}
