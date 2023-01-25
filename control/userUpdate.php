<?php
require_once '../include/connection.php';
$database = new connect();
$conexion = $database->connect();

if (!empty($_POST['name'])) {

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

    // $password_hash = md5($pass);

    $query = "SELECT img FROM data WHERE id_data = :id";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $imageUrl   = $row["img"];
    // $passDB     = $row["user_pass"];

    if (empty($image)) {

        // if ($passDB == $password_hash) {

        $query = "UPDATE users SET 
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
        $stmt->bindParam(':apellido', $this->apellido, PDO::PARAM_STR, 100);
        $stmt->bindParam(':nombre', $this->nombre, PDO::PARAM_STR, 100);
        $stmt->bindParam(':email',  $this->email, PDO::PARAM_STR, 100);
        $stmt->bindParam(':face',   $this->face, PDO::PARAM_STR, 255);
        $stmt->bindParam(':status', $this->status, PDO::PARAM_STR, 100);
        $stmt->bindParam(':ivac',   $this->ivac, PDO::PARAM_STR, 100);
        $stmt->bindParam(':fvac',   $this->fvac, PDO::PARAM_STR, 100);
        $stmt->bindParam(':id_e',   $this->id_e, PDO::PARAM_STR, 100);
        $stmt->bindParam(':ads',    $this->ads, PDO::PARAM_STR, 100);
        $stmt->bindParam(':area',   $this->area, PDO::PARAM_STR, 100);
        $stmt->bindParam(':alta',   $this->alta, PDO::PARAM_STR, 100);
        $stmt->bindParam(':baja',   $this->baja, PDO::PARAM_STR, 100);
        $stmt->bindParam(':dom',    $this->dom, PDO::PARAM_STR, 255);
        $stmt->bindParam(':telf',   $this->telf, PDO::PARAM_STR, 100);
        $stmt->bindParam(':cel',    $this->cel, PDO::PARAM_STR, 100);
        $stmt->bindParam(':fnac',   $this->fnac, PDO::PARAM_STR, 100);
        $stmt->bindParam(':sex',    $this->sex, PDO::PARAM_STR, 100);
        $stmt->bindParam(':edoc',   $this->edoc, PDO::PARAM_STR, 100);
        $stmt->bindParam(':rfc',    $this->rfc, PDO::PARAM_STR, 100);
        $stmt->bindParam(':ndcm',   $this->ndcm, PDO::PARAM_STR, 100);
        $stmt->bindParam(':cod_ine', $this->cod_ine, PDO::PARAM_STR, 100);
        $stmt->bindParam(':ldm',    $this->ldm, PDO::PARAM_STR, 100);
        $stmt->bindParam(':ndl',    $this->ndl, PDO::PARAM_STR, 100);
        $stmt->bindParam(':alergia', $this->alergia, PDO::PARAM_STR, 100);
        $stmt->bindParam(':hijos',  $this->hijos, PDO::PARAM_STR, 100);
        $stmt->bindParam(':ldn',    $this->ldn, PDO::PARAM_STR, 100);
        $stmt->bindParam(':nac',    $this->nac, PDO::PARAM_STR, 100);
        $stmt->bindParam(':gs',     $this->gs, PDO::PARAM_STR, 100);
        $stmt->bindParam(':curp',   $this->curp, PDO::PARAM_STR, 100);
        $stmt->bindParam(':mdcsm',  $this->mdcsm, PDO::PARAM_STR, 100);
        $stmt->bindParam(':fine',   $this->fine, PDO::PARAM_STR, 100);
        $stmt->bindParam(':tdl',    $this->tdl, PDO::PARAM_STR, 100);
        $stmt->bindParam(':tele',   $this->tele, PDO::PARAM_STR, 100);
        $stmt->bindParam(':sindi',  $this->sindi, PDO::PARAM_STR, 100);

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

        if ($type == 'image/jpeg' || $type == 'image/jpg') {
            // if ($passDB == $password_hash) {

            $query = "UPDATE users SET 
                            user_image  = :image,
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
            $stmt->bindParam(':apellido', $this->apellido, PDO::PARAM_STR, 100);
            $stmt->bindParam(':nombre', $this->nombre, PDO::PARAM_STR, 100);
            $stmt->bindParam(':email',  $this->email, PDO::PARAM_STR, 100);
            $stmt->bindParam(':face',   $this->face, PDO::PARAM_STR, 255);
            $stmt->bindParam(':status', $this->status, PDO::PARAM_STR, 100);
            $stmt->bindParam(':ivac',   $this->ivac, PDO::PARAM_STR, 100);
            $stmt->bindParam(':fvac',   $this->fvac, PDO::PARAM_STR, 100);
            $stmt->bindParam(':id_e',   $this->id_e, PDO::PARAM_STR, 100);
            $stmt->bindParam(':ads',    $this->ads, PDO::PARAM_STR, 100);
            $stmt->bindParam(':area',   $this->area, PDO::PARAM_STR, 100);
            $stmt->bindParam(':alta',   $this->alta, PDO::PARAM_STR, 100);
            $stmt->bindParam(':baja',   $this->baja, PDO::PARAM_STR, 100);
            $stmt->bindParam(':dom',    $this->dom, PDO::PARAM_STR, 255);
            $stmt->bindParam(':telf',   $this->telf, PDO::PARAM_STR, 100);
            $stmt->bindParam(':cel',    $this->cel, PDO::PARAM_STR, 100);
            $stmt->bindParam(':fnac',   $this->fnac, PDO::PARAM_STR, 100);
            $stmt->bindParam(':sex',    $this->sex, PDO::PARAM_STR, 100);
            $stmt->bindParam(':edoc',   $this->edoc, PDO::PARAM_STR, 100);
            $stmt->bindParam(':rfc',    $this->rfc, PDO::PARAM_STR, 100);
            $stmt->bindParam(':ndcm',   $this->ndcm, PDO::PARAM_STR, 100);
            $stmt->bindParam(':cod_ine', $this->cod_ine, PDO::PARAM_STR, 100);
            $stmt->bindParam(':ldm',    $this->ldm, PDO::PARAM_STR, 100);
            $stmt->bindParam(':ndl',    $this->ndl, PDO::PARAM_STR, 100);
            $stmt->bindParam(':alergia', $this->alergia, PDO::PARAM_STR, 100);
            $stmt->bindParam(':hijos',  $this->hijos, PDO::PARAM_STR, 100);
            $stmt->bindParam(':ldn',    $this->ldn, PDO::PARAM_STR, 100);
            $stmt->bindParam(':nac',    $this->nac, PDO::PARAM_STR, 100);
            $stmt->bindParam(':gs',     $this->gs, PDO::PARAM_STR, 100);
            $stmt->bindParam(':curp',   $this->curp, PDO::PARAM_STR, 100);
            $stmt->bindParam(':mdcsm',  $this->mdcsm, PDO::PARAM_STR, 100);
            $stmt->bindParam(':fine',   $this->fine, PDO::PARAM_STR, 100);
            $stmt->bindParam(':tdl',    $this->tdl, PDO::PARAM_STR, 100);
            $stmt->bindParam(':tele',   $this->tele, PDO::PARAM_STR, 100);
            $stmt->bindParam(':sindi',  $this->sindi, PDO::PARAM_STR, 100);

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
    header('Location: ../index.php');
}
