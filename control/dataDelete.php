<?php
include '../include/connection.php';
include '../include/data.php';
$database = new connect();
$conexion = $database->connect();
$data = new data($conexion);

if (!empty($_POST['id'])) {

    $data->id = $_POST['id'];
    echo $data->dataDelete();

} else {
    header("Location: ../404.php");
}