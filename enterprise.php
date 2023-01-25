<?php
require 'session.php';
include 'header.php';

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
                            <h3 class="fw-bold text-primary">Datos del sitio</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" class="form-border bg-white user" id="actualizar" enctype="multipart/form-data">
                                <div class="row">
                                    <div id="response"></div>
                                    <div class="col-md-6">
                                        <label><strong>Nombre del sitio:</strong></label>
                                        <input type="text" name="id" class="form-control" value="<?php echo "{$rowEnterprise["id"]}"; ?>" hidden>
                                        <input type="text" name="name" class="form-control" value="<?php echo "{$rowEnterprise["name"]}"; ?>" required>
                                    
                                        <label><strong>Logotipo:</strong></label>
                                        <div class="custom-file">
                                            <input type="file" name="image" id="image">
                                            <div id="preview" class="preview"></div>
                                            <script>
                                                function viewImage() {
                                                    document.getElementById("image").onchange = function(e) {
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
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success float-end text-white">Actualizar</button>
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
                    url: "control/enterprise.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if (data == 'true') {
                            $('#response').html("<div class='alert alert-warning'><i class='bi bi-exclamation-triangle-fill'></i>Datos Actualizados</div>");
                        }else if (data == 'img') {
                            $('#response').html("<div class='alert alert-warning'><i class='bi bi-exclamation-triangle-fill'></i> Sólo se admiten imágenes en formato JPEG y JPG.");
                        } else {
                            location.reload();
                        }
                    },
                    error: function() {
                        $('#response').html("<div class='alert alert-danger'><i class='bi bi-exclamation-triangle-fill'></i>Error en el registro");
                    }
                });
            }));
        });
    </script>
</body>

</html>