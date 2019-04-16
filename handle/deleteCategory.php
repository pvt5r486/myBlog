<?php 
include('connDB.php');
// 刪除關聯
$sql = 'DELETE FROM articleandcategory_ref WHERE categoryID=:id';
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$statement->execute();
// 刪除類別
$sql = 'DELETE FROM categories WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$result = $statement->execute();
if($result){
  header('Location: ../admin_category.php');
  die();
} else {
  echo '資料刪除失敗';
}
?>