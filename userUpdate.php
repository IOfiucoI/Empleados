<?php
require 'session.php';
include 'header.php';
include 'include/users.php';

$user       = new users($conexion);
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
                            <h3 class="fw-bold text-primary">Actualizar correo y/o contraseña</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" class="form-border bg-white user" id="actualizar" enctype="multipart/form-data">
                                <div class="row">
                                    <div id="response"></div>
                                    <div class="col-md-6">
                                        <input type="text" name="id" class="form-control" value="<?php echo "{$row["user_id"]}"; ?>" hidden>
                                        <label><strong>Nombre(s):</strong></label>
                                        <input type="text" name="name" class="form-control" placeholder="Campo obligatorio" value="<?php echo "{$row["user_name"]}"; ?>">
                                        <label><strong>Apellido paterno:</strong></label>
                                        <input type="text" name="ap" class="form-control" placeholder="Campo obligatorio" value="<?php echo "{$row["user_ap"]}"; ?>">
                                        <label><strong>Apellido materno:</strong></label>
                                        <input type="text" name="am" class="form-control" placeholder="Campo obligatorio" value="<?php echo "{$row["user_am"]}"; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label><strong>Foto de perfil:</strong></label>
                                        <div class="custom-file">
                                            <input type="file" name="image" id="file">
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

                                            <img src="<?php echo "{$row["user_image"]}"; ?>" class="preview">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label><strong>Correo:</strong></label>
                                        <input type="email" name="email" class="form-control" placeholder="Campo obligatorio" value="<?php echo "{$row["user_email"]}"; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label><strong>Contraseña:</strong></label>
                                        <input type="password" name="pass" class="form-control" placeholder="Campo obligatorio" required>
                                        <input type="text" name="rol" class="form-control" value="<?php echo "{$row["user_rol"]}"; ?>" hidden>
                                        <input type="text" name="status" class="form-control" value="<?php echo "{$row["user_status"]}"; ?>" hidden>
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
                    url: "control/userUpdate.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if (data == '0') {
                            $('#response').html("<div class='alert alert-danger'><i class='fas fa-exclamation-triangle'></i> Error al actualizar los datos.</div>");
                        } else if (data == '1') {
                            $('#response').html("<div class='alert alert-success'><i class='fas fa-exclamation-triangle'></i> Datos actualizados.");
                        } else if (data == '2') {
                            $('#response').html("<div class='alert alert-warning'><i class='fas fa-exclamation-triangle'></i> Verifique su contraseña.");
                        } else if (data == 'img') {
                            $('#response').html("<div class='alert alert-warning'><i class='fas fa-exclamation-triangle'></i> Sólo se admiten formatos JPG y JPEG.");
                        } else {
                            location.reload();
                        }
                    },
                    error: function() {
                        $('#response').html("<div class='alert alert-danger'><i class='fas fa-exclamation-triangle'></i> Error al enviar los datos");
                    }
                });
            }));
        });
    </script>
</body>

</html>