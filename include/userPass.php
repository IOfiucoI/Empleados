<?php
require_once 'connection.php';
// require_once 'users.php';
$database = new connect();
$conexion = $database->connect();

if (!empty($_POST['passprev'])) {

    $id     = $_POST['id'];
    $passp  = $_POST['passprev'];
    $passn  = $_POST['passnew'];
    $passc  = $_POST['passconfirm'];

    $passPrev = md5($passp);
    $passNew  = md5($passn);
    $passConfirm  = md5($passc);

    $query  = "SELECT user_pass FROM users WHERE user_id = :id";
    $stmt   = $conexion->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {

        $row    = $stmt->fetch(PDO::FETCH_ASSOC);
        $passDB = $row["user_pass"];

        if ($passDB == $passPrev) {

            if ($passNew == $passConfirm) {
                $query = "UPDATE users SET user_pass = :pass WHERE user_id = :id";
                $stmt = $conexion->prepare($query);
                $stmt->bindParam(':id',     $id, PDO::PARAM_INT);
                $stmt->bindParam(':pass',   $passConfirm);

                if ($stmt->execute()) {
                    echo "ok";
                } else {
                    echo "error";
                }
            } else {
                echo "no";
            }
        } else {
            echo "false";
        }
    } else {
        echo "error";
    }
} else {
    header('Location: ../index.php');
}
