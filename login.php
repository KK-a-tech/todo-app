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

//メールアドレスが存在するかチェック
if ($stmt->fetchColumn() > 0) {
  //指定したハッシュがパスワードにマッチしているかチェック
  if (password_verify($_POST['pass'], $member['pass'])) {
    //DBのユーザー情報をセッションに保存
    $_SESSION['id'] = $member['user_id'];
    $_SESSION['name'] = $member['name'];
    $msg = 'ログインしました。';
    $link = '<a href="index.php">ホーム</a>';
  } else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="login.php">戻る</a>';
  }

} else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="login.php">戻る</a>';
}


?>


<p><?= $msg; ?></p><!--メッセージの出力-->
<?= $link; ?>