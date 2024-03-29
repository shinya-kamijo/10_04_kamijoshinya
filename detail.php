<?php
// var_dump($_GET);
// exit();
// 関数ファイルの読み込み
include("functions.php");

// getで送信されたidを取得
$id = $_GET["id"];

//データベースでの接続します
$pdo = db_conn();


//データ登録SQL作成，指定したidのみ表示する
$sql = 'SELECT * FROM php02_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
if ($status==false) {
    // エラーのとき
    errorMsg($stmt);
} else {
    // エラーでないとき
    $rs = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>更新ページ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div{
            padding: 10px;
            font-size:16px;
            }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">更新ページ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="select.php">コメント</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="select2.php">更新・削除</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <form method="post" action="update.php">
        <div class="form-group">
            <label for="task">名前</label>
            <!-- 受け取った値をvaluesに埋め込もう -->
            <input type="text" class="form-control" id="task" name="task" value="<?=$rs["task"]?>">
        </div>
        <div class="form-group">
            <label for="deadline">ID</label>
            <!-- 受け取った値をvaluesに埋め込もう -->
            <input type="text" class="form-control" id="deadline" name="deadline" value="<?=$rs["deadline"]?>">
        </div>
        <div class="form-group">
            <label for="comment">パスワード</label>
            <!-- 受け取った値挿入しよう -->
            <input type="text" class="form-control" id="comment" name="comment"  value="<?=$rs["comment"]?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">更新</button>
        </div>
        <!-- idは変えたくない = ユーザーから見えないようにする-->
        <input type="hidden" name="id" value="<?=$rs["id"]?>">
    </form>

</body>

</html>