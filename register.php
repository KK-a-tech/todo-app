<?php
require_once 'config.php';

//フォームからの値をそれぞれ変数に代入
$name = $_POST['name'];
$mail = $_POST['mail'];
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

try {
    $dbh = new PDO(DSN, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    $msg = $e->getMessage();
}

//フォームに入力されたmailがすでに登録されていないかチェック
$sql = "SELECT * FROM userinfo WHERE mail = :mail";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':mail', $mail);
$stmt->execute();

if ($stmt->fetchColumn() > 0) {
  $msg = '同じメールアドレスが存在します。';
  $link = '<a href="signup.php">戻る</a>';
} else {
  // 登録処理を行う
  $sql = "INSERT INTO userinfo (name, mail, pass) VALUES (:name, :mail, :pass)";
  $stmt = $dbh->prepare($sql);
  $stmt->bindValue(':name', $name);
  $stmt->bindValue(':mail', $mail);
  $stmt->bindValue(':pass', $pass);
  $stmt->execute();
  $msg = '会員登録が完了しました';
  $link = '<a href="login.php">ログインページ</a>';
}
?>

<!--メッセージの出力-->
<p><?= $msg; ?></p>
<?= $link; ?>