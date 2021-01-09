<?php
    // 投稿画面
    session_start();
    $name = $_SESSION['name'];
    $person = '<p>投稿者:'. $name .'</p>';

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        //共通パーツ読み込み
        $(function() {
            $("#header").load("header.php");
        });
    </script>
    <title>Document</title>
</head>

<body>
    <div id="header">
    </div>
    <br>

    <main class="container">
    <h1>投稿</h1>
        <form method="POST" action="insert_do.php" enctype="multipart/form-data">
            <div>
                <textarea name="text" rows="8" cols="40" value=""></textarea>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" accept="image/*" capture="user" name="image" class="form-control">
            </div>
            <input type="submit" class="insert_button" name="btn1" value="投稿する">
        </form>

    </main>
</body>
</html>