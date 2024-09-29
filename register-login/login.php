<?php
require_once 'config.php';
session_start();
$mail = $_POST['mail'];

try {
    $dbh = new PDO(DSN, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    $msg = $e->getMessage();
}

$sql = "SELECT * FROM userinfo WHERE mail = :mail";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':mail', $mail);
$stmt->execute();

if($member = $stmt->fetch(PDO::FETCH_ASSOC)){
  if (password_verify($_POST['pass'], $member['pass'])) {
    //DBのユーザー情報をセッションに保存
    $_SESSION['id'] = $member['user_id'];
    $_SESSION['name'] = $member['name'];
    $msg = 'ログインしました。';
    $link = '<a href="index.php">ホーム</a>';
  } else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="login_form.php">戻る</a>';
  }
}else{
    $msg = 'メールアドレスが登録されていません。';
    $link = '<a href="signup.php">新規会員登録</a></br>
    <a href="login_form.php">ログインページ</a>';
}
//指定したハッシュがパスワードにマッチしているかチェック
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="これはWebサイト制作の練習をするためのサイトです。">
  <meta name="keyword" content="todo, 制作, 練習">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規会員登録</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!--メッセージの出力-->
  <p><?= $msg; ?></p>
  <p><?= $link; ?></p>
<footer>
</footer>