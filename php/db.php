<?php
  @session_start();
  $host = 'localhost';
  $dbuser = 'root';
  $dbpwd = 'joanna10544218';
  $dbname = 'art_work';

  $_SESSION['link'] = mysqli_connect($host, $dbuser, $dbpwd, $dbname);
  if ($_SESSION['link']) {
    mysqli_query($_SESSION['link'], "SET NAME utf8");
    // echo "已正確連線";
  }else {
    echo "無法連線Mysql資料庫：".mysqli_connect_error();
  }