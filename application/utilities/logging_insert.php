<?php
session_start();
require_once 'application/models/model_connect.php';
require_once 'application/utilities/prepared_statements.php';

class Logging_Insert
{
	public function insert_session_id_in_log()
	{
		$this->model = new Model_Connect();						
		$db = $this->model->get_connection(1);

		$sid = $db->prepare(Prepared_Statements::$select_session_id);
		$sid->bind_param('s', session_id());
		$sid->execute();
		$result = $sid->get_result();
		$full = $result->fetch_row();

		if($full != NULL){
			mysqli_close($db);
		} else {
		$secret = $db->prepare(Prepared_Statements::$insert_session_id);
		$secret->bind_param('s', session_id());
		$secret->execute();
		mysqli_close($db);
		}
	}
}