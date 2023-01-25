<?php
require_once '../include/connection.php';
require_once '../include/courses.php';
$database = new connect();
$conexion = $database->connect();
$courses = new courses($conexion);

if (!empty($_POST['id'])) {

    $courses->id = $_POST['id'];
    echo $courses->coursesDelete();

} else {
    header("Location: ../404.php");
}