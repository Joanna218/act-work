<?
  require_once 'db.php';
  require_once 'function.php';

  $update_user = update_user($_POST['id'], $_POST['username'], $_POST['password'], $_POST['name']);

  if ($update_user) {
    //更新成功
    echo 'yes';
  }else {
    //更新失敗
    echo 'no';
  }
?>