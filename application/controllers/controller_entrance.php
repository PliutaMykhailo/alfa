<?php

class Controller_Entrance extends Controller
{
	function action_index()
	{	
		$this->view->generate('entrance_view.php', 'template0_view.php');
	}
}
?>