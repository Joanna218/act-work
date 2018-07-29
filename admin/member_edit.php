<?
  require_once '../php/db.php';
  require_once '../php/function.php';

  if (!isset($_SESSION['is_login']) || !($_SESSION['is_login'])) {
    header("location: login.php");
  }

  $datas = get_user($_GET['i']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>後台管理-會員編輯</title>
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
          <input type="hidden" id="id" value="<?php echo $datas['id'];?>">
          <form class="form-horizontal" id="update_form">
              <div class="form-group">
                <label for="userid" class="col-sm-2 control-label">帳號</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="username" id="userid" placeholder="請輸入您的帳號..." required value="<?php echo $datas['username'];?>">
                </div>
              </div>
              <div class="form-group">
                <label for="Password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" name="password" id="Password" placeholder="請輸入您的密碼..." >
                </div>
              </div>
              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">暱稱</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="name" id="name" placeholder="請輸入您的暱稱..." required value="<?php echo $datas['name'];?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-12 text-center">
                  <button type="submit" class="btn btn-default">存檔</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php include_once 'footer.php'?>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

    <script>
      $(function() {
        $('#userid').on('keyup', function() {
          if ($(this).val() != '') {
            $.ajax({
              type : "POST",
              url : "../php/check_username.php",
              data : {
                'n' : $(this).val()
              },
              dataType : "html"
            }).done(function(data) {
              if (data == "yes") {
                //此帳號已存在，不可註冊，變紅色文字框，按鈕不能按
                $('#userid').parent().parent().removeClass('has-success').addClass('has-error');
                $('#register_form button').attr('disabled', true);
              }else {
                //可以註冊，變綠色文字框，按鈕可以按
                $('#userid').parent().parent().removeClass('has-error').addClass('has-success');
                $('#register_form button').attr('disabled', false);
              }
            }).fail(function(jqXHR, textStatus, errorThrown) {
              alert('有錯誤產生，請趕快看 console log');
              console.log(jqHRX, responseText);
            });
          }else {
            $('#userid').parent().parent().removeClass('has-error').removeClass('has-success');
            $('#register_form button').attr('disabled', false);
          }
        });


        $('#update_form').on('submit', function() {
          $.ajax({
            type : "POST",
            url : "../php/update_user.php",
            data :　{
              'id' : $('#id').val(),
              'username' : $('#userid').val(),
              'password' : $('#Password').val(),
              'name' : $('#name').val()
            },
            dataType : "html"
          }).done(function(data) {
            if (data == "yes") {
              alert('更新成功，按確認轉跳會員列表頁');
              window.location.href = '../admin/member_list.php' ;
            }else {
              alert('更新失敗'.data);
            }
          }).fail(function(jqXHR, textStatus, errorThrown) {
            alert('有錯誤產生，請趕快看 console log');
            console.log(jqHRX, responseText);
          });
          return false;
        });
      });
    </script>
</body>

</html>