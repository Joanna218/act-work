<?
  require_once 'db.php';
  require_once 'function.php';

  $check = update_work($_POST['id'], $_POST['intro'], $_POST['image_path'], $_POST['video_path'], $_POST['publish']);

  if ($check) {
    //更新成功
    echo 'yes';
  }else {
    //更新失敗
    echo 'no';
  }
?>