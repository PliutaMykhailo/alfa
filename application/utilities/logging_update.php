<?php
session_start();
require_once 'application/models/model_connect.php';
require_once 'application/utilities/prepared_statements.php';

class Logging_Update
{
	public function update_log()
	{
		$this->model = new Model_Connect();						
		$db = $this->model->get_connection(1);

		$session_login = $_SESSION['session_login'];
		$session_id_user = $_SESSION['session_id_user'];
		$session_start_date = $_SESSION['session_start_date'];
		$session_start_time = $_SESSION['session_start_time'];
		$session_finish_date = $_SESSION['session_finish_date'];
		$session_finish_time = $_SESSION['session_finish_time'];
		$access_level = $_SESSION['access_level'];
		$main_menu = $_SESSION['main_menu'];


		$secret = $db->prepare(Prepared_Statements::$update_log);
		$secret->bind_param('sissssiss', $session_login, $session_id_user, $session_start_date, $session_start_time, $session_finish_date, $session_finish_time, $access_level, $main_menu, session_id());
		$secret->execute();
		mysqli_close($db);
	}
}

// Символы задающие тип
// i -	соответствующая переменная имеет тип integer
// d -	соответствующая переменная имеет тип double
// s -	соответствующая переменная имеет тип string
// b -	соответствующая переменная является большим двоичным объектом (blob) и будет пересылаться пакетами