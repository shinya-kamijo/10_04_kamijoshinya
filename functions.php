<?php
//共通で使うものを別ファイルにしておきましょう。

// include("function.php");

//DB接続関数（PDO）
function db_conn()
{
$dbn = 'mysql:dbname=gsf_d03_db04;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
    return  new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    exit('dbError:'.$e->getMessage());
}


}


//SQL処理エラー
function errorMsg($stmt)
{
    $error = $stmt->errorInfo();
    exit('ErrorQuery:'.$error[2]);
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
