<?php 
include('connDB.php');
// $articleArray = [];
// // 取得文章
// $sql = "SELECT * FROM articles ORDER BY created_at DESC";
// $statement = $pdo->prepare($sql);
// $statement->execute();
// $resultArray = $statement->fetchAll(PDO::FETCH_ASSOC);

// // 取得類別 並組合
// foreach ($resultArray as $key => $item) {
//   $sql = "SELECT b.name
//           FROM articles as a, categories as b, articleandcategory_ref as c 
//           where a.id = c.articleID AND b.id = c.categoryID AND a.id=:id";
//   $statement = $pdo->prepare($sql);     
//   $statement->bindValue(':id', $item['id'], PDO::PARAM_INT);
//   $statement->execute();
//   $categoryArray = $statement->fetchAll(PDO::FETCH_ASSOC);
//   $item['category'] = $categoryArray;
//   array_push($articleArray,$item);
// }
$sql = "SELECT a.*, b.name as categoryName
        FROM articles as a, categories as b, articleandcategory_ref as c
        WHERE a.id = c.articleID AND b.id = c.categoryID
        ORDER BY a.created_at DESC";
$statement = $pdo->prepare($sql);
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
