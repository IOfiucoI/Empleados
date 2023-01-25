<?php

require 'session.php';
include 'header.php';
include 'include/record.php';
$user_id = $_GET['id'];

$rec       = new record($conexion);
$rec->r_id = $_GET['r_id'];
$record    = $rec->recordGet();
$row = $record->fetch(PDO::FETCH_ASSOC);

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
                            <h3 class="fw-bold text-primary">Editar Escuela</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" class="form-border bg-white user" id="actualizar" enctype="multipart/form-data">
                                <div class="row">
                                    <div id="response"></div>
                                    <div class="col-md-6">
                                        <input type="text" name="r_id" class="form-control" value="<?php echo "{$row["r_id"]}" ?>" hidden>
                                        <label><strong>Escuela:</strong></label>
                                        <input type="text" name="esc" class="form-control" value="<?php echo "{$row["r_esc"]}" ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label><strong>Ubicación:</strong></label>
                                        <input type="text" name="ubi" class="form-control" value="<?php echo "{$row["r_ubi"]}" ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label><strong>Periodo Escolar:</strong></label>
                                        <input type="text" name="per" class="form-control" value="<?php echo "{$row["r_per"]}" ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label><strong>Documento:</strong></label>
                                        <input type="file" name="doc" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success float-end text-white"><i class="fas fa-sync-alt"></i> Actualizar</button>
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
            $("#actualizar").on('submit', (function(e) {
                e.preventDefault();
                $.ajax({
                    url: "control/recordUpdate.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if (data == 'true') {
                            alert('La escuela se actalizo con éxito.');
                            top.location.href = "user.php?id=<?php echo $user_id ?>";
                        } else if (data == 'false') {
                            $('#response').html("<div class='alert alert-danger'><i class='fas fa-danger'></i> No se actualizo el registro");
                        } else if (data == 'data') {
                            $('#response').html("<div class='alert alert-warning'><i class='fas fa-check'></i> Ingrese todos los campos obligatorios.");
                        } else if (data == 'pdf') {
                            $('#response').html("<div class='alert alert-warning'><i class='fas fa-check'></i> Sólo se admiten formatos PDF.");
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