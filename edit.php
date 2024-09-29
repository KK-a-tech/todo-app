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
  <form action="store.php" method="post">
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
    <input type="text" name="content" value="<?= $todo['content'] ?>">
    <!-- matrix_idの初期値を設定 -->
    <?php
    switch ($todo['matrix_id']) {
        case '1':
            echo '<select name="matrix_id">
                <option value="1" selected>第1象限</option>
                <option value="2">第2象限</option>
                <option value="3">第3象限</option>
                <option value="4">第4象限</option>
            </select>';
            break;
        case '2':
            echo '<select name="matrix_id">
                <option value="1">第1象限</option>
                <option value="2" selected>第2象限</option>
                <option value="3">第3象限</option>
                <option value="4">第4象限</option>
            </select>';
            break;
        case '3':
            echo '<select name="matrix_id">
                <option value="1">第1象限</option>
                <option value="2">第2象限</option>
                <option value="3" selected>第3象限</option>
                <option value="4">第4象限</option>
            </select>';
            break;
        case '4':
            echo '<select name="matrix_id">
                <option value="1">第1象限</option>
                <option value="2">第2象限</option>
                <option value="3">第3象限</option>
                <option value="4" selected>第4象限</option>
            </select>';
            break;
        default:
            echo '<select name="matrix_id">
                <option value="1">第1象限</option>
                <option value="2">第2象限</option>
                <option value="3">第3象限</option>
                <option value="4">第4象限</option>
            </select>';
            break;
    }
    ?>
    <input type="submit" value="更新">
  </form>
  <div>
    <a href="index.php">一覧へもどる</a>
  </div>
</body>
</html>