<?php
require 'session.php';
include 'header.php';
include 'include/record.php';
$user_id = $_GET['id'];
$rec       = new record($conexion);
$rec->r_user = $user_id;
$record    = $rec->recordData();
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
                                        <h3 class="text-primary fw-bold float-start">Historial académico</h3>
                                        <a href="recordCreate.php?id=<?php echo $user_id ?>">
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
                                                        <th>ESCUELA</th>
                                                        <th class="text-center">UBICACIÓN</th>
                                                        <th class="text-center">PERIODO</th>
                                                        <th class="text-center">PDF</th>
                                                        <th class="text-center">&nbsp;&nbsp;OPCIONES&nbsp;&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while ($recordData = $record->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <tr>
                                                            <td><?php echo "{$recordData["r_esc"]}"; ?></td>
                                                            <td class="text-center"><?php echo "{$recordData["r_ubi"]}"; ?></td>
                                                            <td class="text-center"><?php echo "{$recordData["r_per"]}"; ?></td>
                                                            <td class="text-center"> <a href="<?php echo "{$recordData["r_doc"]}"; ?>" target="_blank"><i class="fas fa-file-pdf"></i></a></td>
                                                            <td>
                                                                <div class="text-center text-white float-end">
                                                                    <a href="recordUpdate.php?id=<?php echo $user_id ?>&r_id=<?php echo "{$recordData["r_id"]}"; ?>" class="btn btn-success bg-success text-white">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <button id="delete" type="button" class="btn btn-danger bg-danger" value="<?php echo "{$recordData["r_id"]}" ?>">
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
                    url: 'control/recordDelete.php',
                    type: 'POST',
                    cahe: false,
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data == 'true') {
                            alert('El registro se eliminó corectamente.');
                            top.location.href = "record.php?id=<?php echo $user_id ?>";
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