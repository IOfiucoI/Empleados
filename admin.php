<?php

require 'session.php';
include 'header.php';
include 'include/data.php';

?>

<body>
    <div id="wrapper" class="bgris">
        <?php
        include 'nav.php';
        ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <br>
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header py-3 px-3">
                            <h3 class="text-primary fw-bold float-start">Empleados Registrados</h3>
                            <a href="dataCreate.php" class="btn btn-primary float-end " title="Agregar usuario">
                                <i class="fas fa-plus"> </i> Agregar
                            </a>
                        </div>
                        <div class="card-body">
                            <!-- <div class="row">
                                <br>
                                <form class="row" id="buscar">
                                    <div class="col-sm-3">
                                        <label><strong>Estado:</strong></label>
                                        <select class="form-select" name="tdl">
                                            <option>Seleccionar</option>
                                            <option value="Activo">Activo</option>
                                            <option value="Inactivo">Inactivo</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3">
                                        <label><strong>Sexo:</strong></label>
                                        <select class="form-select" name="tdl">
                                            <option>Seleccionar</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3">
                                        <label><strong>Estado Civil:</strong></label>
                                        <select class="form-select" name="edoc">
                                            <option>Seleccionar</option>
                                            <option value="Soltero(a)">Soltero(a)</option>
                                            <option value="Casado(a)">Casado(a)</option>
                                            <option value="Divorciado(a)">Divorciado(a)</option>
                                            <option value="Viudo(a)">Viudo(a)</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3">
                                        <label><strong>Hijos:</strong></label>
                                        <select class="form-select" name="hijos">
                                            <option>Seleccionar</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5+">5+</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3">
                                        <label><strong>Tipo de Sangre:</strong></label>
                                        <select class="form-select" name="gs">
                                            <option>Seleccionar</option>
                                            <option value="O+">O+</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-3">
                                        <label><strong>Sindicalizado:</strong></label>
                                        <select class="form-select" name="sindi">
                                            <option>Seleccionar</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>

                                </form>
                            </div> -->
                            <!-- <br> -->
                            <!-- <hr> -->
                            <div class="table-responsive table mt-2" id="dataTable" role="grid">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>E-mail</th>
                                            <th>Estado</th>
                                            <th class="text-center">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $data = new data($conexion);
                                        $stmt       = $data->showData();
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <tr>
                                                <td><?php echo "{$row["id_data"]}" ?></td>
                                                <td><?php echo "{$row["apellido"]} "."{$row["nombre"]}" ?></td>
                                                <td><?php echo "{$row["email"]}" ?></td>
                                                <td><?php echo "{$row["status"]}" ?></td>
                                                <td>
                                                    <div class="text-center text-white">
                                                        <a href="pdf.php?id=<?php echo "{$row["id_data"]}" ?>" class="btn btn-danger" title="Generar PDF">
                                                            <i class="fas fa-file-pdf"></i>
                                                        </a>

                                                        <a href="user.php?id=<?php echo "{$row["id_data"]}" ?>" class="btn btn-primary bg-primary" title="Ver empleado">
                                                            <i class="fas fa-search"></i>
                                                        </a>
                                                        <a href="dataUpdate.php?id=<?php echo "{$row["id_data"]}" ?>" class="btn btn-success bg-success text-white" title="Actualizar datos de empleado">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <button id="deluser" type="button" class="btn btn-danger bg-danger" value="<?php echo "{$row["id_data"]}" ?>" title="Eliminar empleado">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php }; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <nav class="d-lg-flex justify-content-lg-center dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'footer.php'; ?>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('button#deluser').click(function() {
                var id = $(this).val();
                $.ajax({
                    url: 'control/dataDelete.php',
                    type: 'POST',
                    cahe: false,
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data == 'true') {
                            alert('El registro se eliminó corectamente.');
                            top.location.href = "admin.php";
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