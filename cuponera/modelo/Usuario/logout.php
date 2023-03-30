<?php
// Iniciamos sesión
session_start();

// Eliminamos todas las variables de sesión
session_unset();

// Destruimos la sesión
session_destroy();

// Redireccionamos al usuario a la página de inicio
header("Location: ../../vista/Login.php");
exit();
?>