<?php
require_once 'application/models/model_connect.php';
require_once 'application/utilities/prepared_statements.php';

class Model_Login extends Model
{
	public string $login;

	public function get_pass($login)
	{
		//$this->login = $login;

		$id_user = NULL;
		$data["login_status"] = "";
		
		$this->model = new Model_Connect();						
		$db = $this->model->get_connection(1);
		
		$keysa = $db->prepare(Prepared_Statements::$select_id_user);
		$keysa->bind_param('s', $login);
		$keysa->execute();
		$result = $keysa->get_result();
		$full = $result->fetch_row();

			if($full != NULL){
				$id_user = $full[0];
				$status = $db->prepare(Prepared_Statements::$select_status);
				$status->bind_param('s', $id_user);
				$status->execute();
				$result = $status->get_result();
				$full = $result->fetch_array();
				$status = $full[0];

				if($status==1){
					$status = $db->prepare(Prepared_Statements::$select_id_user_password);
					$status->bind_param('s', $id_user);
					$status->execute();
					$result = $status->get_result();
					$data = $result->fetch_array();
					mysqli_close($db);
				} else {
					mysqli_close($db);
					$data["login_status"] = "access_denied";
				}
			} else {
				mysqli_close($db);
				$data["login_status"] = "access_denied";
			}
		return $data;
	}
}