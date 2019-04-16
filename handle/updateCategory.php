<?php
if (empty($_POST['categoryName']) || empty($_POST['id'])){
  die('請檢查資料有無漏填！');
}

include('./connDB.php');
$sql = 'UPDATE categories SET `name`=:name WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement->bindValue(':name', $_POST['categoryName'], PDO::PARAM_STR);
$statement->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
$result = $statement->execute();

if($result){
  header('Location: ../admin_category.php');
  die();
} else {
  echo '資料更新失敗';
}
?>