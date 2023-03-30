<?php 

class Pog { 

    private $idUsuario; //atributo para guardar el id del usuario

    public function mostrarOfertas() { 

        if(isset($_SESSION['usuario'])) {
            $this->idUsuario = $_SESSION['usuario'];
        } else {
            $this->idUsuario = 0;
        }

        // Obtener la palabra clave ingresada por el usuario 
        $filtro = isset($_POST['filtro']) ? $_POST['filtro'] : ''; 

        // Verificar si se ha enviado la acción "quitar filtro" 
        if(isset($_POST['quitar-filtro'])) { 
            // Redirigir a la página actual sin filtro 
            header("Location: " . $_SERVER['PHP_SELF']); 
            exit(); 
        } 

        $xml = simplexml_load_file(__DIR__ . '/../../controlador/oferta.xml');
        $conexion = mysqli_connect('localhost', 'root', '', 'cuponeria');
        
        // Recorrer los elementos del XML y mostrarlos 
        foreach($xml->children() as $oferta) { 
            $idCupon = $oferta->idOferta; //se agregó punto y coma faltante

            // Verificar si se debe mostrar esta oferta según el filtro 
            if(empty($filtro) || stripos($oferta->descripcion, $filtro) !== false) { 

                $colorTarjeta = 'bg-success'; // por defecto, la tarjeta es verde

                if(isset($_SESSION['usuario'])) {
                    $comprarBtn = '<div class="text-center"><form method="post"><input type="hidden" name="idCupon" value="'.$oferta->idOferta.'" /><button type="submit" class="btn btn-dark">Comprar</button></form></div>';

                    if(isset($_POST['idCupon'])) { 
                        $idCupon = $_POST['idCupon'];
                        $idUsuario = $this->idUsuario; // se utiliza el atributo de la clase en vez de una variable local
                        // crear una consulta SQL para insertar la compra en la base de datos 
                        $insertar_compra = "INSERT INTO usuario_cupon (idUsuario, idCupon, fecha_compra) VALUES ('$idUsuario', '$idCupon', NOW())"; 
                        $resultado = mysqli_query($conexion, $insertar_compra); 

                        if (!$resultado) { 
                            echo 'Error al insertar compra'; 
                        }
                    }
                    
                } else {
                    $comprarBtn = '<div class="text-center"><a href="Login.php"><button type="button" class="btn btn-dark">Comprar</button></a></div>';
                }

                if($oferta->estadoOferta == 2 || $oferta->cupones_disponibles == 0) { 
                    // si la oferta está inactiva o el producto no está disponible
                    $colorTarjeta = 'bg-danger'; // la tarjeta es roja
                    $comprarBtn = '<div class="text-center"><button type="button" class="btn btn-dark" disabled>No disponible</button></div>'; // el botón "Comprar" está deshabilitado
                }

                echo '<div class="card '.$colorTarjeta.'" style="width: 15rem;">'; 
                echo '<div class="card-body">'; 
                echo '<img src="' . 'img/' . $oferta->img . '" class="card-img-top" alt="' . $oferta->descripcion . '">';
                echo '<br>';
                echo '<h5 class="card-title">' . $oferta->descripcion . '</h5>'; 
                
                if($oferta->cupones_disponibles == 0) {
                    echo '<div class="bg-danger text-white p-2 position-absolute top-0 start-0 producto-no-disponible">Producto agotado</div>';
                }
                if($oferta->estadoOferta == 2) {
                    echo '<div class="bg-danger text-white p-2 position-absolute top-0 start-0 producto-no-disponible">Fecha limite alcanzada</div>';
                }
                
                echo '<p class="card-text">Cupones disponibles: ' . $oferta->cupones_disponibles . '</p>'; 
                
                if($oferta->estadoOferta == 1) { 
                    $estado = 'Activa'; 
                } else { 
                    $estado = 'Inactiva'; 
                } 
                echo '<p class="card-text">Precio del cupón: $' . $oferta->precio . '</p>'; 

                echo '<div class="text-center"><button type="button" class="btn btn-primary detalles-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-descripcion="'.$oferta->descripcion.'" data-disponible="'.$oferta->cupones_disponibles.'" data-estado="'.$oferta->estadoOferta.'" data-fecha="'.$oferta->fecha_vencimiento. '" data-precio="'.$oferta->precio. '" data-imagen="'.$oferta->img. '">Detalles</button></div>';
                echo '<br>';
                echo $comprarBtn; // muestra el botón "Comprar" (habilitado o deshabilitado) según el estado de la oferta y la disponibilidad del producto
                echo '</div>'; 
                echo '</div>';
            } 
        } 

        // Obtener el botón "quitar filtrado" 
        $quitarFiltroBtn = '<form method="post"><button type="submit" name="quitar-filtro" class="btn btn-outline-secondary ms-2" id="quitar-filtro-btn">Quitar filtrado</button></form>'; 
    

    } 
} 

?>