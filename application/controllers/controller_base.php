<?php
//session_start();

class Controller_Base extends Controller
{

	function __construct()
	{
		$this->model = new Model_Base();
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();

		$this->view->generate('base_view.php', 'template_view.php', $data); // delete


		//if($_SESSION['access_level'] >= 1)
		//{	
		//$this->view->generate('base_view.php', 'template_view.php', $data);
	 	//} else {
		//	session_destroy();
		//	header('Location:/');
		//}
	}
}
?>