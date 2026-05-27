<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
require_once "../conexion.php";
$datos = json_decode(file_get_contents("php://input"), true);
$matricula = $datos["matricula"];
$profesor_id = $datos["profesor_id"];
$puntaje = $datos["puntaje"];
$comentario = $datos["comentario"];
$fecha = $datos["fecha_evaluacion"];
$res = $conn->query("SELECT id FROM alumnos WHERE matricula='$matricula'");
$alumno = $res->fetch_assoc();
if ($alumno) {
    $alumno_id = $alumno["id"];
    $sql = "INSERT INTO evaluacion_profesores (alumno_id, profesor_id, puntaje, comentario, fecha_evaluacion) VALUES ('$alumno_id', '$profesor_id', '$puntaje', '$comentario', '$fecha')";
    if ($conn->query($sql)) {
        echo json_encode(["mensaje" => "Evaluación registrada correctamente"]);
    } else {
        echo json_encode(["mensaje" => "Error al registrar evaluación"]);
    }
} else {
    echo json_encode(["mensaje" => "Matrícula no encontrada"]);
}
$conn->close();
?>
