<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>註冊</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="wrap">
    <?php include_once 'menu.php'?>

    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-sm-offset-3">
            <form class="form-horizontal" id="register_form" method="post" action="../php/add_member.php">
              <div class="form-group">
                <label for="userid" class="col-sm-2 control-label">帳號</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="username" id="userid" placeholder="請輸入您的帳號..." required>
                </div>
              </div>
              <div class="form-group">
                <label for="Password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" name="password" id="Password" placeholder="請輸入您的密碼..." required>
                </div>
              </div>
              <div class="form-group">
                <label for="confrim_password" class="col-sm-2 control-label">確認密碼</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="confirm_password" placeholder="請再次輸入您的密碼..." required>
                </div>
              </div>
              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">暱稱</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="name" id="name" placeholder="請輸入您的暱稱..." required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-12 text-center">
                  <button type="submit" class="btn btn-default">確認註冊</button>
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


        $('#register_form').on('submit', function() {
          if ($('#Password').val() != $('#confirm_password').val()) {
            //密碼部正確
            alert('密碼有錯誤，請再次確認');
            $('#Password').parent().parent().addClass('has-error');
            $('#confirm_password').parent().parent().addClass('has-error');
            return false;
          }else {
            //密碼正確，送出表單
            $.ajax({
              type : "POST",
              url : "../php/add_user.php",
              data :　{
                'username' : $('#userid').val(),
                'password' : $('#Password').val(),
                'name' : $('#name').val()
              },
              dataType : "html"
            }).done(function(data) {
              if (data == "yes") {
                alert('註冊成功，按確認轉跳登入頁面');
                window.location.href = '../admin/index.php' ;
              }else {
                alert('註冊失敗，請重新註冊');
              }
            }).fail(function(jqXHR, textStatus, errorThrown) {
              alert('有錯誤產生，請趕快看 console log');
              console.log(jqHRX, responseText);
            });
          }
          return false;
        });
      });
    </script>
</body>

</html>