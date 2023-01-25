<?php
require_once '../include/connection.php';
require_once '../include/enterprise.php';
$database = new connect();
$conexion = $database->connect();
$enterprise = new enterprise($conexion);

if (
    !empty($_POST['id']) &&
    !empty($_POST['name'])
) {
    $enterprise->id         = $_POST['id'];
    $enterprise->name       = $_POST['name'];
    $enterprise->img        = $_FILES["image"]['name'];
    $enterprise->type       = $_FILES["image"]['type'];
    $enterprise->tmp_name   = $_FILES["image"]['tmp_name'];
    echo $enterprise->enterpriseUpdate();
} else {
    echo 'data';
}
