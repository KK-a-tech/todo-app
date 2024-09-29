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
  $sql = 'INSERT INTO todos (content, matrix_id) VALUES (:content, :matrix_id)';
  $stmt = $dbh->prepare($sql);
  $stmt->bindValue(':content', $todos['content']);
  $stmt->bindValue(':matrix_id', $todos['matrix_id'], PDO::PARAM_INT);
  $stmt->execute();
}
