<?php
session_start();
require_once 'connection.php';
$database = new connect();
$conexion = $database->connect();

if (!empty($_POST['email']) && !empty(['pass'])) {

    $email      = strip_tags(trim($_POST['email']));
    $pass       = strip_tags(trim($_POST['pass']));
    $password   = md5($pass);

    $stmt = $conexion->prepare("SELECT * FROM users WHERE user_email = :email LIMIT 0,1;");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR, 100);
    $stmt->execute();
    $count = $stmt->rowCount();
    $row = $stmt->fetch(PDO::FETCH_OBJ);

    if ($count == 1) {
        $checkpas = $row->user_pass;
        if (!empty($checkpas == $password)) {

            $_SESSION['user_id'] = $row->user_id;
            $_SESSION['user_rol'] = $row->user_rol;

            if (isset($_SESSION['user_id'])) {
                echo "true";
            } else {
                session_destroy();
                echo "false";
            }
        } else {
            session_destroy();
            echo "1";
        }
    } else {
        session_destroy();
        echo "0";
    }
} else {
    header("Location: ../index.php");
}
