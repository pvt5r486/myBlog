<?php 
include('connDB.php');
$sql = "SELECT * FROM categories WHERE id=:id";
$statement = $pdo->prepare($sql);
$statement->bindValue('id', $_GET['id'], PDO::PARAM_INT);
$statement->execute();
$category = $statement->fetch(PDO::FETCH_ASSOC);
?>
