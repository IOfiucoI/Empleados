<?php
require 'session.php';
include 'header.php';
include 'include/data.php';

$data       = new data($conexion);
$stmt       = $data->userData();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<body>


    <div id="wrapper" class="bgris">
        <?php
        include 'nav.php';
        ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="page-top">
                <br>
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h3 class="fw-bold text-primary">Registrar Empleado</h3>
                        </div>
                        <div class="card-body">

                            <form method="POST" class="form-border bg-white user" id="dataUpdate">
                                <div class="row">
                                    <div id="response"></div>
                                    <div class="col-md-2">
                                        <input type="text" name="dataUser" class="form-control" value="<?php echo "{$row["data_user"]}" ?>" hidden>
                                        <label><strong>No. de Empleado</strong></label>
                                        <input type="text" name="id_e" class="form-control" value="<?php echo "{$row["id_e"]}" ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label><strong>Área de Adscripción</strong></label>
                                        <input type="text" name="ads" class="form-control" value="<?php echo "{$row["ads"]}" ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label><strong>Puesto</strong></label>
                                        <input type="text" name="area" class="form-control" value="<?php echo "{$row["area"]}" ?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label><strong>Fecha de Registro:</strong></label>
                                        <input type="text" name="alta" value="<?php echo "{$row["alta"]}" ?>" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label><strong>Fecha de Cancelación:</strong></label>
                                        <input type="text" name="baja" value="<?php echo "{$row["baja"]}" ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label><strong>Domicilio Particular:</strong></label>
                                        <input type="text" name="dom" class="form-control" value="<?php echo "{$row["dom"]}" ?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label><strong>Teléfono Fijo:</strong></label>
                                        <input type="text" name="telf" class="form-control" value="<?php echo "{$row["telf"]}" ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label><strong>Celular:</strong></label>
                                        <input type="text" name="cel" class="form-control" value="<?php echo "{$row["cel"]}" ?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label><strong>Fecha de Nacimiento:</strong></label>
                                        <input type="text" name="fnac" class="form-control" value="<?php echo "{$row["fnac"]}" ?>">
                                        <label><strong>Sexo:</strong></label>
                                        <select class="form-select" name="sex">
                                            <option value="<?php echo "{$row["sex"]}" ?>"><?php echo "{$row["sex"]}" ?></option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                        <label><strong>Estado Civil:</strong></label>
                                        <select class="form-select" name="edoc">
                                            <option value="<?php echo "{$row["edoc"]}" ?>"><?php echo "{$row["edoc"]}" ?></option>
                                            <option value="Soltero(a)">Soltero(a)</option>
                                            <option value="Casado(a)">Casado(a)</option>
                                            <option value="Divorciado(a)">Divorciado(a)</option>
                                            <option value="Viudo(a)">Viudo(a)</option>
                                        </select>
                                        <label><strong>RFC:</strong></label>
                                        <input type="text" name="rfc" class="form-control" value="<?php echo "{$row["rfc"]}" ?>">
                                        <label><strong>No. Cartilla Militar:</strong></label>
                                        <input type="text" name="ndcm" class="form-control" value="<?php echo "{$row["ndcm"]}" ?>">
                                        <label><strong>INE:</strong></label>
                                        <input type="text" name="cod_ine" class="form-control" value="<?php echo "{$row["cod_ine"]}" ?>">
                                        <label><strong>Licencia de Manejo:</strong></label>
                                        <select class="form-select" name="ldm">
                                            <option value="<?php echo "{$row["ldm"]}" ?>"><?php echo "{$row["ldm"]}" ?></option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                        <label><strong>Número de licencia:</strong></label>
                                        <input type="text" name="ndl" class="form-control" value="<?php echo "{$row["ndl"]}" ?>">

                                        <label><strong>Alergias:</strong></label>
                                        <input type="text" name="alergia" class="form-control" value="<?php echo "{$row["alergia"]}" ?>">
                                        <label><strong>Hijos:</strong></label>
                                        <select class="form-select" name="hijos">
                                            <option value="<?php echo "{$row["hijos"]}" ?>"><?php echo "{$row["hijos"]}" ?></option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5+">5+</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">

                                        <label><strong>Lugar de nacimiento:</strong></label>
                                        <input type="text" name="ldn" class="form-control" value="<?php echo "{$row["ldn"]}" ?>">

                                        <label><strong>Nacionalidad:</strong></label>
                                        <input type="text" name="nac" class="form-control" value="<?php echo "{$row["nac"]}" ?>">

                                        <label><strong>Tipo de sangre:</strong></label>
                                        <select class="form-select" name="gs">
                                            <option value="<?php echo "{$row["gs"]}" ?>"><?php echo "{$row["gs"]}" ?></option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>

                                        <label><strong>CURP:</strong></label>
                                        <input type="text" name="curp" class="form-control" value="<?php echo "{$row["curp"]}" ?>">

                                        <label><strong>Matrícula de servicio militar:</strong></label>
                                        <input type="text" name="mdcsm" class="form-control" value="<?php echo "{$row["mdcsm"]}" ?>">

                                        <label><strong>Folio INE:</strong></label>
                                        <input type="text" name="fine" class="form-control" value="<?php echo "{$row["fine"]}" ?>">

                                        <label><strong>Tipo de licencia:</strong></label>
                                        <select class="form-select" name="tdl">
                                            <option value="<?php echo "{$row["tdl"]}" ?>"><?php echo "{$row["tdl"]}" ?></option>
                                            <option value="N/A">N/A</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>

                                        <label><strong>Teléfono de emergencia:</strong></label>
                                        <input type="text" name="tele" class="form-control" value="<?php echo "{$row["tele"]}" ?>">

                                        <label><strong>Sindicalizado:</strong></label>

                                        <select class="form-select" name="sindi">
                                            <option value="<?php echo "{$row["sindi"]}" ?>"><?php echo "{$row["sindi"]}" ?></option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>

                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success float-end text-white"><i class="fas fa-sync-alt"></i><strong> ACTUALIZAR</strong></button>
                        </div>
                        </form>
                    </div>
                    <?php include 'footer.php'; ?>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $("#dataUpdate").on('submit', (function(e) {
                e.preventDefault();
                $.ajax({
                    url: "control/dataUpdate.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if (data == 'true') {
                            $('#response').html("<div class='alert alert-success'><i class='bi bi-exclamation-triangle-fill'></i> Datos actualizados correctamente.</div>");
                        } else if (data == 'false') {
                            $('#response').html("<div class='alert alert-danger'><i class='bi bi-exclamation-triangle-fill'></i> Error al actualizar los datos.");
                        } else if (data == 'data') {
                            $('#response').html("<div class='alert alert-warning'><i class='bi bi-exclamation-triangle-fill'></i> Verifique que los datos esten completos.");
                        } else {
                            $('#response').html("<div class='alert alert-danger'><i class='bi bi-exclamation-triangle-fill'></i> Error en en la base de datos.");
                        }
                    },
                    error: function() {
                        $('#response').html("<div class='alert alert-danger'><i class='bi bi-exclamation-triangle-fill'></i>Error al enviar los datos");
                    }
                });
            }));
        });
    </script>

</body>

</html>