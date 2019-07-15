<?php
//1. DB接続
include("functions.php");
$pdo = db_conn();

//データ表示SQL作成
$sql = 'SELECT * FROM php02_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//データ表示
$view='';
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('sqlError:'.$error[2]);
} else {
    //Selectデータの数だけ自動でループしてくれる
    
    //http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

        // ドットは上書きをしないという意味、ドットがなければ追加するという意味
        $view .= '<li class="list-group-item">';
        $view .= '<p>'.$result['deadline'].'-'.$result['task'].'</p>';
        $view .= '<p>'.$result['comment'].'</p>';
        $view .= '</li>';
    }
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>chatapp</title>
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
            <a class="navbar-brand" href="#">chat掲示版</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="index.php">アルバム</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="select2.php">履歴確認</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
  
    <form method="post" action="insert.php">
            <div class="form-group">
            <label for="task">名前</label>
            <input type="text" size="20" id="task" name="task" placeholder="name">
        <!-- </div> -->
        <!-- <div class="form-group"> -->
            <label for="deadline">記録日</label>
            <input type="date" size="20" id="deadline" name="deadline">
        </div>
        <div class="form-group">
            <label for="comment">comment</label><br>
            <textarea  cols="40" rows="4" maxlength="20" id="comment" name="comment" >
            </textarea>
        </div>
         
         <div class="form-group">
            <button type="submit" class="btn btn-primary">送信</button>
        </div>
    </form>

 <div>
        <ul class="list-group">
            <?=$view?>
        </ul>
    </div>
</body>

</html>