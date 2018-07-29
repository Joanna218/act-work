<?
  require_once 'db.php';
  require_once 'function.php';

  $check = del_article($_POST['id']);

  if ($check) {
    //刪除成功
    echo 'yes';
  }else {
    //刪除失敗
    echo 'no';
  }
?>