<?php
    require_once('dbc.php');
    require_once('image.php');
    connect();
    $dbh = connect();



    $save_filename = date('YmdHis') . $filename;
    $err_msgs = array();
    $save_path = $upload_dir . $save_filename;

    function fileSave() {
    $result = False;

    $sql = "INSERT INTO toukou (image) VALUE (:image)";

    try {
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':image', $save_path, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
        $result = $stmt->execute();
    } catch (\Exception $e) {
        exit($e->getMessage());
    }


    
}



?>