<?php
session_start();
require_once 'application/models/model_connect.php';
require_once 'application/utilities/prepared_statements.php';

class Model_Access extends Model
{
	public function get_page()
	{
		$id_user = $_SESSION['session_id_user'];
		$dataPage = "";

		$this->model = new Model_Connect();						
		$db = $this->model->get_connection(1);

			if($id_user != NULL){
				$row = $db->prepare(Prepared_Statements::$select_access_to_pages);
				$row->bind_param('s', $id_user);
				$row->execute();
				$result = $row->get_result();
				//$full = $result->fetch_row();
				$full = $result->fetch_array();
				$page1 = $full[2];
				$page2 = $full[3];
				$page3 = $full[4];
				$page4 = $full[5];
				$page5 = $full[6];
				$page6 = $full[7];
				$page7 = $full[8];
				$page8 = $full[9];
				$page9 = $full[10];
				$page10 = $full[11];
				$page11 = $full[12];
				$page12 = $full[13];
				$page13 = $full[14];
				$page14 = $full[15];
				$page15 = $full[16];
				$page16 = $full[17];
				$page17 = $full[18];
				$page18 = $full[19];
				$page19 = $full[20];
				$page20 = $full[21];

				mysqli_close($db);

				if($page1 == 1){ $dataPage = $dataPage . '<li><a href="/base">База даних</a></li>'; }
				if($page2 == 1){ $dataPage = $dataPage . '<li><a href="/">Внесення даних</a></li>'; }
				if($page3 == 1){ $dataPage = $dataPage . ''; }
				if($page4 == 1){ $dataPage = $dataPage . ''; }
				if($page5 == 1){ $dataPage = $dataPage . ''; }
				if($page6 == 1){ $dataPage = $dataPage . ''; }
				if($page7 == 1){ $dataPage = $dataPage . ''; }
				if($page8 == 1){ $dataPage = $dataPage . ''; }
				if($page9 == 1){ $dataPage = $dataPage . ''; }
				if($page10 == 1){ $dataPage = $dataPage . ''; }
				if($page11 == 1){ $dataPage = $dataPage . '<li><a href="/registration">Реєстрація</a></li>'; }
				if($page12 == 1){ $dataPage = $dataPage . '<li><a href="/qr">QR</a></li>'; }
				if($page13 == 1){ $dataPage = $dataPage . ''; }
				if($page14 == 1){ $dataPage = $dataPage . ''; }
				if($page15 == 1){ $dataPage = $dataPage . ''; }
				if($page16 == 1){ $dataPage = $dataPage . ''; }
				if($page17 == 1){ $dataPage = $dataPage . ''; }
				if($page18 == 1){ $dataPage = $dataPage . ''; }
				if($page19 == 1){ $dataPage = $dataPage . ''; }
				if($page20 == 1){ $dataPage = $dataPage . ''; }

			}	else {
			}

		$_SESSION['main_menu'] = $dataPage;
	}
}