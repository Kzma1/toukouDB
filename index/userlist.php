<?php
    require_once('dbc.php');
    connect();
    $dbh = connect();

    session_start();
    $userName = $_SESSION['name'];

    // login2からユーザー一覧をとってくる
    $sql = "SELECT * FROM login2";
    $stmt = $dbh->prepare($sql);
    $status = $stmt->execute();

        // 一覧を表示
        $view = "";
        if ($status == false) {
            $error = $stmt->errorInfo();
            exit("ErrorQuery:".$error[2]);
        } else {
            $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="../style/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        //共通パーツ読み込み
        $(function() {
            $("#header").load("header.php");
        });
    </script>
</head>

<body>
    <div id="header">
    </div>

    <main class="container">
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-0">User List</h6>
        <?php foreach($result as $column): ?>
            <div class="d-flex text-muted pt-3">
                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#6f42c1"/>
                    <text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text>
                </svg>
                <p class="pb-3 mb-0 small lh-sm border-bottom">
                    <strong class="d-block text-gray-dark"><?= $column['name'] ?></strong>
                    <?= $column['mail'] ?>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
    </main>

</body>
</html>