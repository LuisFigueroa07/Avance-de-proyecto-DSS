<?php
// Obtenemos el nombre de la página actual
$pagina_actual = basename($_SERVER['PHP_SELF']);

// Verificamos si la sesión está iniciada
if (isset($_SESSION['usuario'])) {
    $enlace_más = '<a class="dropdown-item" href="../modelo/Usuario/logout.php"><img src="img/acount.png" id="icon">Cerrar sesión</a>';
    $enlace_admin = 'adminCupones.php';
} else {
    $enlace_más = '<a class="dropdown-item" href="Login.php"><img src="img/acount.png" id="icon">Iniciar sesión</a>';
    $enlace_admin = 'Login.php';
}

// Verificamos si el usuario está en la página de inicio de sesión
if ($pagina_actual == 'Login.php') {
    $enlace_más = '<a class="dropdown-item disabled" href="#"><img src="img/acount.png" id="icon">Iniciar sesión</a>';
}
?>
<h1>Cuponera UDB</h1>
<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link<?php if ($pagina_actual == 'Index.php') echo ' disabled'; ?>" aria-current="page" href="Index.php">Inicio</a>
    </li>
    <li class="nav-item">
        <a class="nav-link<?php if ($pagina_actual == 'cupones.php') echo ' disabled'; ?>" aria-current="page" href="cupones.php">Cupones disponibles</a>
    </li>
    <li class="nav-item">
        <a class="nav-link<?php if ($pagina_actual == 'adminCupones.php') echo ' disabled'; ?>" aria-current="page" href="<?php echo $enlace_admin; ?>">Administra tus cupones</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Más</a>
        <ul class="dropdown-menu">
            <?php echo $enlace_más; ?>
        </ul>
    </li>
</ul>