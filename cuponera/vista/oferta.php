<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cuponeria";

$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de la tabla "oferta"
$sql = "SELECT * FROM oferta";
$result = $conn->query($sql);

// Generar el archivo XML
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><ofertas></ofertas>');

while($row = $result->fetch_assoc()) {
  $oferta = $xml->addChild('oferta');
  $oferta->addChild('idOferta', $row['idOferta']);
  $oferta->addChild('fecha_registro', $row['fecha_registro']);
  $oferta->addChild('fecha_vencimiento', $row['fecha_vencimiento']);
  $oferta->addChild('precio', $row['precio']);
  $oferta->addChild('descripcion', $row['descripcion']);
  $oferta->addChild('cupones_disponibles', $row['cupones_disponibles']);
  $oferta->addChild('ingresos_totales', $row['ingresos_totales']);
  $oferta->addChild('cargo_por_servicio', $row['cargo_por_servicio']);
  $oferta->addChild('estadoOferta', $row['estadoOferta']);
  $oferta->addChild('idCupones', $row['idCupones']);
}

// Guardar el archivo XML en la ruta especificada
$filename = '../controlador/oferta.xml';
file_put_contents($filename, $xml->asXML());

// Cerrar la conexión a la base de datos
$conn->close();
?>