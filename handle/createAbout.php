<?php
include('./connDB.php');
$sql = 'INSERT INTO aboutme (name, content) VALUES (:name, :content)';
$statement = $pdo->prepare($sql);
$statement->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
$statement->bindValue(':content', $_POST['content'], PDO::PARAM_STR);
$result = $statement->execute();

if($result){
  header('Location: ../admin.php');
  die();
} else {
  echo '資料新增失敗';
}
?>