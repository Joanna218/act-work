<?
  require_once '../php/db.php';

  if (isset($_SESSION['is_login']) && ($_SESSION['is_login'])) {
    header("location: index.php");
  }
?>

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

    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-sm-offset-3">
            <h1 class="text-center">會員登入</h1>
            <form class="form-horizontal" id="login_form" method="post">
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
                <div class="col-xs-12 text-center">
                  <button type="submit" class="btn btn-default">登入</button>
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

        $('#login_form').on('submit', function() {
          $.ajax({
              type : "POST",
              url : "../php/verify_user.php",
              data :　{
                'username' : $('#userid').val(),
                'password' : $('#Password').val()
              },
              dataType : "html"
            }).done(function(data) {
              if (data == "yes") {
                window.location.href = 'index.php' ;
              }else {
                alert('登入失敗，請確認您的帳號密碼是否正確。');
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