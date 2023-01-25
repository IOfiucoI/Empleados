<?php
require_once '../include/connection.php';
require_once '../include/record.php';
$database = new connect();
$conexion = $database->connect();
$record = new record($conexion);

if (!empty($_POST['id'])) {

    $record->id = $_POST['id'];
    echo $record->recordDelete();

} else {
    header("Location: ../404.php");
}