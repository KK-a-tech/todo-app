<?php
require_once('functions.php');
$todo = getSelectedTodo($_GET['id']);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="これはWebサイト制作の練習をするためのサイトです。">
  <meta name="keyword" content="Webサイト, 制作, 練習">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>編集ページ</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  helloWorld
  <form action="store.php" method="post">
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
    <input type="text" name="content" value="<?= $todo['content'] ?>">
    <select name="matrix id">
      <option value='1'>第1象限</option>
      <option value="2">第2象限</option>
      <option value="3">第3象限</option>
      <option value="4">第4象限</option>
    </select>
    <input type="submit" value="更新">
  </form>
  <div>
    <a href="index.php">一覧へもどる</a>
  </div>
</body>
</html>