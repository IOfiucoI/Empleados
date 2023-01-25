<?php
include '../include/connection.php';
include '../include/data.php';
$database = new connect();
$conexion = $database->connect();
$data = new data($conexion);

if(!empty($_POST['apellido'])){

    $data->img  = $_FILES["img"]['name'];
    $data->type = $_FILES["img"]['type'];
    $data->tmp_name = $_FILES["img"]['tmp_name'];

    $data->apellido = $_POST['apellido'];
    $data->nombre   = $_POST['nombre'];
    $data->email    = $_POST['email'];
    $data->face    = $_POST['face'];
    $data->status   = $_POST['status'];
    $data->ivac     = $_POST['ivac'];
    $data->fvac     = $_POST['fvac'];
    $data->id_e    = $_POST['id_e'];
    $data->ads     = $_POST['ads'];
    $data->area    = $_POST['area'];
    $data->alta    = $_POST['alta'];
    $data->baja    = $_POST['baja'];
    $data->dom     = $_POST['dom'];
    $data->telf    = $_POST['telf'];
    $data->cel     = $_POST['cel'];
    $data->fnac    = $_POST['fnac'];
    $data->sex     = $_POST['sex'];
    $data->edoc    = $_POST['edoc'];
    $data->rfc     = $_POST['rfc'];
    $data->ndcm    = $_POST['ndcm'];
    $data->cod_ine = $_POST['cod_ine'];
    $data->ldm     = $_POST['ldm'];
    $data->ndl     = $_POST['ndl'];
    $data->alergia = $_POST['alergia'];
    $data->hijos   = $_POST['hijos'];
    $data->ldn     = $_POST['ldn'];
    $data->nac     = $_POST['nac'];
    $data->gs      = $_POST['gs'];
    $data->curp    = $_POST['curp'];
    $data->mdcsm   = $_POST['mdcsm'];
    $data->fine    = $_POST['fine'];
    $data->tdl     = $_POST['tdl'];
    $data->tele    = $_POST['tele'];
    $data->sindi   = $_POST['sindi'];
    echo $data->dataCreate();

}else{
    echo "data" ;
}
