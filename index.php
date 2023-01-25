<?php
include 'header.php';
?>

<body class="bgris" id="page-top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="row">
                        <div class="p-5">
                            <img src="<?php echo "{$rowEnterprise["image"]}"; ?>" class="img-site">
                            <div id="response"></div>
                            <form class="user" method="POST" id="login">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input class="form-control" type="email" placeholder="Correo" name="email">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    <input class="form-control" type="password" placeholder="Contraseña" name="pass">
                                </div><br>
                                <button class="btn btn-primary d-block btn-user w-100" type="submit">Ingresar</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
                <p class="text-center"><strong><?php echo "{$rowEnterprise["name"]}" ?></strong></p>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $("#login").on('submit', (function(e) {
                e.preventDefault();
                $.ajax({
                    url: "include/login.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        if (data == '0') {
                            $('#response').html("<div class='alert alert-danger text-center'><i class='fas fa-exclamation-triangle'></i> El correo no esta registrado.</div> <br>");
                        } else if (data == '1') {
                            $('#response').html("<div class='alert alert-warning text-center'> <i class='fas fa-exclamation-triangle'></i> Verifique su contraseña.</div> <br>");
                        } else if (data == 'true') {
                            top.location.href = "admin.php";
                        } else {
                            top.location.href = "index.php";
                        }
                    },
                    error: function() {
                        $('#response').html("<div class='alert alert-danger'><i class='bi bi-exclamation-triangle-fill'></i>Error en la conexión.");
                    }
                });
            }));
        });
    </script>

</body>

</html>