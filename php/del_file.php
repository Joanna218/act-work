<?php
  if (file_exists($_POST['file'])) {

    if (unlink($_POST['file'])) {
      //刪除成功
      echo 'yes';
    }else {
      //刪除失敗
      echo 'no';
    }
  }else {
    echo "檔案不存在";
  }
?>