<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="これはWebサイト制作の練習をするためのサイトです。">
  <meta name="keyword" content="Webサイト, 制作, 練習">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規会員登録</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>新規会員登録</h1>
<form action="store.php" method="post">
<div>
    <label>
        名前：
        <input type="text" name="name" required>
    </label>
</div>
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
<input type="submit" value="新規登録">
</form>
<p>すでに登録済みの方は<a href="login_form.php">こちら</a></p>
</body>
