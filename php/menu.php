<?php
  $file_path = $_SERVER['PHP_SELF'];
  $file_name = basename($file_path, '.php');

  switch ($file_name) {
    case 'article_list':
      $page_index = 1;
      break;
    case 'article':
      $page_index = 1;
      break;
    case 'work_list':
      $page_index = 2;
      break;
    case 'work':
      $page_index = 2;
      break;
    case 'about':
      $page_index = 3;
      break;
    case 'register':
      $page_index = 4;
      break;
    default:
      $page_index = 0;
      break;
  }
?>

<div class="top">
      <div class="jumbotron">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <h1 class="text-center">Art作品集</h1>
              <ul class="nav nav-pills">
                <li role="presentation">
                  <a href="./">首頁</a>
                </li>
                <li role="presentation" <?php echo ($page_index == 1)?"class='active'":"class=''"?>>
                  <a href="article_list.php">所有文章</a>
                </li>
                <li role="presentation" <?php echo ($page_index == 2)?"class='active'":"class=''"?>>
                  <a href="work_list.php">所有作品</a>
                </li>
                <li role="presentation" <?php echo ($page_index == 3)?"class='active'":"class=''"?>>
                  <a href="about.php">關於我們</a>
                </li>
                <li role="presentation" <?php echo ($page_index == 4)?"class='active'":"class=''"?>>
                  <a href="register.php">註冊</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>