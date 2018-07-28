<?
  require_once '../php/db.php';
  require_once '../php/function.php';

  if (!isset($_SESSION['is_login']) || !($_SESSION['is_login'])) {
    header("location: login.php");
  }

  $datas = get_all_article();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>後台管理-文章列表</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="wrap">
    <?php include_once 'menu.php'?>

    <div class="content">
      <div class="container">
        <div class="row add_btn_area">
          <div class="col-xs-12">
            <a href="article_add" class="btn btn-primary">新增文章</a>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <table class="table table-hover">
              <tr>
                <th>分類</th>
                <th>標題</th>
                <th>是否發布</th>
                <th>建立時間</th>
                <th>管理動作</th>
              </tr>
              <?php if(!empty($datas)):?>
                <?php foreach ($datas as $a_data):?>
                  <tr>
                    <td><?php echo $a_data['category'];?></td>
                    <td><?php echo $a_data['title'];?></td>
                    <td><?php echo ($a_data['publish'])?"發布中":"下架中";?></td>
                    <td><?php echo $a_data['create_date'];?></td>
                    <td>
                      <a href="article_edit.php?i=<?php echo $a_data['id'];?>" class="btn btn-success">編輯</a>
                      <a href="javascript:void(0);" class="btn btn-danger del_article" data-id="<?php echo $a_data['id'];?>">刪除</a>
                    </td>
                  </tr>
                <?php endforeach;?>
              <?php else :?>
                <tr>
                  <td colspan="5">無資料</td>
                </tr>
              <?php endif;?>
            </table>
          </div>
        </div>
      </div>
    </div>

    <?php include_once 'footer.php'?>
</body>

</html>