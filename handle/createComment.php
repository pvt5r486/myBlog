<?php
if (empty($_POST['name']) || empty($_POST['comment'])){
  die('請檢查資料有無漏填！');
}
include('./connDB.php');
$sql = 'INSERT INTO comment (name, content, article_id) VALUES (:name, :content, :article_id)';
$statement = $pdo->prepare($sql);
$statement->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
$statement->bindValue(':content', $_POST['comment'], PDO::PARAM_STR);
$statement->bindValue(':article_id', $_POST['articleID'], PDO::PARAM_INT);
$result = $statement->execute();
$articleID = $_POST['articleID'];

if($result){
  header("Location: ../article.php?id=$articleID");
  die();
} else {
  echo '資料新增失敗';
}
?>