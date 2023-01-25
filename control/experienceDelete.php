<?php
require '../include/connection.php';
require '../include/experience.php';
$database = new connect();
$conexion = $database->connect();
$experience = new experience($conexion);

if (!empty($_POST['id'])) {

    $experience->id = $_POST['id'];
    echo $experience->exDelete();

} else {
    header("Location: ../404.php");
}
