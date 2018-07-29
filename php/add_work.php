<?
  require_once 'db.php';
  require_once 'function.php';

  $check = add_work($_POST['intro'], $_POST['image_path'], $_POST['video_path'], $_POST['publish']);

  if ($check) {
    //新增成功
    echo 'yes';
  }else {
    //新增失敗
    echo 'no';
  }
?>