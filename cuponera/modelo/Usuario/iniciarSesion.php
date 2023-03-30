<?php
// Incluimos el archivo de conexión a la base de datos
include '../conexion.php';

// Obtenemos los valores de usuario y contraseña del formulario de inicio de sesión
if (isset($_POST["usuario"])){
if(isset($_POST["clave"])) {
$usuario = $_POST["usuario"];
$clave = $_POST["clave"];

// Preparamos la consulta SQL para verificar si el usuario existe en la base de datos
$consulta = "SELECT * FROM usuario WHERE BINARY direccion_correo = '$usuario' AND BINARY contraseña = '$clave'";
// Ejecutamos la consulta
$resultado = mysqli_query($conexion, $consulta);

// Verificamos si se encontró un usuario con las credenciales proporcionadas
if (mysqli_num_rows($resultado) == 1) {
    // Iniciamos sesión y redirigimos al usuario a la página de inicio
    session_start();
    $_SESSION["usuario"] = $usuario;
    header("Location: ../../vista/Index.php");
} else {
    // Si no se encontró el usuario, mostramos un mensaje de error y redirigimos al usuario de nuevo a la página de inicio de sesión

    $modal = "$('#modal').show();";
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/CSS.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <title>Cuponera UDB</title>
        <link rel="shortcut icon" href="/img/logo.png">
    </head>

    <body>
    <div class="container w-50 p-3">

            
                <div class="modal-dialog" role="document">
                <div class="modal-content">
            <div class="modal-header">
            <h5 id="tituloVentanaModal">Error</h5>
            <a href="../../vista/Login.php"><button data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
            </button></a>
            </div>

            <div class="modal-body">
            <div class="alert alert-success">
            <h6><strong>Datos de usuario incorrectos</strong></h6>
            <h6><strong>¿Desea crear un nuevo usuario?</strong></h6>
            </div>
            </div>

            <div class="modal-footer">
            <a href="../../vista/Login.php"><button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button></a>
            <a href="../../vista/Registro.php"><button class="btn btn-success" type="button">Aceptar</button></a>
            </div>
            </div>
            </div>
            </div>
            </div>
        
    </div>
    </body>
    </html>
            

    <?php
}
}
}else{
    echo "<script> alert ('No hay sesión iniciada, por favor inicie sesión'); window.location= '../../vista/Login.php' </script>";
    
}
mysqli_close($conexion);
?>