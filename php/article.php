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
    <?php include_once 'menu.php'?>

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

    <?php include_once 'footer.php'?>
</body>

</html>