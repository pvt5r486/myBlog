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
    <?php include('./handle/getArticle.php'); ?>
    <div class="article border border-secondary p-3">
      <h1 class="h1 font-weight-bold mb-3"><?= $articleArray[$_GET['id']]['title'] ?></h1>
      <p class="mt-3 mb-5" style="white-space:pre-line;"><?= $articleArray[$_GET['id']]['content'] ?></p>
      <div class="d-flex">
        <?php
        $categoryArray = explode(",", $articleArray[$_GET['id']]['categoryName']);
        foreach ($categoryArray as $key => $category) {
          echo "<span class='badge badge-secondary mr-1'>$category</span>";
        }
        ?>
        <small class="text-secondary ml-auto"><?= $articleArray[$_GET['id']]['created_at'] ?></small>
      </div>
    </div>
    <div class="text-center my-3">
      <a href="comment.php?id=<?= $_GET['id'] ?>" class="btn btn-primary btn-sm my-auto">發表評論</a>
      <a href="index.php" class="btn btn-success btn-sm my-auto">回首頁</a>
    </div>
    <?php include('./handle/getComments.php'); ?>
    <?php if ($comments) : ?>
      <div class="card mt-5">
        <div class="card-header">Comments</div>
        <ul class="list-group list-group-flush">
          <?php foreach ($comments as $key => $item) : ?>
            <li class="list-group-item">
              <h5 class="h5">[訪客姓名] <?= $item['name'] ?></h5>
              <p class="py-1 px-3" style="white-space:pre-line;"><?= $item['content'] ?></p>
              <div class="d-flex mt-3 mb-1 justify-content-end">
                <a href="./update_comment.php?commentID=<?= $item['id'] ?>&id=<?= $article['id'] ?>" class="btn btn-sm btn-success mr-3">編輯評論</a>
                <a href="./handle/deleteComment.php?commentID=<?= $item['id'] ?>&artileID=<?= $article['id'] ?>" class="btn btn-sm btn-outline-secondary">刪除評論</a>
              </div>
            </li>
          <?php endforeach ?>
        </ul>
      </div>
    <?php endif ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="./javascript/all.js"></script>
</body>

</html>