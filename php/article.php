<?php
  require_once './db.php';
  require_once './function.php';

  $article = get_article($_GET['i']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $article['title'];?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">

</head>

<body>
  <div class="wrap">
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
                <li role="presentation" class="active" >
                  <a href="acticle_list.php">所有文章</a>
                </li>
                <li role="presentation">
                  <a href="work_list.php">所有作品</a>
                </li>
                <li role="presentation">
                  <a href="about.php">關於我們</a>
                </li>
                <li role="presentation">
                  <a href="register.php">註冊</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <h1><?php echo $article['title'];?></h1>
            <hr>
            <?php echo $article['content'];?>
          </div>
        </div>
      </div>
    </div>

    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <p class="text-center">&copy; <?php echo date("Y");?> Art公司版權所有</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>