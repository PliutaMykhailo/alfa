<?php
class Prepared_Statements
{
  // Used in class Model_Login
  static $select_id_user = 'SELECT `id_user` FROM `z1` WHERE `login`= ?';
  static $select_status = 'SELECT `status` FROM `z1` WHERE `id_user`= ?';
  static $select_id_user_password = 'SELECT `id_user`, `password` FROM `z2` WHERE `id_user`= ?';

  // Used in class Model_Code
  static $select_secret = 'SELECT `secret` FROM `z3` WHERE `id_user`= ?';
  static $select_access_level = 'SELECT `access_level` FROM `z3` WHERE `id_user`= ?';

  // Used in class Logging_Insert
  static $select_session_id = 'SELECT `session_id` FROM `z4_logging` WHERE `session_id`= ?';
  static $insert_session_id = 'INSERT INTO `z4_logging`(`session_id`) VALUES (?)';

  // Used in class Logging_Update
  static $update_log = 'UPDATE `z4_logging` SET `session_login`=? ,`session_id_user`= ?,`session_start_date`= ?,`session_start_time`= ?,`session_finish_date`= ?,`session_finish_time`= ?,`access_level`= ?,`main_menu`= ? WHERE `session_id`= ?'; 

  // Used in class Model_Access
  static $select_access_to_pages = 'SELECT * FROM `z3` WHERE `id_user`= ?';

  // Used in class Model_Registration
  static $insert_login_and_status = 'INSERT INTO `z1`(`login`, `status`) VALUES (?, "1")';  
  static $insert_id_user_and_password = 'INSERT INTO `z2`(`id_user`, `password`) VALUES (?, ?)';
  static $insert_id_user = 'INSERT INTO `z3`(`id_user`) VALUES (?)';
  static $update_password = 'UPDATE `z2` SET `password`=? WHERE `id_user`= ?';

  // Used in class ...
  static $select_ = '';
}
?>