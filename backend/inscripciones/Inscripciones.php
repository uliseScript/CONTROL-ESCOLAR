<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
require_once "../conexion.php";
$datos = json_decode(file_get_contents("php://input"), true);
$nombre = $datos["nombre"];
$apellido_paterno = $datos["apellido_paterno"];
$apellido_materno = $datos["apellido_materno"];
$matricula = $datos["matricula"];
$carrera = $datos["carrera"];
$semestre = $datos["semestre"];
$email = $datos["email"];
$telefono = $datos["telefono"];
$sql = "INSERT INTO alumnos (nombre, apellido_paterno, apellido_materno, matricula, carrera, semestre, email, telefono) VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$matricula', '$carrera', '$semestre', '$email', '$telefono')";
if ($conn->query($sql)) {
    echo json_encode(["mensaje" => "Alumno inscrito correctamente"]);
} else {
    echo json_encode(["mensaje" => "Error al inscribir alumno"]);
}
$conn->close();
?>
