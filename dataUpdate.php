<?php
require 'session.php';
include 'header.php';
include 'include/data.php';

$user_id = $_GET['id'];
$data       = new data($conexion);
$data->id = $user_id;
$row    = $data->userData();
$rowExp = $row->fetch(PDO::FETCH_ASSOC);

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
                            <h3 class="fw-bold text-primary">Editar empleado</h3>
                        </div>

                        <div class="card-body">
                            <form method="POST" class="form-border bg-white user" id="actualizar" enctype="multipart/form-data">
                                <div class="row">
                                    <div id="response"></div>
                                    <div class="col-md-5">
                                        <label><strong>Foto de perfil:</strong></label>
                                        <div class="custom-file">
                                            <input type="file" name="image" id="file">
                                            <div id="preview" class="preview">
                                                <img src="<?php echo "{$rowExp["img"]}" ?>">
                                            </div>
                                            <script>
                                                function viewImage() {
                                                    document.getElementById("file").onchange = function(e) {
                                                        let reader = new FileReader();
                                                        reader.onload = function() {
                                                            let preview = document.getElementById('preview'),
                                                                image = document.createElement('img');
                                                            image.src = reader.result;
                                                            preview.innerHTML = '';
                                                            preview.append(image);
                                                        };
                                                        reader.readAsDataURL(e.target.files[0]);
                                                    }
                                                }
                                                viewImage();
                                            </script>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                    <input type="text" name="id" class="form-control" value='<?php echo $user_id ?>' hidden>
                                        <label><strong>Nombre(s):</strong></label>
                                        <input type="text" name="nombre" class="form-control" value='<?php echo "{$rowExp["nombre"]}" ?>' required>
                                        <label><strong>Apellido(s):</strong></label>
                                        <input type="text" name="apellido" class="form-control" value='<?php echo "{$rowExp["apellido"]}" ?>'>
                                        <label><strong>No. de Empleado:</strong></label>
                                        <input type="text" name="id_e" class="form-control" value='<?php echo "{$rowExp["id_e"]}" ?>'>
                                        <label><strong>Estado:</strong></label>
                                        <select class="form-control" name="status" required>
                                            <option value="<?php echo "{$rowExp["status"]}" ?>"><?php echo "{$rowExp["status"]}" ?></option>
                                            <option value="Activo">Activo</option>
                                            <option value="Inactivo">Inactivo</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label><strong>Correo:</strong></label>
                                        <input type="email" name="email" class="form-control" value="<?php echo "{$rowExp["email"]}" ?>">
                                    </div>


                                    <div class="col-md-6">
                                        <label><strong>URL Facebook:</strong></label>
                                        <input type="text" name="face" class="form-control" value="<?php echo "{$rowExp["face"]}" ?>">
                                    </div>

                                    <div class="col-md-4">
                                        <label><strong>Fecha de registro:</strong></label>
                                        <input type="date" name="alta" class="form-control" value="<?php echo "{$rowExp["alta"]}" ?>">
                                        <input type="date" name="baja" class="form-control" value="<?php echo "{$rowExp["baja"]}" ?>" hidden>
                                    </div>
                                    <div class="col-md-4">
                                        <label><strong>Inicio de vacaciones:</strong></label>
                                        <input type="date" name="ivac" class="form-control" value="<?php echo "{$rowExp["ivac"]}" ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label><strong>Terminan vacaciones:</strong></label>
                                        <input type="date" name="fvac" class="form-control" value="<?php echo "{$rowExp["fvac"]}" ?>">
                                    </div>
                                    <div class="col-md-8">
                                        <label><strong>Área de adscripción</strong></label>
                                        <input type="text" name="ads" class="form-control" value="<?php echo "{$rowExp["ads"]}" ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label><strong>Puesto</strong></label>
                                        <input type="text" name="area" class="form-control" value="<?php echo "{$rowExp["area"]}" ?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label><strong>Domicilio particular:</strong></label>
                                        <input type="text" name="dom" class="form-control" value="<?php echo "{$rowExp["dom"]}" ?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label><strong>Teléfono fijo:</strong></label>
                                        <input type="text" name="cel" class="form-control" value="<?php echo "{$rowExp["cel"]}" ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label><strong>Celular:</strong></label>
                                        <input type="text" name="telf" class="form-control" value="<?php echo "{$rowExp["telf"]}" ?>">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label><strong>Fecha de nacimiento:</strong></label>
                                        <input type="date" name="fnac" class="form-control" value="<?php echo "{$rowExp["fnac"]}" ?>">
                                        <label><strong>Sexo:</strong></label>
                                        <select class="form-control" name="sex">
                                            <option value="<?php echo "{$rowExp["sex"]}" ?>"><?php echo "{$rowExp["sex"]}" ?></option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                        <label><strong>Estado civil:</strong></label>
                                        <select class="form-control" name="edoc" required>
                                            <option value="<?php echo "{$rowExp["edoc"]}" ?>"><?php echo "{$rowExp["edoc"]}" ?></option>
                                            <option value="Soltero(a)">Soltero(a)</option>
                                            <option value="Casado(a)">Casado(a)</option>
                                            <option value="Divorciado(a)">Divorciado(a)</option>
                                            <option value="Viudo(a)">Viudo(a)</option>
                                        </select>
                                        <label><strong>RFC:</strong></label>
                                        <input type="text" name="rfc" class="form-control" value="<?php echo "{$rowExp["rfc"]}" ?>">
                                        <label><strong>No. Cartilla militar:</strong></label>
                                        <input type="text" name="ndcm" class="form-control" value="<?php echo "{$rowExp["ndcm"]}" ?>">
                                        <label><strong>INE:</strong></label>
                                        <input type="text" name="cod_ine" class="form-control" value="<?php echo "{$rowExp["cod_ine"]}" ?>">
                                        <label><strong>Licencia de manejo:</strong></label>
                                        <select class="form-control" name="ldm" required>
                                            <option value="<?php echo "{$rowExp["ldm"]}" ?>"><?php echo "{$rowExp["ldm"]}" ?></option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                        <label><strong>Numero de Licencia:</strong></label>
                                        <input type="text" name="ndl" class="form-control" value="<?php echo "{$rowExp["ndl"]}" ?>">
                                        <label><strong>Alergias:</strong></label>
                                        <input type="text" name="alergia" class="form-control" value="<?php echo "{$rowExp["alergia"]}" ?>">
                                        <label><strong>Hijos:</strong></label>
                                        <select class="form-control" name="hijos">
                                            <option value="<?php echo "{$rowExp["hijos"]}" ?>"><?php echo "{$rowExp["hijos"]}" ?></option>
                                            <option value="0">0</option>
                                            <option value="1 - 2">1 - 2</option>
                                            <option value="3 - 4">3 - 4</option>
                                            <option value="5 +">5+</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">

                                        <label><strong>Lugar de nacimiento:</strong></label>
                                        <input type="text" name="ldn" class="form-control" value="<?php echo "{$rowExp["ldn"]}" ?>">

                                        <label><strong>Nacionalidad:</strong></label>
                                        <input type="text" name="nac" class="form-control" value="<?php echo "{$rowExp["nac"]}" ?>">

                                        <label><strong>Tipo de sangre:</strong></label>
                                        <select class="form-control" name="gs" required>
                                            <option value="<?php echo "{$rowExp["gs"]}" ?>"><?php echo "{$rowExp["gs"]}" ?></option>
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
                                        <input type="text" name="curp" class="form-control" value="<?php echo "{$rowExp["curp"]}" ?>">

                                        <label><strong>Matrícula de servicio militar:</strong></label>
                                        <input type="text" name="mdcsm" class="form-control" value="<?php echo "{$rowExp["mdcsm"]}" ?>">

                                        <label><strong>Folio INE:</strong></label>
                                        <input type="text" name="fine" class="form-control" value="<?php echo "{$rowExp["fine"]}" ?>">

                                        <label><strong>Tipo de licencia:</strong></label>
                                        <select class="form-control" name="tdl" required>
                                            <option value="<?php echo "{$rowExp["tdl"]}" ?>"><?php echo "{$rowExp["tdl"]}" ?></option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="N/A">N/A</option>
                                        </select>

                                        <label><strong>Teléfono de emergencia:</strong></label>
                                        <input type="text" name="tele" class="form-control" value="<?php echo "{$rowExp["tele"]}" ?>">

                                        <label><strong>Sindicalizado:</strong></label>
                                        <select class="form-control" name="sindi" required>
                                            <option value="<?php echo "{$rowExp["sindi"]}" ?>"><?php echo "{$rowExp["sindi"]}" ?></option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <br><br>
                                <button type="submit" class="btn btn-success float-end text-white"><strong> ACTUALIZAR </strong></button>
                        </div>
                    </div>
                    </form>
                    <script type="text/javascript">
                        $(document).ready(function(e) {
                            $("#actualizar").on('submit', (function(e) {
                                e.preventDefault();
                                $.ajax({
                                    url: "control/dataUpdate.php",
                                    type: "POST",
                                    data: new FormData(this),
                                    contentType: false,
                                    cache: false,
                                    processData: false,
                                    success: function(data) {
                                        if (data == '0') {
                                            alert('Error al actualizar los datos.');
                                            location.reload();
                                        } else if (data == '1') {
                                            alert('Los datos se actualización correctamente.');
                                            top.location.href = "admin.php";
                                        } else if (data == 'img') {
                                            alert('Solo de admiten los formatos JPG y JPEG.');
                                            location.reload();
                                        } else {
                                            alert('Error al procesar los datos.');
                                            location.reload();
                                        }
                                    },
                                    error: function() {
                                        $('#response').html("<div class='alert alert-danger'><i class='bi bi-exclamation-triangle-fill'></i> Error al enviar los datos.");
                                    }
                                });
                            }));
                        });
                    </script>
                </div>
                <?php include 'footer.php'; ?>
            </div>
        </div>
    </div>
</body>

</html>