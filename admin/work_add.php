<?
  require_once '../php/db.php';
  require_once '../php/function.php';

  if (!isset($_SESSION['is_login']) || !($_SESSION['is_login'])) {
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>後台管理-作品新增</title>
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
            <h2>新增作品</h2>
            <form id="work">
              <div class="form-group">
                <label for="intro">簡介</label>
                <textarea id="intro" class="form-control" rows="10"></textarea>
              </div>
              <div class="form-group">
                <label for="content">圖片上傳</label>
                <input type="file"  class="image" accept="image/gif, image/jpeg, image/png">
                <div class="show_image"></div>
                <input type="hidden" id="image_path" value="">
                <a href="javascript:void(0);" class="del_image btn btn-default">刪除</a>
              </div>
              <div class="form-group">
                <label for="content">影片上傳</label>
                <input type="file"  class="video" accept="video/mp4">
                <div class="show_video"></div>
                <input type="hidden" id="video_path" value="">
                <a href="javascript:void(0);" class="del_video btn btn-default">刪除</a>
              </div>
              <div class="form-group">
                <label class="radio-inline">
                  <input type="radio" name="publish" value="1" checked>發布
                </label>
                <label class="radio-inline">
                  <input type="radio" name="publish" value="0">不發布
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

        //圖片選擇後自動上傳
        $('input.image').on('change', function() {
          var file_data = $(this)[0].files[0],
              save_path = "../files/image/",
              form_data = new FormData();

              form_data.append("file", file_data);
              form_data.append("save_path", save_path);

              $.ajax({
                type : "POST",
                url : "../php/upload_file.php",
                data : form_data,
                cache :　false,
                processData : false,
                contentType : false,
                dataType : "html"
              }).done(function(data) {
                if (data == "yes") {
                  //顯示圖片
                $('.show_image').html("<img src='"+ save_path + file_data['name'] + "'>");
                $('#image_path').val(save_path + file_data['name']);
                }else {
                  console.log(data);
                }
              }).fail(function(jqXHR, textStatus, errorThrown) {
                alert('有錯誤產生，請趕快看 console log');
                console.log(jqHRX, responseText);
              });
        });

        //刪除上傳圖片
        $('.del_image').on('click', function() {

          if ($('#image_path').val() != '') {
            var check_confirm = confirm("你確定要刪除嗎?");
            if (check_confirm) {
              $.ajax({
                  type : "POST",
                  url : "../php/del_file.php",
                  data : {
                    'file' : $('#image_path').val()
                  },
                  dataType : "html"
                }).done(function(data) {
                  if (data == "yes") {
                    //清除圖片
                    $('.show_image').html("");
                    $('#image_path').val("");
                    $('input.image').val("");
                  }else {
                    console.log('圖片清除失敗'.data);
                  }
                }).fail(function(jqXHR, textStatus, errorThrown) {
                  alert('有錯誤產生，請趕快看 console log');
                  console.log(jqHRX, responseText);
                });
            }
          } else {
            alert('尚未上傳檔案，無法刪除');
          }
        });

        //影片選擇後自動上傳
        $('input.video').on('change', function() {
          var file_data = $(this)[0].files[0],
              save_path = "../files/video/",
              form_data = new FormData();

              form_data.append("file", file_data);
              form_data.append("save_path", save_path);

              $.ajax({
                type : "POST",
                url : "../php/upload_file.php",
                data : form_data,
                cache :　false,
                processData : false,
                contentType : false,
                dataType : "html"
              }).done(function(data) {
                if (data == "yes") {
                  //顯示圖片
                $('.show_video').html("<video src='"+ save_path + file_data['name'] + "' controls>");
                $('#video_path').val(save_path + file_data['name']);
                }else {
                  console.log(data);
                }
              }).fail(function(jqXHR, textStatus, errorThrown) {
                alert('有錯誤產生，請趕快看 console log');
                console.log(jqHRX, responseText);
              });
        });

        //刪除上傳影片
        $('.del_video').on('click', function() {

          if ($('#video_path').val() != '') {
            var check_confirm = confirm("你確定要刪除嗎?");
            if (check_confirm) {
              $.ajax({
                  type : "POST",
                  url : "../php/del_file.php",
                  data : {
                    'file' : $('#video_path').val()
                  },
                  dataType : "html"
                }).done(function(data) {
                  if (data == "yes") {
                    //清除圖片
                    $('.show_video').html("");
                    $('#video_path').val("");
                    $('input.video').val("");
                  }else {
                    console.log('圖片清除失敗'.data);
                  }
                }).fail(function(jqXHR, textStatus, errorThrown) {
                  alert('有錯誤產生，請趕快看 console log');
                  console.log(jqHRX, responseText);
                });
            }
          } else {
            alert('尚未上傳檔案，無法刪除');
          }
        });



          // $('#work').on('submit', function() {
          //   if ($('#intro').val() == '' || $('#category').val() == '') {
          //     alert('請填妥標題或內文!');
          //   }else {
          //     $.ajax({
          //       type : "POST",
          //       url : "../php/upload_file.php",
          //       data : form_data,
          //       cache :　false,
          //       processDaa : false,
          //       contentType : false,
          //       dataType : "html"
          //     }).done(function(data) {
          //       console.log(data);
          //       // if (data == "yes") {
          //       //   alert('新增成功，點擊確認回到列表頁');
          //       //   window.location.href = 'article_list.php' ;
          //       // }else {
          //       //   alert('新增失敗');
          //       // }
          //     }).fail(function(jqXHR, textStatus, errorThrown) {
          //       alert('有錯誤產生，請趕快看 console log');
          //       console.log(jqHRX, responseText);
          //     });
          // }
          //   return false;
          // });
      });
    </script>
</body>

</html>