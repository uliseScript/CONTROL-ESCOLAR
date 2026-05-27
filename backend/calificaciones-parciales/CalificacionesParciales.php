<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
require_once "../conexion.php";
$datos = json_decode(file_get_contents("php://input"), true);
$profesor_id = $datos["profesor_id"];
$alumno_id = $datos["alumno_id"];
$materia = $datos["materia"];
$parcial = $datos["parcial"];
$calificacion = $datos["calificacion"];
$sql = "INSERT INTO calificaciones_parciales (profesor_id, alumno_id, materia, parcial, calificacion) VALUES ('$profesor_id', '$alumno_id', '$materia', '$parcial', '$calificacion')";
if ($conn->query($sql)) {
    echo json_encode(["mensaje" => "Calificación parcial registrada correctamente"]);
} else {
    echo json_encode(["mensaje" => "Error al registrar calificación"]);
}
$conn->close();
?>
