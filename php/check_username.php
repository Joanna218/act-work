<?
  require_once 'db.php';
  require_once 'function.php';

  $check = check_has_username($_POST['n']);

  if ($check) {
    //已有人註冊
    echo 'yes';
  }else {
    //尚未有人註冊
    echo 'no';
  }
?>