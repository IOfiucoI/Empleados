<?php
require 'session.php';
include 'header.php';
include 'include/users.php';
$user       = new users($conexion);
$user->id = $_GET['id'];
$stmt       = $user->userGet();
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
                            <h3 class="fw-bold text-primary">Cambiar contraseña</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" class="form-border bg-white user" id="actualizar">
                                <div class="row">
                                    <div id="response"></div>
                                    <div class="col-md-4">
                                        <input type="password" name="id" class="form-control" value="<?php echo "{$row["user_id"]}"; ?>" hidden>
                                        <label><strong>Contraseña Anterior:</strong></label>
                                        <input type="password" name="passprev" class="form-control" placeholder="Campo obligatorio" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label><strong>Contraseña Nueva:</strong></label>
                                        <input type="password" name="passnew" class="form-control" placeholder="Campo obligatorio" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label><strong>Confirmar contraseña nueva:</strong></label>
                                        <input type="password" name="passconfirm" class="form-control" placeholder="Campo obligatorio" required>
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
                    url: "include/userPass.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if (data == 'false') {
                            $('#response').html("<div class='alert alert-warning'><i class='fas fa-exclamation-triangle'></i> La contraseña anterior no es correcta.</div>");
                        } else if (data == 'no') {
                            $('#response').html("<div class='alert alert-warning'><i class='fas fa-exclamation-triangle'></i> La contraseña nueva no coincide.");
                        } else if (data == 'ok') {
                            $('#response').html("<div class='alert alert-success'><i class='fas fa-check'></i> Su contraseña de actualizo correctamente.");
                        } else if (data == 'error') {
                            $('#response').html("<div class='alert alert-danger'><i class='fas fa-times'></i> Ocurrio un error al cambiar la contraseña.");
                        } else {
                            location.reload();
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