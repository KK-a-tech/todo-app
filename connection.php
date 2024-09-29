<?php
require_once('config.php');


// PDOクラスのインスタンス化
function connectPdo()
{
    try {
        return new PDO(DSN, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

//ログイン処理
function login($user_info)
{
    $dbh = connectPdo();
    $mail = $user_info['mail'];
    $sql = "SELECT * FROM userinfo WHERE mail = :mail";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':mail', $mail);
    $stmt->execute();
    $member = $stmt->fetch();

    //指定したハッシュがパスワードにマッチしているかチェック
    if (password_verify($_POST['pass'], $member['pass'])) {
        //DBのユーザー情報をセッションに保存
        $_SESSION['id'] = $member['user_id'];
        header('Location: ./index.php');
    } else {
        //下記処理の検討★
        $msg = 'メールアドレスもしくはパスワードが間違っています。';
        $link = '<a href="login.php">戻る</a>';
        header('Location: ./register.php');
    }
}

//ユーザー登録
function register($user_info)
{
    $dbh = connectPdo();
    $name = $user_info['name'];
    $mail = $user_info['mail'];
    $pass = password_hash($user_info['pass'], PASSWORD_DEFAULT);
      //フォームに入力されたmailがすでに登録されていないかチェック
    $sql = "SELECT * FROM userinfo WHERE mail = :mail";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':mail', $mail);
    $stmt->execute();

    if ($stmt->fetchColumn() > 0) {
        //下記処理の検討★
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
        //下記処理の検討★
        $msg = '会員登録が完了しました';
        $link = '<a href="login.php">ログインページ</a>';

    }
}

//ToDo新規追加
function createTodoData($todos)
{
  $dbh = connectPdo();
  $sql = 'INSERT INTO todos (user_id, content) VALUES (:user_id, :content)';
  $stmt = $dbh->prepare($sql);
  $stmt->bindValue(':user_id', $todos['user_id']);
  $stmt->bindValue(':content', $todos['content']);
  $stmt->execute();
}
