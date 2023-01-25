<?php
require 'session.php';
include 'header.php';
include 'include/data.php';
include 'include/record.php';
include 'include/courses.php';

$user_id = $_GET["id"];

$data       = new data($conexion);
$data->id = $user_id;
$reg        = $data->userData();
$col = $reg->fetch(PDO::FETCH_ASSOC);

$rec       = new record($conexion);
$rec->r_user = $user_id;
$record    = $rec->recordData();

$courses       = new courses($conexion);
$courses->id = $user_id;
$cours    = $courses->coursesData();

?>

<body>
    <div id="wrapper" class="bgris">
        <?php
        include 'nav.php';
        ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="page-top" class="bgris">
                <div class="container-fluid">
                    <br>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="<?php echo "{$col["img"]}"; ?>" class="img-user"></img>
                                    </div>
                                    <div class="col-md-5">
                                        <h3><strong><?php echo "{$col["apellido"]} " . "{$col["nombre"]} "; ?></strong></h3>
                                        <p><strong>No. de Empleado</strong> <?php echo "{$col["id_e"]}" ?></p>
                                        <p><Strong>Estado:</Strong> <?php echo "{$col["status"]}"; ?></p>
                                        <p><Strong>Correo:</Strong> <?php echo "{$col["email"]}"; ?></p>
                                        

                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center text-white">
                                            <h3>
                                            <a href="dataUpdate.php?id=<?php echo $user_id ?>" class="btn btn-success bg-success text-white">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <button id="deluser" type="button" class="btn btn-danger bg-danger" value="<?php echo "{$col["id_data"]}" ?>">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                            </h3>
                                        </div>
                                        <p><strong>Fecha de Registro:</strong> <?php echo "{$col["alta"]}" ?></p>
                                        <p><Strong>Inicio de vacaciones:</Strong> <?php echo "{$col["ivac"]}"; ?></p>
                                        <p><Strong>Terminan de vacaciones:</Strong> <?php echo "{$col["fvac"]}"; ?></p>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Área de Adscripción</strong> <?php echo "{$col["ads"]}" ?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Puesto</strong> <?php echo "{$col["area"]}" ?></p>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p><strong>Domicilio Particular:</strong> <?php echo "{$col["dom"]}" ?> </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Celular: </strong><?php echo "{$col["cel"]}" ?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Teléfono fijo:</strong> <?php echo "{$col["telf"]}" ?></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <hr>

                                        <div class="col-md-6">
                                            <p><strong>Fecha de nacimiento: </strong><?php echo "{$col["fnac"]}" ?></p>
                                            <p><strong>Sexo: </strong><?php echo "{$col["sex"]}" ?></p>
                                            <p><strong>Estado civil: </strong><?php echo "{$col["edoc"]}" ?></p>
                                            <p><strong>RFC: </strong><?php echo "{$col["rfc"]}" ?></p>
                                            <p><strong>No. Cartilla militar: </strong><?php echo "{$col["ndcm"]}" ?></p>
                                            <p><strong>INE: </strong><?php echo "{$col["cod_ine"]}" ?></p>
                                            <p><strong>Licencia de manejo: </strong><?php echo "{$col["ldm"]}" ?></p>
                                            <p><strong>Alergias: </strong><?php echo "{$col["alergia"]}" ?></p>
                                            <p><strong>Hijos: </strong><?php echo "{$col["hijos"]}" ?></p>
                                        </div>

                                        <div class="col-md-6">
                                            <p><strong>Lugar de Nacimiento: </strong> <?php echo "{$col["ldn"]}" ?></p>
                                            <p><strong>Nacionalidad: </strong> <?php echo "{$col["nac"]}" ?></p>
                                            <p><strong>Tipo de Sangre: </strong><?php echo "{$col["gs"]}" ?></p>
                                            <p><strong>CURP:</strong><?php echo " {$col["curp"]}" ?></p>
                                            <p><strong>Matrícula de servicio militar:</strong><?php echo " {$col["ndcm"]}" ?></p>
                                            <p><strong>Folio INE:</strong><?php echo " {$col["fine"]}" ?></p>
                                            <p><strong>Tipo de licencia:</strong><?php echo " {$col["tdl"]}" ?></p>
                                            <p><strong>Teléfono de emergencia:</strong><?php echo " {$col["tele"]}" ?></p>
                                            <p><strong>Sindicalizado:</strong><?php echo " {$col["sindi"]}" ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <div class="card-body">
                                        <h3 class="text-primary fw-bold float-start">Historial académico</h3>
                                        <a href="recordCreate.php?id=<?php echo $user_id ?>">
                                            <button type="button" class="btn btn-primary float-end">
                                                <i class="fas fa-plus"></i> Agregar
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div clas="row">
                                    <div class="col-md-12 p-4">
                                        <div class="table-responsive table mt-2" id="dataTable" role="grid">
                                            <table class="table my-0" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>ESCUELA</th>
                                                        <th>UBICACIÓN</th>
                                                        <th class="text-center">&nbsp;&nbsp;PERIODO&nbsp;&nbsp;</th>
                                                        <th class="text-center">PDF</th>
                                                        <th>&nbsp;OPCIONES&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($recordData = $record->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <tr>
                                                            <td><?php echo "{$recordData["r_esc"]}"; ?></td>
                                                            <td><?php echo "{$recordData["r_ubi"]}"; ?></td>
                                                            <td><?php echo "{$recordData["r_per"]}"; ?></td>
                                                            <td class="text-center"> <a href="<?php echo "{$recordData["r_doc"]}"; ?>" target="_blank"><i class="fas fa-file-pdf"></i></a></td>
                                                            <td>
                                                                <div class="text-center text-white float-end">
                                                                    <a href="recordUpdate.php?id=<?php echo $user_id ?>&r_id=<?php echo "{$recordData["r_id"]}"; ?>" class="btn btn-success bg-success text-white">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <button id="delRec" type="button" class="btn btn-danger bg-danger" value="<?php echo "{$recordData["r_id"]}" ?>?>">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <div class="card-body">
                                        <h3 class="text-primary fw-bold float-start">Cursos recibidos</h3>
                                        <a href="coursesCreate.php?id=<?php echo $user_id ?>">
                                            <button type="button" class="btn btn-primary float-end">
                                                <i class="fas fa-plus"></i> Agregar
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div clas="row">
                                    <div class="col-md-12 p-4">
                                        <div class="table-responsive table mt-2" id="dataTable" role="grid">
                                            <table class="table my-0" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>NOMBRE</th>
                                                        <th class="text-center">PERIODO</th>
                                                        <th class="text-center">&nbsp;DOCUMENTOS&nbsp;</th>
                                                        <th class="text-center">OPCIONES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    while ($rowCours = $cours->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo "{$rowCours["c_nom"]}"; ?></td>
                                                            <td class="text-center"><?php echo "{$rowCours["c_per"]}"; ?></td>
                                                            <td class="text-center"> <a href="<?php echo "{$rowCours["c_doc"]}"; ?>" target="_blank"><i class="fas fa-file-pdf"></i></a></td>
                                                            <td class="text-center">
                                                                <div class="text-center text-white float-end">
                                                                    <a href="coursesUpdate.php?id=<?php echo $user_id ?>&c_id=<?php echo "{$rowCours["c_id"]}"; ?>" class="btn btn-success bg-success text-white">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <button id="delCor" type="button" class="btn btn-danger bg-danger" value="<?php echo "{$rowCours["c_id"]}" ?>">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <div class="card-body">
                                        <h3 class="text-primary fw-bold float-start">Experiencia laboral</h3>
                                        <a href="experienceCreate.php?id=<?php echo $user_id ?>">
                                            <button type="button" class="btn btn-primary float-end">
                                                <i class="fas fa-plus"></i> Agregar
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div clas="row">
                                    <div class="col-md-12 p-4">
                                        <div class="table-responsive table mt-2" id="dataTable" role="grid">
                                            <table class="table my-0" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>EMPRESA</th>
                                                        <th class="text-center">DIRECCIÓN</th>
                                                        <th class="text-center">PUESTO</th>
                                                        <th class="text-center">&nbsp;PERIODO&nbsp;</th>
                                                        <th class="text-center">&nbsp;OPCIONES&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php

                                                    require 'include/experience.php';
                                                    $exp       = new experience($conexion);
                                                    $exp->id = $user_id;
                                                    $experiece    = $exp->experienceData();
                                                    while ($rowExp = $experiece->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <tr>
                                                            <td><?php echo "{$rowExp["e_emp"]}"; ?></td>
                                                            <td class="text-center"><?php echo "{$rowExp["e_dir"]}"; ?></td>
                                                            <td class="text-center"><?php echo "{$rowExp["e_pue"]}"; ?></td>
                                                            <td class="text-center"><?php echo "{$rowExp["e_per"]}"; ?></td>
                                                            <td class="text-center">
                                                                <div class="text-white ">
                                                                    <a href="experienceUpdate.php?id=<?php echo $user_id ?>&e_id=<?php echo "{$rowExp["e_id"]}"; ?>" class="btn btn-success bg-success text-white">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <button id="delExp" type="button" class="btn btn-danger bg-danger" value="<?php echo "{$rowExp["e_id"]}" ?>">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'footer.php'; ?>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            $('button#deluser').click(function() {
                var id = $(this).val();
                $.ajax({
                    url: 'control/dataDelete.php',
                    type: 'POST',
                    cahe: false,
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data == 'true') {
                            alert('El registro se eliminó corectamente.');
                            top.location.href = "admin.php";
                        } else {
                            $('#response').html("<div class='alert alert-danger'><i class='fas fa-exclamation-triangle'></i> No se puede eliminar el registro.");
                        }
                    },
                    error: function() {
                        $('#response').html("<div class='alert alert-danger'><i class='fas fa-exclamation-triangle'></i> Error al procesar los datos.");
                    }
                });
            });

            $('button#delRec').click(function() {
                var id = $(this).val();
                $.ajax({
                    url: 'control/recordDelete.php',
                    type: 'POST',
                    cahe: false,
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data == 'true') {
                            alert('El registro se eliminó corectamente.');
                            top.location.href = "user.php?id=<?php echo $user_id ?>";
                        } else {
                            $('#response').html("<div class='alert alert-danger'><i class='fas fa-exclamation-triangle'></i> No se puede eliminar el registro.");
                        }
                    },
                    error: function() {
                        $('#response').html("<div class='alert alert-danger'><i class='fas fa-exclamation-triangle'></i> Error al procesar los datos.");
                    }
                });
            });

            $('button#delCor').click(function() {
                var id = $(this).val();
                $.ajax({
                    url: 'control/coursesDelete.php',
                    type: 'POST',
                    cahe: false,
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data == 'true') {
                            alert('El registro se eliminó corectamente.');
                            top.location.href = "user.php?id=<?php echo $user_id ?>";
                        } else {
                            $('#response').html("<div class='alert alert-danger'><i class='fas fa-exclamation-triangle'></i> No se puede eliminar el registro.");
                        }
                    },
                    error: function() {
                        $('#response').html("<div class='alert alert-danger'><i class='fas fa-exclamation-triangle'></i> Error al procesar los datos.");
                    }
                });
            });

            $('button#delExp').click(function() {
                var id = $(this).val();
                $.ajax({
                    url: 'control/experienceDelete.php',
                    type: 'POST',
                    cahe: false,
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data == 'true') {
                            alert('El registro se eliminó corectamente.');
                            top.location.href = "user.php?id=<?php echo $user_id ?>";
                        } else {
                            $('#response').html("<div class='alert alert-danger'><i class='fas fa-exclamation-triangle'></i> No se puede eliminar el registro.");
                        }
                    },
                    error: function() {
                        $('#response').html("<div class='alert alert-danger'><i class='fas fa-exclamation-triangle'></i> Error al procesar los datos.");
                    }
                });
            });
        })
    </script>
</body>

</html>