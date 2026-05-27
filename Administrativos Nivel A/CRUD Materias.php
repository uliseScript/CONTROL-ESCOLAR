<?php

echo "<h1>CRUD Materias</h1>";

$materias = [
    "Matemáticas",
    "Programación",
    "Base de Datos"
];

echo "<h3>Lista de materias</h3>";

foreach($materias as $materia){
    echo $materia . "<br>";
}

echo "<hr>";

echo "Materia agregada correctamente";
?>
