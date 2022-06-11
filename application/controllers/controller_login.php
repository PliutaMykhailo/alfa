<?php

class Controller_Login extends Controller
{
	function action_index()
	{
			$data["login_status"] = "";

		if(isset($_POST['login']) && isset($_POST['password']))
		{
			$login = $_POST['login'];
			$password = $_POST['password'];
		
			$this->model = new Model_Login();						
			$full = $this->model->get_pass($login);

			if(count($full) > 1){
				$id_user = $full[0];
				$hash = $full[1];

				if (password_verify($password, $hash)) 
				{
						session_start();										
						$_SESSION['session_login'] = $login; echo session_id();
						$_SESSION['session_id_user'] = $id_user;
						$_SESSION['session_start_date'] = date("Y-m-d",time());
						$_SESSION['session_start_time'] = date("H:i:s",time());
						$_SESSION['session_finish_date'] = '';
						$_SESSION['session_finish_time'] = '';
						$_SESSION['main_menu'] = '';
						require_once 'application/utilities/logging_insert.php';
						$this->log = new Logging_Insert();
						$full = $this->log->insert_session_id_in_log();
						header('Location:/code');
				} else {
					$data["login_status"] = "access_denied";
				}
			} else {
				$data["login_status"] = "access_denied";
			}
		} else {
			$data["login_status"] = "";
		}
		
		$this->view->generate('login_view.php', 'template0_view.php', $data);
	}	
}
?>