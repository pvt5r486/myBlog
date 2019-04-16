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
    <h1 class="h1">編輯[關於我]</h1>
    <ul class="nav justify-content-center mb-3">
      <li class="nav-item">
        <a class="nav-link" href="./admin.php">管理文章</a>
      </li>
    </ul>
    <form method="POST" action="./handle/updateAbout.php">
      <div class="form-group">
      <?php include('./handle/getAbout.php'); ?>
        <label for="name">我的姓名</label>
        <input type="text" value="<?=$result['name']?>" class="form-control" id="name" name="name" placeholder="請輸入姓名.." >
      </div>
      <div class="form-group">
        <label for="content">想說的話</label>
        <textarea class="form-control"  name="content" id="content" cols="30" rows="10" placeholder="請輸入內容.."><?=$result['content']?></textarea>
      </div>
      <input type="hidden" name="id" value="<?=$result['id']?>">
      <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">送出</button>
      </div>
    </form>
  </div>
  <script src="./javascript/all.js"></script>
</body>

</html>