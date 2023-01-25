<?php
require 'session.php';
include 'header.php';
$user_id = $_GET['id'];

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
                            <h3 class="fw-bold text-primary">Agregar Escuela</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" class="form-border bg-white user" id="create" enctype="multipart/form-data">
                                <div class="row">
                                    <div id="response"></div>
                                    <div class="col-md-6">
                                        <input type="text" name="user" class="form-control" value="<?php echo $user_id; ?>" hidden>
                                        <label><strong>Escuela:</strong></label>
                                        <input type="text" name="esc" class="form-control" placeholder="Campo obligatorio" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label><strong>Ubicación:</strong></label>
                                        <input type="text" name="ubi" class="form-control" placeholder="Campo obligatorio" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label><strong>Periodo Escolar:</strong></label>
                                        <input type="text" name="per" class="form-control" placeholder="Campo obligatorio" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label><strong>Documento:</strong></label>
                                        <input type="file" name="doc" class="form-control" placeholder="Campo obligatorio" required>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success float-end text-white"> Registrar</button>
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
            $("#create").on('submit', (function(e) {
                e.preventDefault();
                $.ajax({
                    url: "control/recordCreate.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if (data == 'true') {
                            alert('La institucion se agrego correctamente.');
                            top.location.href = "user.php?id=<?php echo $user_id ?>";
                        } else if (data == 'false') {
                            $('#response').html("<div class='alert alert-danger'><i class='fas fa-times'></i> Error al crear el registro.");
                        } else if (data == 'data') {
                            $('#response').html("<div class='alert alert-warning'><i class='fas fa-exclamation-triangle'></i> Debe ingresar los campos requeridos.");
                        } else if (data == 'pdf') {
                            $('#response').html("<div class='alert alert-warning'><i class='fas fa-exclamation-triangle'></i> Sólo se admiten el formato PDF.");
                        } else {
                            $('#response').html("<div class='alert alert-danger'><i class='fas fa-times'></i> Error");
                        }
                    },
                    error: function() {
                        $('#response').html("<div class='alert alert-danger'><i class='fas fa-times'></i> Error al enviar los datos");
                    }
                });
            }));
        });
    </script>
</body>