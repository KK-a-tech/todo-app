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

//ToDo新規追加
function createTodoData($todos)
{
  $dbh = connectPdo();
  $sql = 'INSERT INTO todos (content, matrix id) VALUES (:content :matrix id)';
  $stmt = $dbh->prepare($sql);
  $stmt->bindValue(':content', $todos['content']);
  $stmt->bindValue(':matrix id', $todos['matrix id']);
  $stmt->execute();
}
