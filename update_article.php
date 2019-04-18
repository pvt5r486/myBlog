<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/all.min.css">
  <title>myBlog 管理後台</title>
</head>
<body>
  <div class="container">
    <h1 class="h1">編輯文章</h1>
    <ul class="nav justify-content-center mb-3">
      <li class="nav-item">
        <a class="nav-link" href="./admin.php">管理文章</a>
      </li>
    </ul>
    <form method="POST" action="./handle/updateArticle.php">
      <?php include('./handle/getArticle.php'); ?>
      <div class="form-group">
        <input type="hidden" name="id" id="id" value="<?= $articleArray[$_GET['id']]['id'] ?>">
        <label for="title">*標題</label>
        <input type="text" class="form-control" value="<?= $articleArray[$_GET['id']]['title'] ?>" id="title" name="title" placeholder="請輸入標題.." require>
      </div>
      <div class="form-group">
        <label for="category">*分類</label>
        <?php include('./handle/getCategories.php'); ?>
        <select multiple="multiple" name="category[]" id="category" class="form-control">
          <?php 
            foreach ($categoryArray as $key => $item){
              $itemID = $item['id'];
              $flag = false;
              // 尋找 $article['category'] 內有無 符合 $item['name']
              $s_categoryArray = explode(",",  $articleArray[$_GET['id']]['categoryName']);
              foreach ($s_categoryArray as $key => $category) {
                if ($category === $item['name']) {
                  $flag = true;
                  echo "<option value='$itemID' selected>";
                  echo $item['name'];
                  echo "</option>";
                }
              }
              if(!$flag){
                echo "<option value='$itemID'>";
                echo $item['name'];
                echo "</option>";
              }
            }
          ?> 
        </select>
      </div>
      <div class="form-group">
        <label for="is_draft">狀態</label>
        <select name="is_draft" id="is_draft" class="form-control">
          <?php
          if ((int)$articleArray[$_GET['id']]['is_draft'] === 0) {
            echo "<option value='0' selected>草稿</option>";
            echo "<option value='1' >已發佈</option>";
          } else {
            echo "<option value='0' >草稿</option>";
            echo "<option value='1' selected>已發表</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="content">文章內容</label>
        <textarea class="form-control" name="content" id="content" cols="30" rows="10" placeholder="請輸入內容.."><?= $articleArray[$_GET['id']]['content'] ?></textarea>
      </div>
      <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">送出</button>
      </div>
    </form>
  </div>
  <script src="./javascript/all.js"></script>
</body>

</html>