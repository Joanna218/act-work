<?php
  @session_start();
  //取得發布文章
  function get_publish_article() {
    //儲存要發布的文章內容
    $datas = array();
    $sql = "Select * From `article` where `publish` = 1" ;
    $query = mysqli_query($_SESSION['link'], $sql);

    if ($query) {
      //SQL執行成功
      if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
          $datas[] = $row;
        }
      }
    }else {
      //SQL執行失敗
      echo "{$sql}語法請求失敗：".mysqli_connect_error();
    }
    return $datas;
  }

  function get_article($id) {
    $result = null ;
    $sql = "Select * From `article` where `publish` = 1 AND `id` = {$id}" ;
    $query = mysqli_query($_SESSION['link'], $sql);

    if ($query) {
      //SQL執行成功
      $result = mysqli_fetch_assoc($query);
    }else {
      //SQL執行失敗
      echo "{$sql}語法請求失敗：".mysqli_connect_error();
    }
    return $result;
  }

  function get_publish_work() {
    //儲存要發布的文章內容
    $datas = array();
    $sql = "Select * From `works` where `publish` = 1" ;
    $query = mysqli_query($_SESSION['link'], $sql);

    if ($query) {
      //SQL執行成功
      if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
          $datas[] = $row;
        }
      }
    }else {
      //SQL執行失敗
      echo "{$sql}語法請求失敗：".mysqli_connect_error();
    }
    return $datas;
  }

  function get_work($id) {
    $result = null ;
    $sql = "Select * From `works` where `publish` = 1 AND `id` = {$id}" ;
    $query = mysqli_query($_SESSION['link'], $sql);

    if ($query) {
      //SQL執行成功
      $result = mysqli_fetch_assoc($query);
    }else {
      //SQL執行失敗
      echo "{$sql}語法請求失敗：".mysqli_connect_error();
    }
    return $result;
  }

  function check_has_username($username) {
    $result = null ;
    $sql = "Select * From `user` where `username` = '{$username}'" ;
    $query = mysqli_query($_SESSION['link'], $sql);

    if ($query) {
      //SQL執行成功
      if (mysqli_num_rows($query) >= 1) {
        $result = true ;
      }
    }else {
      //SQL執行失敗
      echo "{$sql}語法請求失敗：".mysqli_connect_error();
    }
    return $result;
  }

  function add_user($username, $password, $name) {
    $result = null ;
    $password = md5($password);
    $sql = "INSERT INTO `user` (`username`, `password`, `name`)
                        VALUE ('{$username}', '{$password}', '{$name}')" ;
    $query = mysqli_query($_SESSION['link'], $sql);

    if ($query) {
      //SQL執行成功
      if (mysqli_affected_rows($_SESSION['link']) == 1 ) {
        $result = true ;
      }
    }else {
      //SQL執行失敗
      echo "{$sql}語法請求失敗：".mysqli_connect_error();
    }
    return $result;
  }

  function verify_user($username, $password) {
    $result = null ;
    $password = md5($password);
    $sql = "Select * From `user` where `username` = '{$username}' AND `password` = '{$password}'" ;
    $query = mysqli_query($_SESSION['link'], $sql);

    if ($query) {
      //SQL執行成功
      if (mysqli_num_rows($query) == 1) {
        $user = mysqli_fetch_assoc($query);
        $_SESSION['is_login'] = true;
        $_SESSION['login_user_id'] = $user['id'];
        $result = true ;
      }
    }else {
      //SQL執行失敗
      echo "{$sql}語法請求失敗：".mysqli_connect_error();
    }
    return $result;
  }

  //後台管理

  function get_all_article() {
    //儲存要發布的文章內容
    $datas = array();
    $sql = "Select * From `article`" ;
    $query = mysqli_query($_SESSION['link'], $sql);

    if ($query) {
      //SQL執行成功
      if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
          $datas[] = $row;
        }
      }
    }else {
      //SQL執行失敗
      echo "{$sql}語法請求失敗：".mysqli_connect_error();
    }
    return $datas;
  }

  function add_article($title, $category, $content, $publish) {
    $result = null ;
    $create_date = date('Y-m-d H:i:s');
    $creater_id = $_SESSION['login_user_id'];

    $sql = "INSERT INTO `article` (`title`, `category`, `content`, `publish`, `create_date`, `creater_id`)
                        VALUE ('{$title}', '{$category}', '{$content}', {$publish}, '{$create_date}', {$creater_id})" ;
    $query = mysqli_query($_SESSION['link'], $sql);

    if ($query) {
      //SQL執行成功
      if (mysqli_affected_rows($_SESSION['link']) == 1 ) {
        $result = true ;
      }
    }else {
      //SQL執行失敗
      echo "{$sql}語法請求失敗：".mysqli_connect_error();
    }
    return $result;
  }

  function get_edit_article($id) {
    $result = null ;
    $sql = "Select * From `article` where `id` = {$id}" ;
    $query = mysqli_query($_SESSION['link'], $sql);

    if ($query) {
      //SQL執行成功
      $result = mysqli_fetch_assoc($query);
    }else {
      //SQL執行失敗
      echo "{$sql}語法請求失敗：".mysqli_connect_error();
    }
    return $result;
  }

  function update_article($id, $title, $category, $content, $publish) {
    $result = null ;
    $modify_date = date('Y-m-d H:i:s');

    $sql = "UPDATE `article` SET
                    `id` = {$id},
                    `title` = '{$title}',
                    `category` = '{$category}',
                    `content` = '{$content}',
                    `publish` = {$publish},
                    `modify_date` = '{$modify_date}'
                    WHERE `id` = {$id}" ;
    $query = mysqli_query($_SESSION['link'], $sql);

    if ($query) {
      //SQL執行成功
      if (mysqli_affected_rows($_SESSION['link']) == 1 ) {
        $result = true ;
      }
    }else {
      //SQL執行失敗
      echo "{$sql}語法請求失敗：".mysqli_connect_error();
    }
    return $result;
  }

  function del_article($id) {
    $result = null ;

    $sql = "DELETE FROM `article` WHERE `id` = {$id}" ;
    $query = mysqli_query($_SESSION['link'], $sql);

    if ($query) {
      //SQL執行成功
      if (mysqli_affected_rows($_SESSION['link']) == 1 ) {
        $result = true ;
      }
    }else {
      //SQL執行失敗
      echo "{$sql}語法請求失敗：".mysqli_connect_error();
    }
    return $result;
  }

  function get_all_member() {
    //儲存要發布的文章內容
    $datas = array();
    $sql = "Select * From `user`" ;
    $query = mysqli_query($_SESSION['link'], $sql);

    if ($query) {
      //SQL執行成功
      if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
          $datas[] = $row;
        }
      }
    }else {
      //SQL執行失敗
      echo "{$sql}語法請求失敗：".mysqli_connect_error();
    }
    return $datas;
  }

  function del_member($id) {
    $result = null ;

    $sql = "DELETE FROM `user` WHERE `id` = {$id}" ;
    $query = mysqli_query($_SESSION['link'], $sql);

    if ($query) {
      //SQL執行成功
      if (mysqli_affected_rows($_SESSION['link']) == 1 ) {
        $result = true ;
      }
    }else {
      //SQL執行失敗
      echo "{$sql}語法請求失敗：".mysqli_connect_error();
    }
    return $result;
  }

  function get_user($id) {
    $result = null ;
    $sql = "Select * From `user` where `id` = {$id}" ;
    $query = mysqli_query($_SESSION['link'], $sql);

    if ($query) {
      //SQL執行成功
      $result = mysqli_fetch_assoc($query);
    }else {
      //SQL執行失敗
      echo "{$sql}語法請求失敗：".mysqli_connect_error();
    }
    return $result;
  }

  function update_user($id, $username, $password, $name) {
    $result = null ;
    $password_sql = '';

    if ($password_sql != '') {
      $password = md5($password);
      $password_sql = "`password` = '{$password}' ," ;
    }

    $sql = "UPDATE `user` SET
                    `username` = '{$username}',
                    {$password_sql}
                    `name` = '{$name}'
                    WHERE `id` = {$id}" ;
    $query = mysqli_query($_SESSION['link'], $sql);

    if ($query) {
      //SQL執行成功
      if (mysqli_affected_rows($_SESSION['link']) == 1 ) {
        $result = true ;
      }
    }else {
      //SQL執行失敗
      echo "{$sql}語法請求失敗：".mysqli_connect_error();
    }
    return $result;
  }

  function get_all_work() {
    //儲存要發布的文章內容
    $datas = array();
    $sql = "Select * From `works`" ;
    $query = mysqli_query($_SESSION['link'], $sql);

    if ($query) {
      //SQL執行成功
      if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
          $datas[] = $row;
        }
      }
    }else {
      //SQL執行失敗
      echo "{$sql}語法請求失敗：".mysqli_connect_error();
    }
    return $datas;
  }

  function add_work($intro, $image_path, $video_path, $publish) {
    $result = null ;
    $upload_date = date('Y-m-d H:i:s');
    $create_user_id = $_SESSION['login_user_id'];

    //處理圖片路徑
    $image_path_value = "'{$image_path}'";
    if($image_path == '') $image_path_value = 'NULL';

    //處理影片路徑
    $video_path_value = "'{$video_path}'";
    if($video_path == '') $video_path_value = 'NULL';

    $sql = "INSERT INTO `works` (`intro`, `image_path`, `video_path`, `publish`, `upload_date`, `create_user_id`)
                        VALUE ('{$intro}', {$image_path_value}, {$video_path_value}, {$publish}, '{$upload_date}', {$create_user_id})" ;
    $query = mysqli_query($_SESSION['link'], $sql);

    if ($query) {
      //SQL執行成功
      if (mysqli_affected_rows($_SESSION['link']) == 1 ) {
        $result = true ;
      }
    }else {
      //SQL執行失敗
      echo "{$sql}語法請求失敗：".mysqli_connect_error();
    }
    return $result;
  }

  function get_edit_work($id) {
    $result = null ;
    $sql = "Select * From `works` where `id` = {$id}" ;
    $query = mysqli_query($_SESSION['link'], $sql);

    if ($query) {
      //SQL執行成功
      $result = mysqli_fetch_assoc($query);
    }else {
      //SQL執行失敗
      echo "{$sql}語法請求失敗：".mysqli_connect_error();
    }
    return $result;
  }

  function update_work($id, $intro, $image_path, $video_path, $publish) {
    $result = null ;

    //比對新資料與舊資料是否相同，若不同砍掉舊資料
    $work = get_edit_work($id);
    //圖片
    if (file_exists($work['image_path'])) {
      if ($image_path != $work['image_path']) {
        unlink($work['image_path']);
      }
    }

    //影片
    if (file_exists($work['video_path'])) {
      if ($video_path != $work['video_path']) {
        unlink($work['video_path']);
      }
    }

    $image_path_sql = "`image_path` = '{$image_path}' ,";
    if($image_path == '') $image_path_sql = "`image_path` = NULL ,";

    $video_path_sql = "`image_path` = '{$video_path}' ,";
    if($video_path == '') $video_path_sql = "`video_path` = NULL ,";

    $sql = "UPDATE `works` SET
                    `id` = {$id},
                    `intro` = '{$intro}',
                    {$image_path_sql}
                    {$video_path_sql}
                    `publish` = {$publish}
                    WHERE `id` = {$id}" ;
    $query = mysqli_query($_SESSION['link'], $sql);

    if ($query) {
      //SQL執行成功
      if (mysqli_affected_rows($_SESSION['link']) == 1 ) {
        $result = true ;
      }
    }else {
      //SQL執行失敗
      echo "{$sql}語法請求失敗：".mysqli_connect_error();
    }
    return $result;
  }