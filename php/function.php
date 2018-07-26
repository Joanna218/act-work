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