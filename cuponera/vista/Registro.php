<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registra tu cuenta</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="cuadro">
        <form action="../modelo/usuario/daoUsuario.php" method="post" class="form-register" onsubmit="return validar();">
            <h2 class="form__titulo">Crea una Cuenta</h2>
            <div class="contenedor-inputs">
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" class="input-48">
                <input type="text" id="apellido" name="apellido" placeholder="Apellido" class="input-48">
                <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" class="input-48">
                <input type="email" id="email" name="email" placeholder="Email" class="input-100">
                <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" class="input-48" maxlength="9">
                <input type="text" id="direccion" name="direccion" placeholder="Dirección" class="input-100">
                <input type="text" id="dui" name="dui" placeholder="DUI" class="input-48" maxlength="10">
                <input type="submit" value="Registrar" class="btn-enviar">
                <br>
                <p class="form__link">¿Ya tienes una cuenta? <a href="Login.php">Ingresa aquí</a></p>
            </div>
        </form>
    </div>
    <script src="js/validar.js"></script>

</body>
</html>