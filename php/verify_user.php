<?
  require_once 'db.php';
  require_once 'function.php';

  $check = verify_user($_POST['username'], $_POST['password']);
  if ($check) {
    // 登入成功
    echo 'yes';
  }else {
    //登入失敗
    echo 'no';
  }
?>