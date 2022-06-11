<?php
require_once 'application/models/model_connect.php';
require_once 'application/utilities/prepared_statements.php';

class Model_Code extends Model
{
	public $id_user;
	
	public function get_code($id_user)
	{
		$this->id_user = $id_user;

		$dataCode["code_status"] = "";

		$this->model = new Model_Connect();						
		$db = $this->model->get_connection(2);

			if($id_user != NULL){
				$secret = $db->prepare(Prepared_Statements::$select_secret);
				$secret->bind_param('s', $id_user);
				$secret->execute();
				$result = $secret->get_result();
				$full = $result->fetch_array();
				$dataCode = $full[0];
				mysqli_close($db);
			} else {
				$dataCode["code_status"] = "access_denied";
			}

		return $dataCode;
	}

	public function get_access_level($id_user)
	{
		$this->id_user = $id_user;

		$dataAccess["access_level"] = "";

		$this->model = new Model_Connect();						
		$db = $this->model->get_connection(1);
		
			if($id_user != NULL){
				$access_level = $db->prepare(Prepared_Statements::$select_access_level);
				$access_level->bind_param('s', $id_user);
				$access_level->execute();
				$result = $access_level->get_result();
				$full = $result->fetch_array();
				$dataAccess = $full[0];
				mysqli_close($db);
			} else {
				$dataAccess["access_level"] = "access_denied";
			}

		return $dataAccess;
	}
}