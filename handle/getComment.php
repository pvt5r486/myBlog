<?php 
include('connDB.php');
$sql = "SELECT * FROM comment WHERE id=:id";
$statement = $pdo->prepare($sql);
$statement->bindValue('id', $_GET['commentID'], PDO::PARAM_INT);
$statement->execute();
$comment = $statement->fetch(PDO::FETCH_ASSOC);
?>
