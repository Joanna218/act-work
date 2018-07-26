<?php
  require_once './db.php';
  require_once './function.php';

  $datas = get_publish_article();
  // print_r($datas);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>所有作品</title>
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
            <?php if(!empty($datas)):?>
              <?php foreach ($datas as $article):?>
              <!-- 拿掉html標籤 -->
              <?php $abstract = strip_tags($article['content']);
                    // 切割字串，提取摘要
                    $abstract = mb_substr($abstract, 0, 100, "UTF-8");
              ?>
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <a href="article.php?i=<?php echo $article['id'];?>">
                      <?php echo $article['title'];?>
                    </a>
                  </div>
                  <div class="panel-body">
                    <p>
                      <span class="label label-info"><?php echo $article['category'];?></span>
                      <span class="label label-danger"><?php echo $article['create_date'];?></span>
                    </p>
                    <?php echo $abstract . ".... MORE";?>
                  </div>
                </div>
              <?php endforeach;?>
            <?php endif;?>
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