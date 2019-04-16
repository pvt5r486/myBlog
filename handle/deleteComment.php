<?php 
include('connDB.php');
$sql = 'DELETE FROM comment WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $_GET['commentID'], PDO::PARAM_INT);
$result = $statement->execute();
$articleID = $_GET['artileID'];
if($result){
  header("Location: ../article.php?id=$articleID");
  die();
} else {
  echo '資料刪除失敗';
}
?>