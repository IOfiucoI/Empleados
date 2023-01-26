<?php

require 'session.php';
include 'header.php';
// include 'include/data.php';

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
                            <div class="row">
                                <br>
                                <h4><b>
                                        <center>Filtros de búsqueda</center><hr>
                                    </b></h4><br><br>
                                <form class="row" id="multi-filters">
                                    <div class="col-2">
                                        <h6>Género</h6>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="sex[]" value="Masculino">
                                            <label class="form-check-label">Masculino</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="sex[]" value="Femenino">
                                            <label class="form-check-label">Femenino</label>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <h6>Estado</h6>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="status[]" value="Activo">
                                            <label class="form-check-label">Activo</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="status[]" value="Inactivo">
                                            <label class="form-check-label">Inactivo</label>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <h6>Sindicalizado</h6>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="sindi[]" value="Si">
                                            <label class="form-check-label">Si</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="sindi[]" value="No">
                                            <label class="form-check-label">No</label>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <h6>Estado Civil</h6>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="edoc[]" value="Soltero(a)">
                                            <label class="form-check-label">Soltero(a)</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="edoc[]" value="Casado(a)">
                                            <label class="form-check-label">Casado(a)</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="edoc[]" value="Divorciado(a)">
                                            <label class="form-check-label">Divorciado(a)</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="edoc[]" value="Viudo(a)">
                                            <label class="form-check-label">Viudo(a)</label>
                                        </div>
                                    </div>

                                    <div class="col-1">
                                        <h6>Hijos</h6>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="hijos[]" value="0">
                                            <label class="form-check-label">0</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="hijos[]" value="1-2">
                                            <label class="form-check-label">1-2</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="hijos[]" value="3-4">
                                            <label class="form-check-label">3-4</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="hijos[]" value="5+">
                                            <label class="form-check-label">5+</label>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <h6>Tipo de sangre</h6>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="gs[]" value="A+">
                                            <label class="form-check-label">A+</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="gs[]" value="A-">
                                            <label class="form-check-label">A-</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="gs[]" value="B+">
                                            <label class="form-check-label">B+</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="gs[]" value="B-">
                                            <label class="form-check-label">B-</label>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <h6>&nbsp;</h6>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="gs[]" value="AB+">
                                            <label class="form-check-label">AB+</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="gs[]" value="AB-">
                                            <label class="form-check-label">AB-</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="gs[]" value="O+">
                                            <label class="form-check-label">O+</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="gs[]" value="O-">
                                            <label class="form-check-label">O-</label>
                                        </div>
                                    </div>
                                    
                                </form>
                                <table class="table my-3" id="dataTable">
                                    <thead class="bg-gray">
                                        <tr class="table-active">
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Estado</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="filters-result" class="bg-white">

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php include 'footer.php'; ?>
            <script src="js/users.js"></script>
        </div>
    </div>

</body>

</html>