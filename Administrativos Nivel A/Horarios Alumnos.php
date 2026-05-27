<?php

echo "<h1>CRUD Horarios Profesores</h1>";

$horarios = [
    [
        "profesor" => "Juan Pérez",
        "materia" => "Programación",
        "hora" => "08:00 AM"
    ],
    [
        "profesor" => "Ana López",
        "materia" => "Matemáticas",
        "hora" => "10:00 AM"
    ]
];

echo "<h3>Horarios registrados</h3>";

foreach($horarios as $h){

    echo "Profesor: " . $h['profesor'] . "<br>";
    echo "Materia: " . $h['materia'] . "<br>";
    echo "Hora: " . $h['hora'] . "<br><br>";
}

?>