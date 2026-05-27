<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
require_once "../conexion.php";
$datos = json_decode(file_get_contents("php://input"), true);
$matricula = $datos["matricula"];
$tipo = $datos["tipo"];
$motivo = $datos["motivo"];
$fecha = $datos["fecha_baja"];
$res = $conn->query("SELECT id FROM alumnos WHERE matricula='$matricula'");
$alumno = $res->fetch_assoc();
if ($alumno) {
    $alumno_id = $alumno["id"];
    $sql = "INSERT INTO bajas (alumno_id, motivo, fecha_baja, tipo) VALUES ('$alumno_id', '$motivo', '$fecha', '$tipo')";
    if ($conn->query($sql)) {
        echo json_encode(["mensaje" => "Baja registrada correctamente"]);
    } else {
        echo json_encode(["mensaje" => "Error al registrar baja"]);
    }
} else {
    echo json_encode(["mensaje" => "Matrícula no encontrada"]);
}
$conn->close();
?>
