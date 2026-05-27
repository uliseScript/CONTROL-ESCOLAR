<?php
$host = "localhost";
$usuario = "root";
$password = "";
$base_datos = "control_escolar";

$conn = new mysqli($host, $usuario, $password, $base_datos);

if ($conn->connect_error) {
    die(json_encode(["mensaje" => "Error de conexión: " . $conn->connect_error]));
}
?>
