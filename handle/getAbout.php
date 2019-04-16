<?php 
include('connDB.php');
$sql = "SELECT * FROM aboutme";
$statement = $pdo->prepare($sql);
$statement->execute();
$result = $statement->fetch(PDO::FETCH_ASSOC);
?>
