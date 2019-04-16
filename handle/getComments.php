<?php 
include('connDB.php');
$sql = "SELECT * FROM comment WHERE article_id=:article_id";
$statement = $pdo->prepare($sql);
$statement->bindValue('article_id', $_GET['id'], PDO::PARAM_INT);
$statement->execute();
$comments = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
