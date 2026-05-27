<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
require_once "../conexion.php";
$datos = json_decode(file_get_contents("php://input"), true);
$profesor_id = $datos["profesor_id"];
$materia = $datos["materia"];
$sql = "SELECT alumno_id, materia, parcial, calificacion FROM calificaciones_parciales WHERE profesor_id='$profesor_id' AND materia='$materia'";
$resultado = $conn->query($sql);
$registros = [];
while ($fila = $resultado->fetch_assoc()) {
    $registros[] = $fila;
}
echo json_encode(["registros" => $registros]);
$conn->close();
?>
