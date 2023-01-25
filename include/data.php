<?php
class data
{

    private $conn;
    private $table_name = "data";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function userData()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_data = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }

    function showData()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id_data desc";
        $stmt = $this->conn->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt;
    }

    function dataDelete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_data = :id ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            echo "true";
        } else {
            echo "false";
        }
    }

    function dataCreate()
    {

        $this->img;
        $this->type;
        $this->tmp_name;
        $ext        = pathinfo($this->img, PATHINFO_EXTENSION);
        $filename   = "img" . uniqid() . "." . $ext;
        $url        = "profiles/img/" . $filename;
        $location   = "../profiles/img/" . $filename;
        $dir = "../profiles/img";

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        if ($this->type == 'image/jpeg' || $this->type == 'image/jpg') {

            $query = "INSERT INTO " . $this->table_name . " SET
        
        img 	=	:img,
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
        sindi	=	:sindi";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':img',    $url, PDO::PARAM_STR, 100);
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
                move_uploaded_file($this->tmp_name, $location);
                echo "true";
            } else {
                echo "false";
            }
        } else {
            echo "img";
        }
    }

    function updateData()
    {
        $query = "UPDATE data SET
        img 	=	:img,
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

    WHERE data_user = :dataUser";

        $stmt = $this->conn->prepare($query);
            // $stmt->bindParam(':img',    $url, PDO::PARAM_STR, 100);
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
            return true;
        } else {
            return false;
        }
    }
}
