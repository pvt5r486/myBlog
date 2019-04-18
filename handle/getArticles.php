<?php 
include('connDB.php');
$sql = "SELECT a.*, b.name as categoryName
        FROM articles as a, categories as b, articleandcategory_ref as c
        WHERE a.id = c.articleID AND b.id = c.categoryID AND a.is_draft = :is_draft
        ORDER BY a.created_at DESC";
$statement = $pdo->prepare($sql);
$statement->bindValue('is_draft', 1, PDO::PARAM_INT);
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
