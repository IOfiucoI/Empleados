<nav class="navbar navbar-dark align-items-start sidebar bg-gris">
    <div class="container-fluid d-flex flex-column p-0 sticky-top">
        <hr class="sidebar-divider ">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <!-- <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Usuarios</span></a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-users"></i>
                    <span>Empleados</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dataCreate.php">
                    <i class="fas fa-plus"></i>
                    <span>Agregar Empleado</span></a>
            </li>

            <!-- <li class="nav-item">
                <a class="nav-link" href="userCreate.php">
                    <i class="fas fa-plus"></i>
                    <span>Agregar Administrador</span></a>
            </li> -->

            <!-- <li class="nav-item">
                <a class="nav-link" href="userUpdate.php?id=<?php echo $_SESSION['user_id']; ?>">
                    <i class="fas fa-at"></i>
                    <span>Correo</span></a>
            </li> -->

            <li class="nav-item">
                <a class="nav-link" href="pass.php?id=<?php echo $_SESSION['user_id']; ?>">
                    <i class="fas fa-key"></i>
                    <span>Contraseña</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="enterprise.php">
                    <i class="fas fa-globe"></i>
                    <span>Datos del sitio</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="include/logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Cerrar sesión</span></a>
            </li>
        </ul>
    </div>
</nav>