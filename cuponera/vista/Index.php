<?php
// Iniciamos sesión en la página
session_start();
?>
<!DOCTYPE html>
<html lang="en">
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
        <link rel="shortcut icon" href="img/carrito.png">
    </head>

    <body>
    <?php
        require 'menu.php';
        ?>
      <br>
      <h2>Inicio</h2>
      <br>
      <?php
        require 'carrusel.php';
        ?>
      <br>
      <h2>Lo que puedes encontrar</h2>
      <br>
      <div class="container">
        <div class="row">
          <div class="col">
            <center><img src="img/alitas.jpg" id="ROPA"></center>
          </div>
          <div class="col">
            <center><img src="img/vistazo.png" id="ROPA"></center>
          </div>
          <div class="col">
            <center><img src="img/tele.jpg" id="ROPA"></center>
          </div>
        </div>
      </div>
      <br>
      <br>
      <div class="container">
        <div class="row">
          <div class="col">
            <center><img src="img/pizza.jpg" id="ROPA"></center>
          </div>
          <div class="col">
            <center><img src="img/auri2.png" id="ROPA"></center>
          </div>
          <div class="col">
            <center><img src="img/disco2.jpg" id="ROPA"></center>
          </div>
        </div>
      </div>
    </body>
    <br>
    <br>
    <?php
        require 'footer.php';
    
    ?>

</html>