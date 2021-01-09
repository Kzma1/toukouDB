<?php
    require_once('dbc.php');
    connect();
    $dbh = connect();

    // ログイン名引き継ぎ
    session_start();
    $userName = $_SESSION['name'];
    
    $id = $_GET["id"];
    // SQL準備
    $stmt = $dbh->prepare('DELETE FROM toukou WHERE id = :id');
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    $stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    
</body>
</html>