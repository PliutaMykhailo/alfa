<?php

class Model_Connect extends Model
{
  public function get_connection($i)
	{
    $this->i = $i;

    $host = '';
    $user = '';
    $password = '';
    $database = '';

    if($i==1){
      $host = '';
      $user = '';
      $password = '';
      $database = '';
    } elseif($i==2){
      $host = '';
      $user = '';
      $password = '';
      $database = '';
    }
    
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $db = new mysqli($host, $user, $password, $database) or die("Ошибка " . mysqli_error($db));
    if (!mysqli_set_charset($db, "utf8")) {
        mysqli_close($db);
        exit('');
        } else {
          return $db;
        }
  }
}
?>
