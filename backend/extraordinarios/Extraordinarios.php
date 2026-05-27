<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
require_once "../conexion.php";
$datos = json_decode(file_get_contents("php://input"), true);
$profesor_id = $datos["profesor_id"];
$alumno_id = $datos["alumno_id"];
$materia = $datos["materia"];
$calificacion = $datos["calificacion"];
$fecha = $datos["fecha_examen"];
$status = $datos["status"];
$sql = "INSERT INTO examenes_extraordinarios (profesor_id, alumno_id, materia, calificacion, fecha_examen, status) VALUES ('$profesor_id', '$alumno_id', '$materia', '$calificacion', '$fecha', '$status')";
if ($conn->query($sql)) {
    echo json_encode(["mensaje" => "Examen extraordinario registrado correctamente"]);
} else {
    echo json_encode(["mensaje" => "Error al registrar examen extraordinario"]);
}
$conn->close();
?>
