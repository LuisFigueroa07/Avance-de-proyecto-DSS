<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Iniciar Sesión</title>
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="css/CSS.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="js/validar.js"></script>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
        <link rel="shortcut icon" href="img/logo.png">
</head>
<body>

<?php
      require 'menu.php';
      ?>
      <br>
    <div class="cuadrologin">
<form action="../modelo/usuario/iniciarSesion.php" method="post" class="form-register" onsubmit="return validar();">
<h2 class="form__titulo">Iniciar Sesión</h2>
<div class="contenedor-inputs">
<input type="text" id="usuario" name="usuario" placeholder="Usuario" class="input-48">
<input type="password" id="clave" name="clave" placeholder="Contraseña" class="input-48">
<center>
<input type="submit" value="Iniciar" class="btn-enviar">
</center>
<br>
<p class="form__link">¿No tienes cuenta? <a href="Registro.php">Ingresa aquí</a></p>
</div>
</form>
</div>
</body>
</html>