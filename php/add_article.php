<?
  require_once 'db.php';
  require_once 'function.php';

  $check = add_article($_POST['title'], $_POST['category'], $_POST['content'], $_POST['publish']);

  if ($check) {
    //註冊成功
    echo 'yes';
  }else {
    //註冊失敗
    echo 'no';
  }
?>