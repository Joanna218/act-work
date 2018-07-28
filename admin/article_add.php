<?
  require_once '../php/db.php';
  require_once '../php/function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>後台管理-文章新增</title>
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
              <div class="form-group">
                <label for="title">標題</label>
                <input type="text" class="form-control" id="title" placeholder="輸入標題">
              </div>
              <div class="form-group">
                <label for="category">分類</label>
                <select id="category" class="form-control">
                  <option value="新聞">新聞</option>
                  <option value="心得">心得</option>
                </select>
              </div>
              <div class="form-group">
                <label for="content">內文</label>
                <textarea id="content" class="form-control" rows="10"></textarea>
              </div>
              <div class="form-group">
                <label class="radio-inline">
                  <input type="radio" name="publish" value="1">發布
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
</body>

</html>