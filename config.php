<?php
//エラー補足のためのお祈り文
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_error_handler('errorHandler');
function errorHandler($errNo, $errStr, $errFile, $errLine)
{
    if ($errNo === E_NOTICE || $errNo === E_WARNING) {
        $errTitle = $errNo === E_NOTICE ? 'Notice' : 'Warning';
        $escapedErrStr = htmlspecialchars($errStr);
        $escapedErrFile = htmlspecialchars($errFile);

        echo '<b>' . $errTitle . '</b>: ' . $escapedErrStr . ' in <b>' . $escapedErrFile . '</b> on line <b>' . $errLine . '</b>';
        exit;
    }

    return false;
}
//以上

//DB情報を定数に渡す(テスト時は書き換えること)
define('DSN', 'mysql:host=localhost; dbname=todo_app; charset=utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '1qaz2wsx');
//ユーザ情報：userinfo
//ToDo；todos

?>