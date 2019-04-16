<?php
if (empty($_POST['title']) || empty($_POST['category'])){
  die('請檢查資料有無漏填！');
}
include('./connDB.php');
$categoryID_arr = $_POST['category'];
$flag = false;

$sql = 'INSERT INTO articles (title, content, is_draft) VALUES (:title, :content, :is_draft)';
$statement = $pdo->prepare($sql);
$statement->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
$statement->bindValue(':content', $_POST['content'], PDO::PARAM_STR);
$statement->bindValue(':is_draft', $_POST['is_draft'], PDO::PARAM_INT);
$addResult = $statement->execute();

if($addResult){
  $flag = true;
} else {
  die('文章新增失敗');
}

if($flag){
  // 建立關聯
  $result = false;
  $lastArticleID = $pdo->lastInsertId();
  $sql = 'INSERT INTO articleandcategory_ref (articleID, categoryID) VALUES (:articleID, :categoryID)';
  $statement = $pdo->prepare($sql);
  $statement->bindValue(':articleID', $lastArticleID, PDO::PARAM_INT);
  foreach ($categoryID_arr as $key => $categoryID) {
    $statement->bindValue(':categoryID', (int)$categoryID, PDO::PARAM_INT);
    $result = $statement->execute();
  }
  $result ? header('Location: ../admin.php') : die('文章與分類關聯新增失敗');
}
?>