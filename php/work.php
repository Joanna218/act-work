<?php
  require_once './db.php';
  require_once './function.php';

  $work = get_work($_GET['i']);
  $site_work = (strip_tags($work['intro']));
  $site_work = mb_strcut($site_work, 0, 11, "UTF-8"). "...";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $site_work;?></title>
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
          <?php if(!empty($work)):?>
            <?php if($work['image_path']):?>
                <img src="<?php echo $work['image_path'];?>" alt="" class="img-responsive">
            <?php else:?>
              <div class="embed-responsive embed-responsive-16by9">
                <video src="<?php echo $work['video_path'];?>" controls></video>
              </div>
            <?php endif;?>
            <div class="caption">
              <p><?php echo $work['intro'];?></p>
            </div>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>

    <?php include_once 'footer.php'?>
</body>

</html>