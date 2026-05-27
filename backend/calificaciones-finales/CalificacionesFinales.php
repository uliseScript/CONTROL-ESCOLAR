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
$status = $datos["status"];
$sql = "INSERT INTO calificaciones_finales (profesor_id, alumno_id, materia, calificacion, status) VALUES ('$profesor_id', '$alumno_id', '$materia', '$calificacion', '$status')";
if ($conn->query($sql)) {
    echo json_encode(["mensaje" => "Calificación final registrada correctamente"]);
} else {
    echo json_encode(["mensaje" => "Error al registrar calificación final"]);
}
$conn->close();
?>
