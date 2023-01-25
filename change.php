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
                            <form method="POST" class="form-border bg-white user" action="admin.php">

                                    <div class="col-md-4">
                                        <label><strong>Correo:</strong></label>
                                        <input type="email" name="email" class="form-control" placeholder="Campo obligatorio" value="<?php echo "{$row["user_email"]}"; ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label><strong>Contraseña:</strong></label>
                                        <input type="password" name="pass" class="form-control" placeholder="Campo obligatorio" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label><strong>Confirmar contraseña:</strong></label>
                                        <input type="password" name="passcomfirm" class="form-control" placeholder="Campo obligatorio" required>
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
</body>

</html>