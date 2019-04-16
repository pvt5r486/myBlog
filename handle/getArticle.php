<?php 
include('connDB.php');
$sql = "SELECT * FROM articles where id=:id";
$statement = $pdo->prepare($sql);
$statement->bindValue('id', $_GET['id'], PDO::PARAM_INT);
$statement->execute();
$article = $statement->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT b.name
FROM articles as a, categories as b, articleandcategory_ref as c 
where a.id = c.articleID AND b.id = c.categoryID AND a.id=:id";
$statement = $pdo->prepare($sql);     
$statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$statement->execute();
$categoryArray = $statement->fetchAll(PDO::FETCH_ASSOC);
$article['category'] = $categoryArray;
?>
