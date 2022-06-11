<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'application/models/model_access.php';
require_once 'application/utilities/logging_update.php';
require_once 'vendor/phpgangsta/googleauthenticator/PHPGangsta/GoogleAuthenticator.php';

class Controller_Code extends Controller
{
	function action_index()
	{
		$dataCode["code_status"] = "";
		$dataAccess["access_level"] = "";

		$id_user = $_SESSION['session_id_user'];

	if(isset($_POST['code']))
	{
		$code = $_POST['code'];

		$this->model = new Model_Code();						
		$secret = $this->model->get_code($id_user);

		$ga = new PHPGangsta_GoogleAuthenticator();
		$checkResult = $ga->verifyCode($secret, $code, 2);    // 2 = 2*30sec clock tolerance
		if ($checkResult) {
			$access_level = $this->model->get_access_level($id_user);
			$_SESSION['access_level'] = $access_level;
			if($_SESSION['access_level'] >= 1){
				$this->log = new Model_Access();
				$this->log->get_page();
				$this->log = new Logging_Update();
				$this->log->update_log();
				header('Location:/base');
			} else {
				$dataCode["code_status"] = "access_denied";
			}
		} else {
			$dataCode["code_status"] = "access_denied";
		}		
	} else {
		$dataCode["code_status"] = "";
	}
		$this->view->generate('code_view.php', 'template0_view.php', $dataCode);
	}	
}
?>