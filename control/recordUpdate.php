<?php
require_once '../include/connection.php';
$database = new connect();
$conexion = $database->connect();

if (!empty($_POST['r_id'])) {

    $id         = $_POST['r_id'];
    $esc        = $_POST['esc'];
    $ubi        = $_POST['ubi'];
    $per        = $_POST['per'];
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

    $query = "SELECT r_doc FROM record WHERE r_id = :r_id";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':r_id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $pdf   = $row["r_doc"];


    if (empty($doc)) {

        $query = "UPDATE record SET
             r_esc = :esc,
             r_ubi = :ubi,
             r_per = :per,
             r_doc = :doc
             WHERE r_id = :id";

        $stmt = $conexion->prepare($query);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':esc', $esc, PDO::PARAM_STR, 100);
        $stmt->bindParam(':ubi', $ubi, PDO::PARAM_STR, 100);
        $stmt->bindParam(':per', $per, PDO::PARAM_STR, 100);
        $stmt->bindParam(':doc', $pdf, PDO::PARAM_STR, 100);
        if ($stmt->execute()) {
            echo "true";
        } else {
            echo "false";
        }
    } else {
        if ($type == 'application/pdf') {

            $query = "UPDATE record SET
            r_esc = :esc,
            r_ubi = :ubi,
            r_per = :per,
            r_doc = :doc
            WHERE r_id = :id";

            $stmt = $conexion->prepare($query);

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
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
        }
    }
} else {
    echo 'data';
}
