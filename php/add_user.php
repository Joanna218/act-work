<?
  require_once 'db.php';
  require_once 'function.php';

  $add_user = add_user($_POST['username'], $_POST['password'], $_POST['name']);

  if ($add_user) {
    //註冊成功
    echo 'yes';
  }else {
    //註冊失敗
    echo 'no';
  }
?>