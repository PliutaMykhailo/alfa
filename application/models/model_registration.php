<?php
require_once 'application/models/model_connect.php';
require_once 'application/utilities/prepared_statements.php';

class Model_Registration extends Model
{
  public function get_login_and_password($login, $password)
  {
    $data["registration_status"] = "";
    $this->model = new Model_Connect();
    $db = $this->model->get_connection(1);

    $id_user = $db->prepare(Prepared_Statements::$select_id_user);
    $id_user->bind_param('s', $login);
    $id_user->execute();
    $result = $id_user->get_result();
    $full = $result->fetch_array();
    $id_user = $full[0];

    if ($id_user >= 1) {
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $registration = $db->prepare(Prepared_Statements::$update_password);
      $registration->bind_param('si', $hash, $id_user);
      $registration->execute();
      mysqli_close($db);
      $data["registration_status"] = "new_password";
    } else {
      $registration_login = $db->prepare(Prepared_Statements::$insert_login_and_status);
      $registration_login->bind_param('s', $login);
      $registration_login->execute();
      $id_user = $db->prepare(Prepared_Statements::$select_id_user);
      $id_user->bind_param('s', $login);
      $id_user->execute();
      $result = $id_user->get_result();
      $full = $result->fetch_array();
      $id_user = $full[0];
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $registration = $db->prepare(Prepared_Statements::$insert_id_user_and_password);
      $registration->bind_param('is', $id_user, $hash);
      $registration->execute();
      $registration = $db->prepare(Prepared_Statements::$insert_id_user);
      $registration->bind_param('i', $id_user);
      $registration->execute();
      mysqli_close($db);
      $data["registration_status"] = "access_granted";
    }
    return $data;
  }
}
?>