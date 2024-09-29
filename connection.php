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

//ToDo新規追加(INSERT文)
function createTodoData($todos)
{
  $dbh = connectPdo();
  $sql = 'INSERT INTO todos (content, matrix_id) VALUES (:content, :matrix_id)';
  $stmt = $dbh->prepare($sql);
  $stmt->bindValue(':content', $todos['content']);
  $stmt->bindValue(':matrix_id', $todos['matrix_id'], PDO::PARAM_INT);
  $stmt->execute();
}

//URLパラメータのidからレコードを取得(SELECT文)
function getTodoTextById($id)
{
    $dbh = connectPdo();
    $sql = 'SELECT * FROM todos WHERE content_id = (:id)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $data = $stmt->fetch();

    return $data;
}

//ToDoの更新機能（UPDATE文）
function updateTodoData($post)
{
    $dbh = connectPdo();
    $sql = 'UPDATE todos SET content = (:content), matrix_id = (:matrix_id) WHERE content_id = (:id)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $post['id']);
    $stmt->bindValue(':content', $post['content']);
    $stmt->bindValue(':matrix_id', $post['matrix_id'], PDO::PARAM_INT);
    $stmt->execute();
}

