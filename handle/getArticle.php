<?php 
include('connDB.php');
// $sql = "SELECT * FROM articles where id=:id";
// $statement = $pdo->prepare($sql);
// $statement->bindValue('id', $_GET['id'], PDO::PARAM_INT);
// $statement->execute();
// $article = $statement->fetch(PDO::FETCH_ASSOC);

// $sql = "SELECT b.name
// FROM articles as a, categories as b, articleandcategory_ref as c 
// where a.id = c.articleID AND b.id = c.categoryID AND a.id=:id";
// $statement = $pdo->prepare($sql);     
// $statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
// $statement->execute();
// $categoryArray = $statement->fetchAll(PDO::FETCH_ASSOC);
// $article['category'] = $categoryArray;

$sql = "SELECT a.*, b.name as categoryName
        FROM articles as a, categories as b, articleandcategory_ref as c
        WHERE a.id = c.articleID AND b.id = c.categoryID AND a.id=:id
        ORDER BY a.created_at DESC";
$statement = $pdo->prepare($sql);
$statement->bindValue('id', $_GET['id'], PDO::PARAM_INT);
$statement->execute();
$resultArray = $statement->fetchAll(PDO::FETCH_ASSOC);

$articleArray = [];
foreach ($resultArray as $key => $item) {
  if($articleArray[$item['id']] === null){
    $articleArray[$item['id']] = $item;  
  } else {
    $articleArray[$item['id']]['categoryName'] = $articleArray[$item['id']]['categoryName'].",".$item['categoryName'];
  }
}
?>
