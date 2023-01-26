<?php
require 'session.php';
require 'include/fpdf.php';
require 'include/connection.php';
include 'include/data.php';
include 'include/record.php';
include 'include/courses.php';
include 'include/enterprise.php';

$user_id = $_GET["id"];

$database   = new connect();
$conexion   = $database->connect();

$enterprise = new enterprise($conexion);
$stmt = $enterprise->enterpriseGet();
$rowEnterprise = $stmt->fetch(PDO::FETCH_ASSOC);
$image = $rowEnterprise["image"];
$name = $rowEnterprise["name"];

$data       = new data($conexion);
$data->id   = $user_id;
$reg        = $data->userData();
$col = $reg->fetch(PDO::FETCH_ASSOC);


class PDF extends FPDF
{
    function Header()
    {
        $this->Image($GLOBALS['image'], 10, 10, 40);
        $this->SetFont('Arial', 'B', 13);
        $this->Cell(80);
        $this->Cell(45, 10, $GLOBALS['name'], 0, 0, 'C');
        $this->Ln(20);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);

$pdf->Image($col['img'], 10, 30, 35);
$pdf->Line(10, 65, 195, 65);
// $pdf->Line(10, 73, 196, 73);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(60, 7, utf8_decode('Nombre: '), 0, 0, 'R');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(75, 7, utf8_decode($col['apellido'] . ' ' . $col['nombre']), 0, 0);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25, 7, utf8_decode('Registrado:'), 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 7, utf8_decode($col['alta']), 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(73, 7, utf8_decode('No de Empleado:'), 0, 0, 'R');

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(62, 7, utf8_decode($col['id_e']), 0, 0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 7, utf8_decode('Vacaciones:'), 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(57, 7, utf8_decode('Estado:'), 0, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(78, 7, utf8_decode($col['status']), 0, 0);
$pdf->Cell(55, 7, ('del ' . $col['ivac'] . ' al ' . $col['fvac']), 0, 1);


$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(55, 7, utf8_decode('Email:'), 0, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 7, utf8_decode($col['email']), 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(62, 7, utf8_decode('Facebook:'), 0, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 7, utf8_decode($col['face']), 0, 1);

$pdf->Cell(90, 2, '', 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(37, 7, utf8_decode('Area de adscripción:'), 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(60, 7, utf8_decode($col['ads']), 0, 0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(15, 7, 'Puesto: ', 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 7, $col['area'], 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(18, 7, utf8_decode('Domicilio:'), 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(90, 7, utf8_decode($col['dom']), 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(15, 7, utf8_decode('Celular:'), 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(82, 7, utf8_decode($col['cel']), 0, 0);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25, 7, utf8_decode('Telefono fijo:'), 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(90, 7, utf8_decode($col['telf']), 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(38, 10, utf8_decode('Fecha de Nacimiento:'), 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(59, 10, utf8_decode($col['fnac']), 0, 0);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(38, 10, utf8_decode('Lugar de Nacimiento: '), 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(90, 10, utf8_decode($col['ldn']), 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(12, 7, 'Sexo:');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(85, 7, $col['sex'], 0, 0);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25, 7, utf8_decode('Nacionalidad:'), 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(90, 7, utf8_decode($col['nac']), 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(23, 7, 'Estado Civil:', 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(74, 7, $col['edoc'], 0, 0);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(29, 7, 'Tipo de Sangre:', 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(20, 7, $col['gs'], 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 7, utf8_decode('RFC: '), 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(87, 7, utf8_decode($col['rfc']), 0, 0);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(12, 7, utf8_decode('CURP:'), 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(90, 7, utf8_decode($col['curp']), 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(37, 7, utf8_decode('No. de cartilla militar: '), 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(60, 7, utf8_decode($col['ndcm']), 0, 0);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(49, 7, utf8_decode('Matrícula de servicio militar: '), 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 7, utf8_decode($col['mdcsm']), 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(8, 7, utf8_decode('INE: '), 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(89, 7, utf8_decode($col['cod_ine']), 0, 0);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(17, 7, utf8_decode('Folio INE:'), 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(70, 7, utf8_decode($col['fine']), 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(35, 7, utf8_decode('Licencia de manejo: '), 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(62, 7, utf8_decode($col['ldm']), 0, 0);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(29, 7, utf8_decode('Tipo de licencia:'), 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(25, 7, utf8_decode($col['tdl']), 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(35, 7, utf8_decode('Número de licencia:'), 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(62, 7, utf8_decode($col['ndl']), 0, 0);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(44, 7, utf8_decode('Teléfono de emergencia: '), 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(60, 7, utf8_decode($col['tele']), 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(17, 7, utf8_decode('Alergias:'), 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(80, 7, utf8_decode($col['alergia']), 0, 0);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25, 7, utf8_decode('Sindicalizado: '), 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(90, 7, utf8_decode($col['sindi']), 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(12, 7, utf8_decode('Hijos:'), 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(90, 7, utf8_decode($col['hijos']), 0, 0);

$pdf->Output();
