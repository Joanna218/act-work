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