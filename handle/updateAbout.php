<?php
include('./connDB.php');
$sql = 'UPDATE aboutme SET name=:name, content=:content WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
$statement->bindValue(':content', $_POST['content'], PDO::PARAM_STR);
$statement->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
$result = $statement->execute();

if($result){
  header('Location: ../admin.php');
  die();
} else {
  echo '資料更新失敗';
}
?>