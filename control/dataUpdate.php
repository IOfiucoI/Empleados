<?php

require_once '../include/connection.php';
$database = new connect();
$conexion = $database->connect();

if (!empty($_POST['nombre'])) {

    $id         = $_POST['id'];
    $image      = $_FILES["image"]["name"];
    $type       = $_FILES["image"]["type"];
    $tmp_name   = $_FILES["image"]["tmp_name"];
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename   = date("Ymd_His") . "." . $ext;
    $url        = "profiles/img/" . $filename;
    $location   = "../profiles/img/" . $filename;
    $dir = "../profiles/img";

    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    $apellido   =    $_POST['apellido'];
    $nombre     =    $_POST['nombre'];
    $email      =    $_POST['email'];
    $face       =    $_POST['face'];
    $status     =    $_POST['status'];
    $ivac       =    $_POST['ivac'];
    $fvac       =    $_POST['fvac'];
    $id_e       =    $_POST['id_e'];
    $ads        =    $_POST['ads'];
    $area       =    $_POST['area'];
    $alta       =    $_POST['alta'];
    $baja       =    $_POST['baja'];
    $dom        =    $_POST['dom'];
    $telf       =    $_POST['telf'];
    $cel        =    $_POST['cel'];
    $fnac       =    $_POST['fnac'];
    $sex        =    $_POST['sex'];
    $edoc       =    $_POST['edoc'];
    $rfc        =    $_POST['rfc'];
    $ndcm       =    $_POST['ndcm'];
    $cod_ine    =    $_POST['cod_ine'];
    $ldm        =    $_POST['ldm'];
    $ndl        =    $_POST['ndl'];
    $alergia    =    $_POST['alergia'];
    $hijos      =    $_POST['hijos'];
    $ldn        =    $_POST['ldn'];
    $nac        =    $_POST['nac'];
    $gs         =    $_POST['gs'];
    $curp       =    $_POST['curp'];
    $mdcsm      =    $_POST['mdcsm'];
    $fine       =    $_POST['fine'];
    $tdl        =    $_POST['tdl'];
    $tele       =    $_POST['tele'];
    $sindi      =    $_POST['sindi'];

    $query = "SELECT * FROM data WHERE id_data = :id";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $imageUrl   = $row["img"];

    if (empty($image)) {

        $query = "UPDATE data SET 
                    img 	=	:image,
                    apellido=	:apellido,
                    nombre 	=	:nombre,
                    email 	=	:email,
                    face 	=	:face,
                    status 	=	:status, 
                    ivac 	=	:ivac,
                    fvac 	=	:fvac,
                    id_e 	=	:id_e,
                    ads 	=	:ads,
                    area 	=	:area, 
                    alta 	=	:alta,
                    baja 	=	:baja,
                    dom 	=	:dom,
                    telf 	=	:telf, 
                    cel 	=	:cel,
                    fnac 	=	:fnac, 
                    sex 	=	:sex,
                    edoc 	=	:edoc, 
                    rfc 	=	:rfc,
                    ndcm 	=	:ndcm, 
                    cod_ine =	:cod_ine,
                    ldm 	=	:ldm,
                    ndl 	=	:ndl,
                    alergia =	:alergia,
                    hijos 	=	:hijos,
                    ldn 	=	:ldn,
                    nac 	=	:nac,
                    gs 	    =	:gs,
                    curp 	=	:curp,
                    mdcsm 	=	:mdcsm, 
                    fine 	=	:fine,
                    tdl 	=	:tdl,
                    tele 	=	:tele,
                    sindi	=	:sindi
                WHERE id_data = :id";

        $stmt = $conexion->prepare($query);

        $stmt->bindParam(':id',     $id, PDO::PARAM_INT);
        $stmt->bindParam(':image',  $imageUrl, PDO::PARAM_STR, 100);
        $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR, 100);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR, 100);
        $stmt->bindParam(':email',  $email, PDO::PARAM_STR, 100);
        $stmt->bindParam(':face',   $face, PDO::PARAM_STR, 255);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR, 100);
        $stmt->bindParam(':ivac',   $ivac, PDO::PARAM_STR, 100);
        $stmt->bindParam(':fvac',   $fvac, PDO::PARAM_STR, 100);
        $stmt->bindParam(':id_e',   $id_e, PDO::PARAM_STR, 100);
        $stmt->bindParam(':ads',    $ads, PDO::PARAM_STR, 100);
        $stmt->bindParam(':area',   $area, PDO::PARAM_STR, 100);
        $stmt->bindParam(':alta',   $alta, PDO::PARAM_STR, 100);
        $stmt->bindParam(':baja',   $baja, PDO::PARAM_STR, 100);
        $stmt->bindParam(':dom',    $dom, PDO::PARAM_STR, 255);
        $stmt->bindParam(':telf',   $telf, PDO::PARAM_STR, 100);
        $stmt->bindParam(':cel',    $cel, PDO::PARAM_STR, 100);
        $stmt->bindParam(':fnac',   $fnac, PDO::PARAM_STR, 100);
        $stmt->bindParam(':sex',    $sex, PDO::PARAM_STR, 100);
        $stmt->bindParam(':edoc',   $edoc, PDO::PARAM_STR, 100);
        $stmt->bindParam(':rfc',    $rfc, PDO::PARAM_STR, 100);
        $stmt->bindParam(':ndcm',   $ndcm, PDO::PARAM_STR, 100);
        $stmt->bindParam(':cod_ine', $cod_ine, PDO::PARAM_STR, 100);
        $stmt->bindParam(':ldm',    $ldm, PDO::PARAM_STR, 100);
        $stmt->bindParam(':ndl',    $ndl, PDO::PARAM_STR, 100);
        $stmt->bindParam(':alergia', $alergia, PDO::PARAM_STR, 100);
        $stmt->bindParam(':hijos',  $hijos, PDO::PARAM_STR, 100);
        $stmt->bindParam(':ldn',    $ldn, PDO::PARAM_STR, 100);
        $stmt->bindParam(':nac',    $nac, PDO::PARAM_STR, 100);
        $stmt->bindParam(':gs',     $gs, PDO::PARAM_STR, 100);
        $stmt->bindParam(':curp',   $curp, PDO::PARAM_STR, 100);
        $stmt->bindParam(':mdcsm',  $mdcsm, PDO::PARAM_STR, 100);
        $stmt->bindParam(':fine',   $fine, PDO::PARAM_STR, 100);
        $stmt->bindParam(':tdl',    $tdl, PDO::PARAM_STR, 100);
        $stmt->bindParam(':tele',   $tele, PDO::PARAM_STR, 100);
        $stmt->bindParam(':sindi',  $sindi, PDO::PARAM_STR, 100);

        if ($stmt->execute()) {
            echo '1';
        } else {
            echo "0";
        }
        // } else {
        //     echo '2';
        // }
    } else {

        if ($type == 'image/jpeg' || $type == 'image/jpg') {
            // if ($passDB == $password_hash) {

            $query = "UPDATE data SET 
                             img 	=	:image,
                    apellido=	:apellido,
                    nombre 	=	:nombre,
                    email 	=	:email,
                    face 	=	:face,
                    status 	=	:status, 
                    ivac 	=	:ivac,
                    fvac 	=	:fvac,
                    id_e 	=	:id_e,
                    ads 	=	:ads,
                    area 	=	:area, 
                    alta 	=	:alta,
                    baja 	=	:baja,
                    dom 	=	:dom,
                    telf 	=	:telf, 
                    cel 	=	:cel,
                    fnac 	=	:fnac, 
                    sex 	=	:sex,
                    edoc 	=	:edoc, 
                    rfc 	=	:rfc,
                    ndcm 	=	:ndcm, 
                    cod_ine =	:cod_ine,
                    ldm 	=	:ldm,
                    ndl 	=	:ndl,
                    alergia =	:alergia,
                    hijos 	=	:hijos,
                    ldn 	=	:ldn,
                    nac 	=	:nac,
                    gs 	    =	:gs,
                    curp 	=	:curp,
                    mdcsm 	=	:mdcsm, 
                    fine 	=	:fine,
                    tdl 	=	:tdl,
                    tele 	=	:tele,
                    sindi	=	:sindi
                WHERE id_data = :id";

            $stmt = $conexion->prepare($query);

            $stmt->bindParam(':id',     $id, PDO::PARAM_INT);
            $stmt->bindParam(':image',  $url, PDO::PARAM_STR, 100);
            $stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR, 100);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR, 100);
            $stmt->bindParam(':email',  $email, PDO::PARAM_STR, 100);
            $stmt->bindParam(':face',   $face, PDO::PARAM_STR, 255);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR, 100);
            $stmt->bindParam(':ivac',   $ivac, PDO::PARAM_STR, 100);
            $stmt->bindParam(':fvac',   $fvac, PDO::PARAM_STR, 100);
            $stmt->bindParam(':id_e',   $id_e, PDO::PARAM_STR, 100);
            $stmt->bindParam(':ads',    $ads, PDO::PARAM_STR, 100);
            $stmt->bindParam(':area',   $area, PDO::PARAM_STR, 100);
            $stmt->bindParam(':alta',   $alta, PDO::PARAM_STR, 100);
            $stmt->bindParam(':baja',   $baja, PDO::PARAM_STR, 100);
            $stmt->bindParam(':dom',    $dom, PDO::PARAM_STR, 255);
            $stmt->bindParam(':telf',   $telf, PDO::PARAM_STR, 100);
            $stmt->bindParam(':cel',    $cel, PDO::PARAM_STR, 100);
            $stmt->bindParam(':fnac',   $fnac, PDO::PARAM_STR, 100);
            $stmt->bindParam(':sex',    $sex, PDO::PARAM_STR, 100);
            $stmt->bindParam(':edoc',   $edoc, PDO::PARAM_STR, 100);
            $stmt->bindParam(':rfc',    $rfc, PDO::PARAM_STR, 100);
            $stmt->bindParam(':ndcm',   $ndcm, PDO::PARAM_STR, 100);
            $stmt->bindParam(':cod_ine', $cod_ine, PDO::PARAM_STR, 100);
            $stmt->bindParam(':ldm',    $ldm, PDO::PARAM_STR, 100);
            $stmt->bindParam(':ndl',    $ndl, PDO::PARAM_STR, 100);
            $stmt->bindParam(':alergia', $alergia, PDO::PARAM_STR, 100);
            $stmt->bindParam(':hijos',  $hijos, PDO::PARAM_STR, 100);
            $stmt->bindParam(':ldn',    $ldn, PDO::PARAM_STR, 100);
            $stmt->bindParam(':nac',    $nac, PDO::PARAM_STR, 100);
            $stmt->bindParam(':gs',     $gs, PDO::PARAM_STR, 100);
            $stmt->bindParam(':curp',   $curp, PDO::PARAM_STR, 100);
            $stmt->bindParam(':mdcsm',  $mdcsm, PDO::PARAM_STR, 100);
            $stmt->bindParam(':fine',   $fine, PDO::PARAM_STR, 100);
            $stmt->bindParam(':tdl',    $tdl, PDO::PARAM_STR, 100);
            $stmt->bindParam(':tele',   $tele, PDO::PARAM_STR, 100);
            $stmt->bindParam(':sindi',  $sindi, PDO::PARAM_STR, 100);

            if ($stmt->execute()) {
                move_uploaded_file($tmp_name, $location);
                echo '1';
            } else {
                echo "0";
            }
            // } else {
            //     echo '2';
            // }
        } else {
            echo "img";
        }
    }
} else {
    echo "caida en else";
    // header('Location: ../index.php');
}


// require_once '../include/connection.php';
// require_once '../include/data.php';
// $database = new connect();
// $conexion = $database->connect();
// $data = new data($conexion);

// if (!empty($_POST['dataUser'])) {
//     $data->dataUser = $_POST['dataUser'];
//     $data->id_e    = $_POST['id_e'];
//     $data->ads     = $_POST['ads'];
//     $data->area    = $_POST['area'];
//     $data->alta    = $_POST['alta'];
//     $data->baja    = $_POST['baja'];
//     $data->dom     = $_POST['dom'];
//     $data->telf    = $_POST['telf'];
//     $data->cel     = $_POST['cel'];
//     $data->fnac    = $_POST['fnac'];
//     $data->sex     = $_POST['sex'];
//     $data->edoc    = $_POST['edoc'];
//     $data->rfc     = $_POST['rfc'];
//     $data->ndcm    = $_POST['ndcm'];
//     $data->cod_ine = $_POST['cod_ine'];
//     $data->ldm     = $_POST['ldm'];
//     $data->ndl     = $_POST['ndl'];
//     $data->alergia = $_POST['alergia'];
//     $data->hijos   = $_POST['hijos'];
//     $data->ldn     = $_POST['ldn'];
//     $data->nac     = $_POST['nac'];
//     $data->gs      = $_POST['gs'];
//     $data->curp    = $_POST['curp'];
//     $data->mdcsm   = $_POST['mdcsm'];
//     $data->fine    = $_POST['fine'];
//     $data->tdl     = $_POST['tdl'];
//     $data->tele    = $_POST['tele'];
//     $data->sindi   = $_POST['sindi'];

//     if ($data->updateData()) {
//         echo "true";
//     } else {
//         echo "false";
//     }
// } else {
//     echo 'data';
// }
