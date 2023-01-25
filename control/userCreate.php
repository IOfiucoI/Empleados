<?php
require_once '../include/connection.php';
$database = new connect();
$conexion = $database->connect();

if (!empty($_POST['email']) && !empty($_POST['pass'])) {

    $name   = strip_tags($_POST['name']);
    $ap     = strip_tags($_POST['ap']);
    $am     = strip_tags($_POST['am']);
    $email  = strip_tags($_POST['email']);
    $pass   = strip_tags($_POST['pass']);
    $rol    = strip_tags($_POST['rol']);
    $status = strip_tags($_POST['status']);

    $query = "SELECT user_email FROM users WHERE user_email = :email";
    $stmt = $conexion->prepare($query);
    $stmt->execute(array(':email' => $email));
    $count = $stmt->rowCount();

    if ($count < 1) {

        $image      = $_FILES["image"]["name"];
        $type       = $_FILES["image"]["type"];
        $tmp_name   = $_FILES["image"]["tmp_name"];

        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $filename   = date("Ymd_His") . "." . $ext;
        $url        = "profiles/img/" . $filename;
        $location   = "../profiles/img/" . $filename;
        $dir = "../profiles/img";

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        if ($type == 'image/jpeg' || $type == 'image/jpg') {

            $query = "INSERT INTO users(user_image, user_name, user_ap, user_am, user_email, user_pass, user_rol, user_status) values (:image, :name, :ap, :am, :email, :pass, :rol, :status)";
            $stmt = $conexion->prepare($query);

            $stmt->bindParam(':image',  $url, PDO::PARAM_STR, 100);
            $stmt->bindParam(':name',   $name, PDO::PARAM_STR, 100);
            $stmt->bindParam(':ap',     $ap, PDO::PARAM_STR, 100);
            $stmt->bindParam(':am',     $am, PDO::PARAM_STR, 100);
            $stmt->bindParam(':email',  $email, PDO::PARAM_STR, 100);
            $password_hash = md5($pass);
            $stmt->bindParam(':pass',   $password_hash);
            $stmt->bindParam(':rol',    $rol, PDO::PARAM_STR, 100);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR, 100);

            if ($stmt->execute()) {
                move_uploaded_file($tmp_name, $location);
                $data_user = $conexion->lastInsertId();
                $query2 = "INSERT INTO data(data_user, id_e, ads, area, alta, baja, dom, telf, cel, fnac, sex, edoc, rfc, ndcm, cod_ine, ldm, ndl, alergia, hijos, ldn, nac, gs, curp, mdcsm, fine, tdl, tele, sindi)
                values ($data_user, 'N/A', 'N/A', 'N/A', now(), 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A')";
                $stmt2 = $conexion->prepare($query2);

                if ($stmt2->execute()) {
                    echo 'success';
                } else {
                    echo 'error';
                }
            } else {
                echo 'error';
            }
        } else {
            echo "img";
        }
    } else {
        echo 'true';
    }
} else {
    header('Location: ../index.php');
}
