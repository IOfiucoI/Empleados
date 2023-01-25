<?php

require 'session.php';
include 'header.php'
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
                            <span><i> Se recomiendan que la foto del empleado sea cuadrada.</i></span>
                        </div>
                        <div class="card-body">
                            <form method="POST" class="form-border bg-white user" id="registrar" enctype="multipart/form-data">
                                <div class="row">
                                    <div id="response"></div>
                                    <div class="col-md-4">
                                        <label><strong>Correo:</strong></label>
                                        <input type="email" name="email" class="form-control" placeholder="Campo obligatorio" id="email" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label><strong>Contraseña:</strong></label>
                                        <input type="password" name="pass" class="form-control" placeholder="Campo obligatorio" id="pass" required>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success float-end text-white">REGISTRAR</button>
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
            $("#registrar").on('submit', (function(e) {
                e.preventDefault();
                $.ajax({
                    url: "include/userCreate.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if (data == 'true') {
                            $('#response').html("<div class='alert alert-warning'><i class='bi bi-exclamation-triangle-fill'></i>El correo ya se encuentra registrado</div>");
                        } else if (data == 'success') {
                            $('#response').html("<div class='alert alert-success'><i class='bi bi-check-lg'></i>El usuario se registro correctamente.</div>");
                        } else if (data == 'error') {
                            $('#response').html("<div class='alert alert-danger'><i class='bi bi-exclamation-triangle-fill'></i>Hubo un error al registrar el usuario");
                        } else if (data == 'img') {
                            $('#response').html("<div class='alert alert-warning'><i class='bi bi-exclamation-triangle-fill'></i> Sólo se admiten imágenes en formato JPEG y JPG.");
                        } else {
                            location.reload();
                        }
                    },
                    error: function() {
                        $('#response').html("<div class='alert alert-danger'><i class='bi bi-exclamation-triangle-fill'></i>Error en el registro");
                    }
                });
            }));
        });
    </script>
</body>

</html>