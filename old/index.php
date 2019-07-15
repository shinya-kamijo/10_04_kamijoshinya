<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>アンケート</title>
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
            <a class="navbar-brand" href="#">アンケートフォーム</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">入力フォーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="select.php">登録履歴一覧</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

  
    <form method="post" action="insert.php">
            <div class="form-group">
            <label for="task">名前</label>
            <input type="text" size="20" id="task" name="task" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="deadline">ID</label>
            <input type="text" size="20" id="deadline" name="deadline">
        </div>
        <div class="form-group">
            <label for="comment">パスワード</label>
            <input type="text" size="20" id="comment" name="comment" placeholder="********" >
        </div>

        <!-- ↓追加 -->
         <div class="form-group">
            <label for="kanri">一般人は0、有権者は1を記入</label><br>
          <input type="text"   size="2" id="kanri" name="kanri">
           </div>

         <div class="form-group">
           <label for="life">アクティブは0、非アクティブは1を記入</label><br>
          <input type="text"   size="2" id="life" name="life">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</body>

</html>