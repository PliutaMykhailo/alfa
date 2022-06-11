<?php
session_start();

class Controller_Registration extends Controller
{
  function action_index()
  {
    if($_SESSION['access_level'] >= 5){

    $data["registration_status"] = "";

		if(isset($_POST['login']) && isset($_POST['password'])) {
			$login = $_POST['login'];
			$password = $_POST['password'];

      $this->model = new Model_Registration();
      $full = $this->model->get_login_and_password($login, $password);
      if ($full["registration_status"] == "access_granted") {
        header('Location:/qr');
      } elseif ($full["registration_status"] == "new_password") {
        $data["registration_status"] = "new_password";
      } else {
        $data["registration_status"] = "access_denied";
      }
    } else {
      $data["registration_status"] = "";
    }

    $this->view->generate('registration_view.php', 'template_view.php', $data);
  } else {
    include "application/controllers/controller_404.php";
    $Er = new Controller_404();
    $Er->action_index();
  }
}
}
?>