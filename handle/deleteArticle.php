<?php 
include('connDB.php');

// 評論
$sql = 'DELETE FROM comment WHERE article_id=:id';
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$result = $statement->execute();
// 關聯
$sql = 'DELETE FROM articleandcategory_ref WHERE articleID=:id';
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$result = $statement->execute();
// 本體
$sql = 'DELETE FROM articles WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$result = $statement->execute();


if($result){
  header('Location: ../admin.php');
  die();
} else {
  echo '資料刪除失敗';
}
?>