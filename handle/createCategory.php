<?php
if (empty($_POST['categoryName'])){
  die('請檢查資料有無漏填！');
}
include('./connDB.php');
$sql = 'INSERT INTO categories (`name`) VALUES (:name)';
$statement = $pdo->prepare($sql);
$statement->bindValue(':name', $_POST['categoryName'], PDO::PARAM_STR);
$result = $statement->execute();

if($result){
  // redirect
  header('Location: ../admin_category.php');
  die();
} else {
  echo '資料新增失敗';
}
?>