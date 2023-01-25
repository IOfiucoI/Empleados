<?php
require 'session.php';
include 'header.php';
include 'include/experience.php';

$user_id = $_GET['id'];
$exp       = new experience($conexion);
$exp->id = $user_id;
$experiece    = $exp->experienceData();

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
                                        <h3 class="text-primary fw-bold float-start">Experiencia laboral</h3>
                                        <a href="experienceCreate.php?id=<?php echo $user_id ?>">
                                            <button type="button" class="btn btn-primary float-end">
                                                <i class="fas fa-plus"></i> Agregar
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div clas="row">
                                    <div class="col-md-12 p-4">
                                        <div class="table-responsive table mt-2" id="dataTable" role="grid">
                                            <table class="table my-0" id="dataTable">
                                                <thead>
                                                    <tr >
                                                        <th>EMPRESA</th>
                                                        <th class="text-center">DIRECCIÓN</th>
                                                        <th class="text-center">PUESTO</th>
                                                        <th class="text-center">PERIODO</th>
                                                        <th class="text-center">OPCIONES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php while ($rowExp = $experiece->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <tr>
                                                            <td><?php echo "{$rowExp["e_emp"]}"; ?></td>
                                                            <td class="text-center"><?php echo "{$rowExp["e_dir"]}"; ?></td>
                                                            <td class="text-center"><?php echo "{$rowExp["e_pue"]}"; ?></td>
                                                            <td class="text-center"><?php echo "{$rowExp["e_per"]}"; ?></td>
                                                            <td>
                                                                <div class="text-center text-white">
                                                                    <a href="experienceUpdate.php?id=<?php echo $user_id ?>&e_id=<?php echo "{$rowExp["e_id"]}"; ?>" class="btn btn-success bg-success text-white">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>

                                                                        <button id="delete" type="button" class="btn btn-danger bg-danger" value="<?php echo "{$rowExp["e_id"]}" ?>?>">
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
            </div>
            <?php include 'footer.php'; ?>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('button#delete').click(function() {
                var id = $(this).val();
                $.ajax({
                    url: 'control/experienceDelete.php',
                    type: 'POST',
                    cahe: false,
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data == 'true') {
                            alert('El registro se eliminó corectamente.');
                            top.location.href = "experience.php?id=<?php echo $user_id ?>";
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