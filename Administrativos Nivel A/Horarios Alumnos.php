<?php

echo "<h1>CRUD Horarios Alumnos</h1>";

$alumnos = [
    [
        "alumno" => "Carlos",
        "materia" => "Base de Datos",
        "hora" => "09:00 AM"
    ],
    [
        "alumno" => "María",
        "materia" => "Programación",
        "hora" => "11:00 AM"
    ]
];

echo "<h3>Horarios de alumnos</h3>";

foreach($alumnos as $a){

    echo "Alumno: " . $a['alumno'] . "<br>";
    echo "Materia: " . $a['materia'] . "<br>";
    echo "Hora: " . $a['hora'] . "<br><br>";
}

?>