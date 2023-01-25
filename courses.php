<?php
require 'session.php';
include 'header.php';
include 'include/courses.php';
$user_id = $_GET['id'];
$course       = new courses($conexion);
$course->id = $user_id;
$cor    = $course->coursesData();

?>

<body>
    <div id="wrapper" class="bgris">
        <?php
        include 'nav.php';
        ?>
        <div class="d-flex flex-column" id="content-wrapper">

                <div class="container-fluid">
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <div class="card-body">
                                        <h3 class="text-primary fw-bold float-start">Cursos Recibidos</h3>
                                        <a href="coursesCreate.php?id=<?php echo $user_id ?>">
                                            <button type="button" class="btn btn-primary float-end">
                                                <i class="fas fa-plus"></i> Agregar
                                            </button>
                                        </a>

                                    </div>
                                </div>
                                <div clas="row">
                                    <div class="response"></div>
                                    <div class="col-md-12 p-4">
                                        <div class="table-responsive table mt-2" id="dataTable" role="grid">
                                            <table class="table my-0" id="dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>NOMBRE</th>
                                                        <th class="text-center">PERIODO</th>
                                                        <th class="text-center">PDF</th>
                                                        <th class="text-center">&nbsp;OPCIONES&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($courseData = $cor->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <tr>
                                                            <td><?php echo "{$courseData["c_nom"]}"; ?></td>
                                                            <td class="text-center"><?php echo "{$courseData["c_per"]}"; ?></td>
                                                            <td class="text-center"> <a href="<?php echo "{$courseData["c_doc"]}"; ?>" target="_blank"><i class="fas fa-file-pdf"></i></a></td>
                                                            <td class="text-center">
                                                                <div class="text-white">
                                                                    <a href="coursesUpdate.php?id=<?php echo $user_id ?>&c_id=<?php echo "{$courseData["c_id"]}"; ?>" class="btn btn-success bg-success text-white">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <button id="delete" type="button" class="btn btn-danger bg-danger" value="<?php echo "{$courseData["c_id"]}" ?>">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            
            <?php include 'footer.php'; ?>
        </div>
    </div>

<script type="text/javascript">
        $(document).ready(function() {
            $('button#delete').click(function() {
                var id = $(this).val();
                $.ajax({
                    url: 'control/coursesDelete.php',
                    type: 'POST',
                    cahe: false,
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data == 'true') {
                            alert('El registro se eliminó corectamente.');
                            top.location.href = "courses.php?id=<?php echo $user_id ?>";
                        } else {
                            $('#response').html("<div class='alert alert-danger'><i class='fas fa-exclamation-triangle'></i> No se puede eliminar el registro.");
                        }
                    },
                    error: function() {
                        $('#response').html("<div class='alert alert-danger'><i class='fas fa-exclamation-triangle'></i> Error al procesar los datos.");
                    }
                });
            });
        })
    </script>
</body>

</html>