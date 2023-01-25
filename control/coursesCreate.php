<?php
require_once '../include/connection.php';
require_once '../include/courses.php';
$database = new connect();
$conexion = $database->connect();
$courses = new courses($conexion);

if (
    !empty($_POST['user']) &&
    !empty($_POST['nom']) &&
    !empty($_POST['per'])
) {

    $courses->id   = $_POST['user'];
    $courses->nom  = $_POST['nom'];
    $courses->per  = $_POST['per'];
    $courses->doc  = $_FILES["doc"]['name'];
    $courses->type = $_FILES["doc"]['type'];
    $courses->tmp_name = $_FILES["doc"]['tmp_name'];
    echo $courses->coursesCreate();
} else {
    echo 'data';
}
