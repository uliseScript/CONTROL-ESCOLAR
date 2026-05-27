<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
require_once "../conexion.php";
$datos = json_decode(file_get_contents("php://input"), true);
$matricula = $datos["matricula"];
$concepto = $datos["concepto"];
$monto = $datos["monto"];
$fecha = $datos["fecha_pago"];
$status = $datos["status"];
$res = $conn->query("SELECT id FROM alumnos WHERE matricula='$matricula'");
$alumno = $res->fetch_assoc();
if ($alumno) {
    $alumno_id = $alumno["id"];
    $sql = "INSERT INTO pagos (alumno_id, concepto, monto, fecha_pago, status) VALUES ('$alumno_id', '$concepto', '$monto', '$fecha', '$status')";
    if ($conn->query($sql)) {
        echo json_encode(["mensaje" => "Pago registrado correctamente"]);
    } else {
        echo json_encode(["mensaje" => "Error al registrar pago"]);
    }
} else {
    echo json_encode(["mensaje" => "Matrícula no encontrada"]);
}
$conn->close();
?>
