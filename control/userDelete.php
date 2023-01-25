<?php
require_once '../include/connection.php';
require_once '../include/users.php';
$database = new connect();
$conexion = $database->connect();
$users = new users($conexion);

if (!empty($_POST['id'])) {

    $users->id = $_POST['id'];
    echo $users->userDelete();

} else {
    header("Location: ../404.php");
}

