<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
require_once "../conexion.php";
$datos = json_decode(file_get_contents("php://input"), true);
$matricula = $datos["matricula"];
$carrera_anterior = $datos["carrera_anterior"];
$carrera_nueva = $datos["carrera_nueva"];
$motivo = $datos["motivo"];
$fecha = $datos["fecha_cambio"];
$res = $conn->query("SELECT id FROM alumnos WHERE matricula='$matricula'");
$alumno = $res->fetch_assoc();
if ($alumno) {
    $alumno_id = $alumno["id"];
    $sql = "INSERT INTO cambios_carrera (alumno_id, carrera_anterior, carrera_nueva, fecha_cambio, motivo) VALUES ('$alumno_id', '$carrera_anterior', '$carrera_nueva', '$fecha', '$motivo')";
    if ($conn->query($sql)) {
        $conn->query("UPDATE alumnos SET carrera='$carrera_nueva' WHERE id='$alumno_id'");
        echo json_encode(["mensaje" => "Cambio de carrera registrado correctamente"]);
    } else {
        echo json_encode(["mensaje" => "Error al registrar cambio"]);
    }
} else {
    echo json_encode(["mensaje" => "Matrícula no encontrada"]);
}
$conn->close();
?>
