<?php
require_once '../include/connection.php';
require_once '../include/courses.php';
$database = new connect();
$conexion = $database->connect();
$courses = new courses($conexion);

if (
    !empty($_POST['c_id']) &&
    !empty($_POST['nom']) &&
    !empty($_POST['per'])
) {
    $courses->c_id        = $_POST['c_id'];
    $courses->nom       = $_POST['nom'];
    $courses->per       = $_POST['per'];
    $courses->doc       = $_FILES["doc"]['name'];
    $courses->type      = $_FILES["doc"]['type'];
    $courses->tmp_name  = $_FILES["doc"]['tmp_name'];
    echo $courses->coursesUpdate();
} else {
    echo 'data';
}
