<?php
    require_once('dbc.php');
    connect();
    $dbh = connect();

    $button = '<a>いいね</a>';
    session_start();
    $userName = $_SESSION['name'];

    // DBから投稿を取得
    $sql = "SELECT * FROM toukou WHERE name = '$userName'";
    $stmt = $dbh->prepare($sql);
    $status = $stmt->execute();
    // 投稿表示
    $view = "";
    if ($status == false) {
        $error = $stmt->errorInfo();
        exit("ErrorQuery:".$error[2]);
    } else {
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    }
    echo $img;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../style/main.css">
    <script>
        //共通パーツ読み込み
        $(function() {
            $("#header").load("header.php");
        });
    </script>
    <title>Hello, world!</title>
</head>

<body>
    <div id="header">
    </div>

    <main class="container">
        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0">My Post</h6>

            <?php foreach($result as $column): ?>
                <div class="d-flex text-muted pt-3">
                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#6f42c1"/>
                        <text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text>
                    </svg>
                    <p class="pb-3 mb-0 small lh-sm border-bottom">
                        <strong class="d-block text-gray-dark"><?= $column['name'] ?></strong>
                        <?= $column['text'] ?>
                    </p>
                    <img src="./image.php" width="175" height="200">
                    <?= $img ?>
                    <br>
                    <div class="button">
                        <?= $button ?>
                        <a class="none-style" href="delete.php?id=<?= $column['id'] ?>">削除</a>
                    </div>
                </div>

            <?php endforeach; ?>

            <small class="d-block text-end mt-3">
                <a href="#">All updates</a>
            </small>
        </div>
    </main>

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="offcanvas.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> -->


</body>
</html>