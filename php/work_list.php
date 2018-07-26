  <?php
    require_once './db.php';
    require_once './function.php';

    $datas = get_publish_work();
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
      <?php include_once 'menu.php'?>

      <div class="content">
        <div class="container">
          <div class="row">

              <?php if(!empty($datas)):?>
                <?php foreach ($datas as $a_work):?>
                  <div class="col-xs-12 col-sm-4">
                    <div class="thumbnail">
                      <?php if($a_work['image_path']):?>

                          <img src="<?php echo $a_work['image_path'];?>" alt="" class="img-responsive" alt="Responsive image">

                      <?php else:?>
                      <div class="embed-responsive embed-responsive-16by9">
                        <video src="<?php echo $a_work['video_path'];?>" controls></video>
                      </div>
                      <?php endif;?>
                      <div class="caption">
                        <h3>Thumbnail label</h3>
                        <p>...</p>
                        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                      </div>
                    </div>
                  </div>
                <?php endforeach;?>
              <?else:?>
                <h1>沒有作品</h1>
              <?php endif;?>

          </div>
        </div>
      </div>

      <?php include_once 'footer.php'?>
  </body>

  </html>