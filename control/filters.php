<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'include/connection.php';

session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: index.php');
}

$database = new connect();
$conexion = $database->connect();

$query_values = $_POST;
$extra_query = "WHERE Cancelled = 0 ";

if ($query_values) {
    $extra_query .= " AND ";
    $values = [];
    $queries = [];

    foreach ($query_values as $field_name => $field_value) {
        foreach ($field_value as $value) {
            $values[$field_name][] = " {$field_name} = '{$value}'";
        }
    }

    foreach ($values as $field_name => $field_values) {
        $queries[$field_name] = "(" . implode(" OR ", $field_values) . ")";
    }

    $extra_query .= " " . implode(" AND ", $queries);
}

$query = "SELECT * FROM data " . $extra_query;
$users = $conexion->query($query);

$user_list = [];

while ($user = $users->fetch(PDO::FETCH_ASSOC)) {
    $user_list[$user["id_data"]] = $user;
}

echo json_encode($user_list);
