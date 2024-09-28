<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="これはWebサイト制作の練習をするためのサイトです。">
  <meta name="keyword" content="Webサイト, 制作, 練習">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>ログインページ</h1>
<form action="store.php" method="post">
<div>
    <label>
        メールアドレス：
        <input type="text" name="mail" required>
    </label>
</div>
<div>
    <label>
        パスワード：
        <input type="password" name="pass" required>
    </label>
</div>
<input type="submit" value="ログイン">
</form>
</body>