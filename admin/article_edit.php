<?
  require_once '../php/db.php';
  require_once '../php/function.php';

  if (!isset($_SESSION['is_login']) || !($_SESSION['is_login'])) {
    header("location: login.php");
  }

  $datas = get_edit_article($_GET['i']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>後台管理-文章編輯</title>
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
            <form id="article">
              <input type="hidden" id="id" value="<?php echo $datas['id'];?>">
              <div class="form-group">
                <label for="title">標題</label>
                <input type="text" class="form-control" id="title" placeholder="輸入標題" value="<?php echo $datas['title'];?>">
              </div>
              <div class="form-group">
                <label for="category">分類</label>
                <select id="category" class="form-control">
                  <option value="新聞" value="<?php echo ($datas['category']=="新聞") ? 'selected' : '';?>">新聞</option>
                  <option value="心得" value="<?php echo ($datas['category']=="心得") ? 'selected' : '';?>">心得</option>
                </select>
              </div>
              <div class="form-group">
                <label for="content">內文</label>
                <textarea id="content" class="form-control" rows="10"><?php echo $datas['content'];?></textarea>
              </div>
              <div class="form-group">
                <label class="radio-inline">
                  <input type="radio" name="publish" value="1" <?php echo ($datas['publish'] == 1) ? 'checked' : '' ;?>>發布
                </label>
                <label class="radio-inline">
                  <input type="radio" name="publish" value="0" <?php echo ($datas['publish'] == 0) ? 'checked' : '' ;?>>不發布
                </label>
              </div>
              <button type="submit" class="btn btn-default">存檔</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php include_once 'footer.php'?>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

    <script>
      $(function() {

          $('#article').on('submit', function() {
            if ($('#title').val() == '' || $('#category').val() == '') {
              alert('請填妥標題或內文!');
            }else {
              $.ajax({
                type : "POST",
                url : "../php/update_article.php",
                data :　{
                  'id' : $('#id').val(),
                  'title' : $('#title').val(),
                  'category' : $('#category').val(),
                  'content' : $('#content').val(),
                  'publish' : $('input[name="publish"]:checked').val()
                },
                dataType : "html"
              }).done(function(data) {
                if (data == "yes") {
                  alert('更新成功，點擊確認回到列表頁');
                  window.location.href = 'article_list.php' ;
                }else {
                  alert('更新失敗');
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