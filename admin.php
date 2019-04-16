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
    <h1 class="h1">文章管理</h1>
    <ul class="nav justify-content-center mb-3">
      <li class="nav-item">
        <a class="nav-link" href="./admin.php">文章管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./add_article.php">新增文章</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./admin_category.php">分類管理</a>
      </li>
      <?php
      include('./handle/connDB.php');
      $sql = "SELECT count(*) as total FROM aboutme";
      $statement = $pdo->prepare($sql);
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
      $limit = (int)$result[0]['total'];
      ?>
      <?php if ($limit < 1) : ?>
        <li class="nav-item">
          <a class="nav-link" href="./add_about.php">[設定]關於我</a>
        </li>
      <?php endif ?>
      <li class="nav-item">
        <a class="nav-link" href="./update_about.php">[編輯]關於我</a>
      </li>
    </ul>
    <ul class="list-group">
      <?php include('./handle/admin_getArticles.php'); ?>
      <?php foreach ($articleArray as $key => $item) : ?>
        <li class="list-group-item  d-flex align-items-center <?= (int)$item['is_draft'] === 0 ? "list-group-item-secondary" : "list-group-item-primary"  ?>">
          <div class="mr-3">
            <span class="text-nowrap mr-1">[<?= (int)$item['is_draft'] === 0 ? "草稿" : "已發表"  ?>]</span>
            <span class="text-nowrap mr-1">No.<?= $key + 1 ?></span>
            <?php foreach ($item['category'] as $key => $category) : ?>
              <span class="badge badge-secondary">
                <?= $category['name'] ?>
              </span>
            <?php endforeach ?>
          </div>
          <span class="d-block mr-auto"><?= $item['title'] ?></span>
          <div class="text-nowrap ml-3">
            <a href="update_article.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-success mr-1">編輯</a>
            <a href="./handle/deleteArticle.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-outline-secondary">刪除</a>
          </div>
        </li>
      <?php endforeach ?>
    </ul>
  </div>
  <script src="./javascript/all.js"></script>
</body>

</html>