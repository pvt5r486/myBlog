<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/all.min.css">
  <title>myBlog</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="container">
      <a class="navbar-brand" href="#">myBlog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">首頁</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">關於我</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin.php">後台管理</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container my-5">
    <ul class="list-group">
      <?php include('./handle/getArticles.php'); ?>
      <?php foreach ($articleArray as $key => $item) : ?>
        <li class="list-group-item">
          <h3 class="h3">
            <a href="article.php?id=<?= $item['id'] ?>" class="text-dark"><?= $item['title'] ?></a>
          </h3>
          <?php
          $strLen = 180;
          $content = mb_substr($item['content'], 0, $strLen, "utf-8") . "...";
          ?>
          <p class="p-3"><?= $content ?></p>
          <div class="d-flex">
            <?php
            $categoryArray = explode(",", $item['categoryName']);
            foreach ($categoryArray as $key => $category) {
              echo "<span class='badge badge-secondary mr-1'>$category</span>";
            }
            ?>
            <small class="text-secondary ml-auto"><?= $item['created_at'] ?></small>
          </div>
        </li>
      <?php endforeach ?>
    </ul>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="./javascript/all.js"></script>
</body>

</html>