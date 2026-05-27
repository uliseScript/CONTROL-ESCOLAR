<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
require_once "../conexion.php";
$datos = json_decode(file_get_contents("php://input"), true);
$matricula = $datos["matricula"];
$semestre = $datos["semestre"];
$fecha = $datos["fecha_reinscripcion"];
$res = $conn->query("SELECT id FROM alumnos WHERE matricula='$matricula'");
$alumno = $res->fetch_assoc();
if ($alumno) {
    $alumno_id = $alumno["id"];
    $sql = "INSERT INTO reinscripciones (alumno_id, semestre, fecha_reinscripcion) VALUES ('$alumno_id', '$semestre', '$fecha')";
    if ($conn->query($sql)) {
        echo json_encode(["mensaje" => "Reinscripción realizada correctamente"]);
    } else {
        echo json_encode(["mensaje" => "Error al realizar reinscripción"]);
    }
} else {
    echo json_encode(["mensaje" => "Matrícula no encontrada"]);
}
$conn->close();
?>
