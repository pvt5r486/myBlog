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
    <h1 class="h1">分類管理</h1>
    <ul class="nav justify-content-center mb-3">
      <li class="nav-item">
        <a class="nav-link" href="./add_category.php">新增分類</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./admin.php">管理文章</a>
      </li>
    </ul>
    <ul class="list-group">
      <?php include('./handle/getCategories.php'); ?>
      <?php foreach ($categoryArray as $key => $item):?>
      <li class="list-group-item list-group-item-info d-flex">
        <span class="d-block mr-3">No.<?=$key+1?></span>
        <span class="d-block mr-auto"><?=$item['name']?></span>
        <div class="text-nowrap ml-3">
          <a href="update_category.php?id=<?=$item['id']?>" class="btn btn-sm btn-success mr-1">編輯</a>
          <a href="./handle/deleteCategory.php?id=<?=$item['id']?>" class="btn btn-sm btn-outline-secondary">刪除</a>
        </div>
      </li>
      <?php endforeach ?>
    </ul>
  </div>
  <script src="./javascript/all.js"></script>
</body>

</html>