<?php
require_once('connection.php');

function savePostedData($post)
{
    $path = getRefererPath();
    switch ($path) {
        case '/new.php':
            createTodoData($post);
            break;
        case '/edit.php':
            updateTodoData($post);
            break;
        default:
            break;
    }
}

function getRefererPath()
{
    $urlArray = parse_url($_SERVER['HTTP_REFERER']);
    return $urlArray['path'];
}

//URLからidを取得する
function getSelectedTodo($id)
{
    return getTodoTextById($id);
}

