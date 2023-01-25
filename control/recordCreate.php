<?php
require_once '../include/connection.php';
$database = new connect();
$conexion = $database->connect();

if (!empty($_POST['user']) && !empty($_POST['esc']) && !empty($_POST['ubi']) && !empty($_POST['per'])) {

    $user = $_POST['user'];
    $esc  = $_POST['esc'];
    $ubi  = $_POST['ubi'];
    $per  = $_POST['per'];

    $doc        = $_FILES["doc"]["name"];
    $type       = $_FILES["doc"]["type"];
    $tmp_name   = $_FILES["doc"]["tmp_name"];
    $ext        = pathinfo($doc, PATHINFO_EXTENSION);
    $filename   = date("Ymd_His") . "." . $ext;
    $url        = "profiles/historial/" . $filename;
    $location   = "../profiles/historial/" . $filename;
    $dir = "../profiles/historial";

    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
    
    if ($type == 'application/pdf') {
        $query = "INSERT INTO record SET
        r_user = :user,
        r_esc = :esc,
        r_ubi = :ubi,
        r_per = :per,
        r_doc = :doc";

        $stmt = $conexion->prepare($query);

        $stmt->bindParam(':user', $user, PDO::PARAM_INT);
        $stmt->bindParam(':esc', $esc, PDO::PARAM_STR, 100);
        $stmt->bindParam(':ubi', $ubi, PDO::PARAM_STR, 100);
        $stmt->bindParam(':per', $per, PDO::PARAM_STR, 100);
        $stmt->bindParam(':doc', $url, PDO::PARAM_STR, 100);

        if ($stmt->execute()) {
            move_uploaded_file($tmp_name, $location);
            echo "true";
        } else {
            echo "false";
        }
    } else {
        echo "pdf";
    }
} else {
    echo 'data';
}


// $record = new record($conexion);

// if (
//     !empty($_POST['user']) &&
//     !empty($_POST['esc']) &&
//     !empty($_POST['ubi']) &&
//     !empty($_POST['per']) &&
//     !empty($_POST['doc'])
// ) {

//     $record->user = $_POST['user'];
//     $record->esc  = $_POST['esc'];
//     $record->ubi  = $_POST['ubi'];
//     $record->per  = $_POST['per'];
//     $record->doc  = $_FILE['doc'];

//     if ($record->recordCreate()) {
//         echo "true";
//     } else {
//         echo "false";
//     }
// } else {
//     echo 'data';
// }
