<?php
require_once('connection.php');

function savePostedData($post)
{
    $path = getRefererPath();
    switch ($path) {
        case '/signup/.php':
            createTodoData($post);
            break;
        case '/login_form.php':
            login($post);
            break;
        case '/new.php':
            createTodoData($post);
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
