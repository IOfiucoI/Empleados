<?php
require 'session.php';
require 'include/courses.php';
include 'header.php';
$user_id = $_GET['id'];
$courses       = new courses($conexion);
$courses->c_id = $_GET['c_id'];
$cours    = $courses->coursesGet();
$rowCours = $cours->fetch(PDO::FETCH_ASSOC);

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
                                        <h3 class="text-primary fw-bold float-start">Actualizar Curso</h3>
                                    </div>
                                </div>
                                <div clas="row">
                                    <div class="response"></div>
                                    <div class="col-md-12 p-4">
                                        <form method="POST" class="form-border bg-white user" id="actualizar" enctype="multipart/form-data">
                                            <div class="row">
                                                <div id="response"></div>
                                                <div class="col-md-6">
                                                    <input type="text" name="c_id" class="form-control" value="<?php echo "{$rowCours["c_id"]}"; ?>" hidden>
                                                    <label><strong>Nombre:</strong></label>
                                                    <input type="text" name="nom" class="form-control" value="<?php echo "{$rowCours["c_nom"]}"; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label><strong>Periodo:</strong></label>
                                                    <input type="text" name="per" class="form-control" value="<?php echo "{$rowCours["c_per"]}"; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label><strong>Documento:</strong></label>
                                                    <input type="file" name="doc" class="form-control">
                                                </div>
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-success float-end text-white"><i class="fas fa-sync-alt"></i> Actualizar</button>
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
                        url: "control/coursesUpdate.php",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            if (data == 'true') {
                                alert('El curso se actuaizó correctamente.');
                                top.location.href = "courses.php?id=<?php echo $user_id ?>";
                            } else if (data == 'pdf') {
                                $('#response').html("<div class='alert alert-warning'><i class='fas fa-exclamation-triangle'></i> Sólo se admite el formato PDF.</div>");
                            } else if (data == 'data') {
                                $('#response').html("<div class='alert alert-warning'><i class='fas fa-exclamation-triangle'></i> Debe llenar todo los campos.");
                            } else {
                                $('#response').html("<div class='alert alert-danger'><i class='fas fa-times'></i> Error al actualizar el curso.");
                            }
                        },
                        error: function() {
                            $('#response').html("<div class='alert alert-danger'><i class='fas fa-times'></i> Error al enviar los datos.");
                        }
                    });
                }));
            });
        </script>
</body>

</html>