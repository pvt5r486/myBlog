<?php
if (empty($_POST['title']) || empty($_POST['category'])){
  die('請檢查資料有無漏填！');
}

// 更新文章本身
include('./connDB.php');
$result = false;
$sql = 'UPDATE articles SET title=:title, is_draft=:is_draft ,content=:content WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
$statement->bindValue(':is_draft', $_POST['is_draft'], PDO::PARAM_INT);
$statement->bindValue(':content', $_POST['content'], PDO::PARAM_STR);
$statement->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
$statement->execute();

// 刪除該文章所有關聯後重建
$categoryID_arr = $_POST['category'];
$sql = 'DELETE FROM articleandcategory_ref WHERE articleID=:id';
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
$statement->execute();

$sql = 'INSERT INTO articleandcategory_ref (articleID, categoryID) VALUES (:articleID, :categoryID)';
$statement = $pdo->prepare($sql);
$statement->bindValue(':articleID', $_POST['id'], PDO::PARAM_INT);
foreach ($categoryID_arr as $key => $categoryID) {
  $statement->bindValue(':categoryID', (int)$categoryID, PDO::PARAM_INT);
  $result = $statement->execute();
}


if($result){
  header('Location: ../admin.php');
  die();
} else {
  echo '資料更新失敗';
}
?>