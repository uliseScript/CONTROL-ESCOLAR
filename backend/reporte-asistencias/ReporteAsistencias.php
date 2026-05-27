<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
require_once "../conexion.php";
$datos = json_decode(file_get_contents("php://input"), true);
$profesor_id = $datos["profesor_id"];
$alumno_id = $datos["alumno_id"];
$materia = $datos["materia"];
$fecha = $datos["fecha"];
$status = $datos["status"];
$sql = "INSERT INTO asistencias (profesor_id, alumno_id, materia, fecha, status) VALUES ('$profesor_id', '$alumno_id', '$materia', '$fecha', '$status')";
if ($conn->query($sql)) {
    echo json_encode(["mensaje" => "Asistencia registrada correctamente"]);
} else {
    echo json_encode(["mensaje" => "Error al registrar asistencia"]);
}
$conn->close();
?>
