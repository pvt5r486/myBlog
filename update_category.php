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
    <h1 class="h1">編輯分類</h1>
    <ul class="nav justify-content-center mb-3">
      <li class="nav-item">
        <a class="nav-link" href="./admin_category.php">分類管理</a>
      </li>
    </ul>
    <form method="POST" action="./handle/updateCategory.php">
    <?php include('./handle/getCategory.php'); ?>
      <div class="form-group">
        <label for="categoryName">*分類名稱</label>
        <input type="text" class="form-control" value="<?=$category['name']?>" id="categoryName" name="categoryName" placeholder="請輸入分類名稱.." required>
        <input type="hidden" value="<?=$category['id']?>" name="id">
      </div>
      <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">送出</button>
      </div>
    </form>
  </div>
  <script src="./javascript/all.js"></script>
</body>

</html>