<?php
require_once '../include/connection.php';
require_once '../include/experience.php';
$database = new connect();
$conexion = $database->connect();
$experience = new experience($conexion);

if (
    !empty($_POST['id']) &&
    !empty($_POST['emp']) &&
    !empty($_POST['dir']) &&
    !empty($_POST['pue']) &&
    !empty($_POST['per'])
) {
    $experience->e_id = $_POST['id'];
    $experience->emp  = $_POST['emp'];
    $experience->dir  = $_POST['dir'];
    $experience->pue  = $_POST['pue'];
    $experience->per  = $_POST['per'];
    echo $experience->experienceUpdate();
} else {
    header("Location: ../404.php");
}
