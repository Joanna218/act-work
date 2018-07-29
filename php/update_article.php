<?
  require_once 'db.php';
  require_once 'function.php';

  $check = update_article($_POST['id'], $_POST['title'], $_POST['category'], $_POST['content'], $_POST['publish']);

  if ($check) {
    //更新成功
    echo 'yes';
  }else {
    //更新失敗
    echo 'no';
  }
?>