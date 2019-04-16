<?php 
include('connDB.php');
$sql = "SELECT * FROM categories ORDER BY created_at DESC";
$statement = $pdo->prepare($sql);
$statement->execute();
$categoryArray = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
