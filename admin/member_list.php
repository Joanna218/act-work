<?
  require_once '../php/db.php';
  require_once '../php/function.php';

  if (!isset($_SESSION['is_login']) || !($_SESSION['is_login'])) {
    header("location: login.php");
  }

  $datas = get_all_member();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>後台管理-會員列表</title>
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
            <a href="member_add.php" class="btn btn-primary">新增會員</a>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <table class="table table-hover">
              <tr>
                <th>id</th>
                <th>帳號</th>
                <th>名稱</th>
                <th>管理動作</th>
              </tr>
              <?php if(!empty($datas)):?>
                <?php foreach ($datas as $a_data):?>
                  <tr>
                    <td><?php echo $a_data['id'];?></td>
                    <td><?php echo $a_data['username'];?></td>
                    <td><?php echo $a_data['name'];?></td>
                    <td>
                      <a href="member_edit.php?i=<?php echo $a_data['id'];?>" class="btn btn-success">編輯</a>
                      <a href="javascript:void(0);" class="btn btn-danger del_member" data-id="<?php echo $a_data['id'];?>">刪除</a>
                    </td>
                  </tr>
                <?php endforeach;?>
              <?php else :?>
                <tr>
                  <td colspan="4">無資料</td>
                </tr>
              <?php endif;?>
            </table>
          </div>
        </div>
      </div>
    </div>

    <?php include_once 'footer.php'?>

     <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

    <script>
      $(function() {
        $('.del_member').on('click', function() {
          var ckeck_confirm = confirm("你確定要刪除嗎?"),
              this_tr =$(this).parent().parent();

          if (ckeck_confirm) {
            $.ajax({
              type : "POST" ,
              url : "../php/del_member.php",
              data : {
                'id' : $(this).attr('data-id')
              },
              dataType : "html"
            }).done(function(data) {
              if (data == "yes") {
                alert('刪除成功，點擊確認移除資料');
                this_tr .fadeOut();
                }else {
                  alert('刪除成功');
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                alert('有錯誤產生，請趕快看 console log');
                console.log(jqHRX, responseText);
              });
          }
        });
        return false;
      });
    </script>
</body>

</html>