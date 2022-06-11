<?php
session_start();
require_once 'vendor/phpgangsta/googleauthenticator/PHPGangsta/GoogleAuthenticator.php';

class Controller_Registration extends Controller
{
  function action_index()
  {
    if($_SESSION['access_level'] >= 5){

    $data["registration_status"] = "";
    $data["secret"] = "";
    $data["qrCodeUrl"] = "";

		if(isset($_POST['login']) && isset($_POST['password'])) {
			$login = $_POST['login'];
			$password = $_POST['password'];

      $this->model = new Model_Registration();
      $full = $this->model->get_login_and_password($login, $password);
      if ($full["registration_status"] == "access_granted") {
         
        $ga = new PHPGangsta_GoogleAuthenticator(); //--
        $secret = $ga->createSecret();
        $data["secret"] = $secret;
        $qrCodeUrl = $ga->getQRCodeGoogleUrl('Blog', $secret);
        $data["qrCodeUrl"] = $qrCodeUrl;  //--


        //header('Location:/qr');
        
      } elseif ($full["registration_status"] == "new_password") {

        $ga = new PHPGangsta_GoogleAuthenticator(); //--
        $secret = $ga->createSecret();
        $data["secret"] = $secret;
        $qrCodeUrl = $ga->getQRCodeGoogleUrl('Blog', $secret);
        $data["qrCodeUrl"] = $qrCodeUrl;  //--




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