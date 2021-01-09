<?php
    // 投稿処理
    require_once('dbc.php');
    connect();
    $dbh = connect();
    session_start();
    $text = $_POST["text"];
    $name = $_SESSION['name'];

    // ファイルアップロード
    $file = $_FILES['img'];
    $filename = basename($file['name']);
    $tmp_path = $file['tmp_name'];
    $file_err = $file['error'];
    $upload_dir = '/Applications/MAMP/htdocs/php02＿34中川和磨/image';

    $save_filename = date('YmdHis') . $filename;
    $err_msgs = array();
    $save_path = $upload_dir . $save_filename;
    $image = file_get_contents($_FILES['image']['tmp_name']);

    if (is_uploaded_file($tmp_path)) {
        if(move_uploaded_file($tmp_path, $upload_dir)) {
            echo $filename;
        }
            echo '失敗';
    }

    // 1. SQL文を用意
    $stmt = $dbh->prepare("INSERT INTO toukou(id, name, text, time, file_path) VALUES(NULL, :name, :text, sysdate(), :file_path)");
    //  2. バインド変数を用意
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':text', $text, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':file_path', $image, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':file_path', $save_path, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

    //  3. 実行
    $status = $stmt->execute();

    //４．データ登録処理後
    if ($status==false) {
        $error = $stmt->errorInfo();
        exit("ErrorMessage:".$error[2]);
    } else {
        header('Location:main.php');
    }




    // function fileSave() {
    //     $result = False;

    //     $sql = "INSERT INTO toukou (image) VALUE (:image)";

    //     try {
    //         $stmt = $dbh->prepare($sql);
    //         $stmt->bindValue(':image', $save_path, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    //         $result = $stmt->execute();
    //     } catch (\Exception $e) {
    //         exit($e->getMessage());
    //     }
    // }
    // fileSave();
?>