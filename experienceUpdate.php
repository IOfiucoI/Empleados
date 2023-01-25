<?php
require 'session.php';
include 'header.php';
include 'include/experience.php';
$user_id = $_GET['id'];
$exp       = new experience($conexion);
$exp->e_id = $user_id;
$experiece    = $exp->experienceGet();
$rowExp = $experiece->fetch(PDO::FETCH_ASSOC);

?>

<body>
    <div id="wrapper" class="bgris">
        <?php
        include 'nav.php';
        ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="page-top">

                <div class="container-fluid">
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <div class="card-body">
                                        <h3 class="text-primary fw-bold float-start">Actualizar Experiencia Laboral</h3>
                                    </div>
                                </div>
                                <div clas="row">
                                    <div class="response"></div>
                                    <div class="col-md-12 p-4">
                                        <form method="POST" class="form-border bg-white user" id="actualizar" >
                                            <div class="row">
                                                <div id="response"></div>
                                                
                                                    <input type="text" name="id" class="form-control" value="<?php echo "{$rowExp["e_id"]}"; ?>" hidden>
                                                
                                                <div class="col-md-6">
                                                    <label><strong>Empresa:</strong></label>
                                                    <input type="text" name="emp" class="form-control" value="<?php echo "{$rowExp["e_emp"]}"; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label><strong>Dirección:</strong></label>
                                                    <input type="text" name="dir" class="form-control" value="<?php echo "{$rowExp["e_dir"]}"; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label><strong>Puesto:</strong></label>
                                                    <input type="text" name="pue" class="form-control" value="<?php echo "{$rowExp["e_pue"]}"; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label><strong>Periodo:</strong></label>
                                                    <input type="text" name="per" class="form-control" value="<?php echo "{$rowExp["e_per"]}"; ?>">
                                                </div>
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-success float-end text-white"><i class="fas fa-sync-alt"></i> Actualizar </button>
                                            <br>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <?php include 'footer.php'; ?>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function(e) {
                $("#actualizar").on('submit', (function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: "control/experienceUpdate.php",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            if (data == 'true') {
                                alert('El registro se actualizó correctamente.');
                                top.location.href = "experience.php?id=<?php echo $user_id ?>";
                            } else if (data == 'false') {
                                $('#response').html("<div class='alert alert-danger'><i class='fas fa-times'></i> Error al actualizar el registro.</div>");
                            } else if (data == 'data') {
                                $('#response').html("<div class='alert alert-danger'><i class='fas fa-exclamation-triangle'></i> Debe ingresar los datos completos.");
                            } else {
                                location.reload();
                            }
                        },
                        error: function() {
                            $('#response').html("<div class='alert alert-danger'><i class='fas fa-exclamation-triangle'></i> Error al enviar los datos.");
                        }
                    });
                }));
            });
        </script>
</body>

</html>