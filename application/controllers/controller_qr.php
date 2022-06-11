<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'vendor/phpgangsta/googleauthenticator/PHPGangsta/GoogleAuthenticator.php';

class Controller_QR extends Controller
{
	function action_index()
	{
    if($_SESSION['access_level'] >= 5){

		$dataCode["code_status"] = "";

		$ga = new PHPGangsta_GoogleAuthenticator();
		$secret = $ga->createSecret();
		echo $secret."\n\n";

		$qrCodeUrl = $ga->getQRCodeGoogleUrl('Blog', $secret);
		echo "Google Charts URL for the QR-Code: ".$qrCodeUrl."\n\n";

//		$oneCode = $ga->getCode($secret);
//		echo "Checking Code '$oneCode' and Secret '$secret':\n";
		


		$this->view->generate('qr_view.php', 'template_view.php', $dataCode);

		}	else {
			include "application/controllers/controller_404.php";
			$Er = new Controller_404();
			$Er->action_index();
		}
	}
}
?>