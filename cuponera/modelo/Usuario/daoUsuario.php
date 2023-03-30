<?php
include '../conexion.php';

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$contrasena = $_POST["contrasena"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
$dui = $_POST["dui"];

$idCargo = 3; // Asignamos el valor 3 a la variable $idCargo

$insertar = "INSERT INTO usuario (nombre, apellido, contraseña, direccion_correo, telefono, direccion_recidencia, DUI, idCargo) 
VALUES ('$nombre', '$apellido', '$contrasena', '$email', '$telefono', '$direccion', '$dui', '$idCargo')";

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE direccion_correo = '$email'");
if (mysqli_num_rows($verificar_usuario) > 0) {
    echo '<script>
        alert("Este correo ya esta registrado, por favor introduzca otro");
        window.history.go(-1);
        </script>';
    exit;
}

$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
    echo 'Error al registrarse';
} else {
    echo '<script>
        alert("Usted ha sido registrado exitosamente");
        window.history.go(-1);
        </script>';
}
mysqli_close($conexion);
?>