<?php
require 'session.php';
include 'header.php';
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
                            <h3 class="fw-bold text-primary">Registrar empleado</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" class="form-border bg-white user" id="registrar" enctype="multipart/form-data">
                                <div class="row">
                                    <div id="response"></div>
                                    <div class="col-md-5">
                                        <label><strong>Foto de perfil:</strong></label>
                                        <div class="custom-file">
                                            <input type="file" name="img" id="file" required>
                                            <div id="preview" class="preview"></div>
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
                                        <label><strong>Nombre(s):</strong></label>
                                        <input type="text" name="nombre" class="form-control" required>
                                        <label><strong>Apellido(s):</strong></label>
                                        <input type="text" name="apellido" class="form-control" required>
                                        <label><strong>No. de Empleado:</strong></label>
                                        <input type="text" name="id_e" class="form-control" required>
                                        <label><strong>Estado:</strong></label>
                                        <select class="form-control" name="status" required>
                                            <option value="Activo">Activo</option>
                                            <option value="Inactivo">Inactivo</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label><strong>Correo:</strong></label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>


                                    <div class="col-md-6">
                                        <label><strong>URL Facebook:</strong></label>
                                        <input type="text" name="face" class="form-control" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label><strong>Fecha de registro:</strong></label>
                                        <input type="date" name="alta" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                                        <input type="date" name="baja" class="form-control" value="<?php echo date("Y-m-d"); ?>" hidden>
                                    </div>
                                    <div class="col-md-4">
                                        <label><strong>Inicio de vacaciones:</strong></label>
                                        <input type="date" name="ivac" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label><strong>Terminan vacaciones:</strong></label>
                                        <input type="date" name="fvac" class="form-control" required>
                                    </div>
                                    <div class="col-md-8">
                                        <label><strong>Área de adscripción</strong></label>
                                        <input type="text" name="ads" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label><strong>Puesto</strong></label>
                                        <input type="text" name="area" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label><strong>Domicilio particular:</strong></label>
                                        <input type="text" name="dom" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label><strong>Celular:</strong></label>
                                        <input type="text" name="telf" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label><strong>Teléfono fijo:</strong></label>
                                        <input type="text" name="cel" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label><strong>Fecha de nacimiento:</strong></label>
                                        <input type="date" name="fnac" class="form-control" required>
                                        <label><strong>Sexo:</strong></label>
                                        <select class="form-control" name="sex">
                                            <option>Seleccionar</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                        <label><strong>Estado civil:</strong></label>
                                        <select class="form-control" name="edoc" required>
                                            <option>Seleccionar</option>
                                            <option value="Soltero(a)">Soltero(a)</option>
                                            <option value="Casado(a)">Casado(a)</option>
                                            <option value="Divorciado(a)">Divorciado(a)</option>
                                            <option value="Viudo(a)">Viudo(a)</option>
                                        </select>
                                        <label><strong>RFC:</strong></label>
                                        <input type="text" name="rfc" class="form-control" required>
                                        <label><strong>No. Cartilla militar:</strong></label>
                                        <input type="text" name="ndcm" class="form-control" required>
                                        <label><strong>INE:</strong></label>
                                        <input type="text" name="cod_ine" class="form-control" required>
                                        <label><strong>Licencia de manejo:</strong></label>
                                        <select class="form-control" name="ldm" required>
                                            <option>Seleccionar</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                        <label><strong>Numero de Licencia:</strong></label>
                                        <input type="text" name="ndl" class="form-control" value="N/A" required>
                                        <label><strong>Alergias:</strong></label>
                                        <input type="text" name="alergia" class="form-control" value="Ninguna" required>
                                        <label><strong>Hijos:</strong></label>
                                        <select class="form-control" name="hijos">
                                            <option>Seleccionar</option>
                                            <option value="0">0</option>
                                            <option value="1 - 2">1 - 2</option>
                                            <option value="3 - 4">3 - 4</option>
                                            <option value="5 +">5+</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">

                                        <label><strong>Lugar de nacimiento:</strong></label>
                                        <input type="text" name="ldn" class="form-control" required>

                                        <label><strong>Nacionalidad:</strong></label>
                                        <input type="text" name="nac" class="form-control" required>

                                        <label><strong>Tipo de sangre:</strong></label>
                                        <select class="form-control" name="gs" required>
                                            <option>Seleccionar</option>
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
                                        <input type="text" name="curp" class="form-control" required>

                                        <label><strong>Matrícula de servicio militar:</strong></label>
                                        <input type="text" name="mdcsm" class="form-control" required>

                                        <label><strong>Folio INE:</strong></label>
                                        <input type="text" name="fine" class="form-control" required>

                                        <label><strong>Tipo de licencia:</strong></label>
                                        <select class="form-control" name="tdl" required>
                                            <option>Seleccionar</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="N/A">N/A</option>
                                        </select>

                                        <label><strong>Teléfono de emergencia:</strong></label>
                                        <input type="text" name="tele" class="form-control" required>

                                        <label><strong>Sindicalizado:</strong></label>
                                        <select class="form-control" name="sindi" required>
                                            <option>Seleccionar</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <br><br>
                                <button type="submit" class="btn btn-success float-end text-white"><strong> REGISTRAR</strong></button>
                        </div>
                    </div>
                    </form>
                    <script type="text/javascript">
                        $(document).ready(function(e) {
                            $("#registrar").on('submit', (function(e) {
                                e.preventDefault();
                                $.ajax({
                                    url: "control/dataCreate.php",
                                    type: "POST",
                                    data: new FormData(this),
                                    contentType: false,
                                    cache: false,
                                    processData: false,
                                    success: function(data) {
                                        if (data == 'true') {
                                            alert('El registro se agregó correctamente.');
                                            top.location.href = "admin.php";
                                        } else if (data == 'false') {
                                            $('#response').html("<div class='alert alert-danger'><i class='fas fa-false'></i> Error al ingresar el registro.</div>");
                                        } else if (data == 'img') {
                                            $('#response').html("<div class='alert alert-warning'><i class='fas fa-false'></i> Sólo de admite el formato JPG.</div>");
                                        } else if (data == 'data') {
                                            alert('Debe llenar todos los campos.');
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