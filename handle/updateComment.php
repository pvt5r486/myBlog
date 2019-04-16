<?php
if (empty($_POST['name']) || empty($_POST['content'])){
  die('請檢查資料有無漏填！');
}
include('./connDB.php');
$sql = 'UPDATE comment SET name=:name, content=:content WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
$statement->bindValue(':content', $_POST['content'], PDO::PARAM_STR);
$statement->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
$result = $statement->execute();
$articleID = $_POST['articleid'];
if($result){
  header("Location: ../article.php?id=$articleID");
  die();
} else {
  echo '資料更新失敗';
}
?>