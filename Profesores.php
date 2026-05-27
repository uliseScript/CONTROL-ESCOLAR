<?php
// Módulo: Director de Carrera


$profesores = [];

// Crear profesor
function crearProfesor(&$profesores, $id, $nombre, $materia, $carrera) {
    $profesor = [
        "id" => $id,
        "nombre" => $nombre,
        "materia" => $materia,
        "carrera" => $carrera
    ];
    $profesores[] = $profesor;
    echo "Profesor agregado: " . $nombre . "\n";
}

// Listar profesores
function listarProfesores($profesores) {
    echo "=== Lista de Profesores ===\n";
    foreach ($profesores as $profesor) {
        echo "ID: " . $profesor["id"] . 
             " | Nombre: " . $profesor["nombre"] . 
             " | Materia: " . $profesor["materia"] . 
             " | Carrera: " . $profesor["carrera"] . "\n";
    }
}

// Actualizar profesor
function actualizarProfesor(&$profesores, $id, $nuevoNombre, $nuevaMateria) {
    foreach ($profesores as &$profesor) {
        if ($profesor["id"] === $id) {
            $profesor["nombre"] = $nuevoNombre;
            $profesor["materia"] = $nuevaMateria;
            echo "Profesor actualizado: " . $nuevoNombre . "\n";
            return;
        }
    }
    echo "Profesor no encontrado\n";
}


function eliminarProfesor(&$profesores, $id) {
    foreach ($profesores as $key => $profesor) {
        if ($profesor["id"] === $id) {
            unset($profesores[$key]);
            echo "Profesor con ID $id eliminado\n";
            return;
        }
    }
    echo "Profesor no encontrado\n";
}


crearProfesor($profesores, 1, "Juan Pérez", "Matemáticas", "Ingeniería");
crearProfesor($profesores, 2, "Ana López", "Física", "Sistemas");
listarProfesores($profesores);
actualizarProfesor($profesores, 1, "Juan García", "Cálculo");
eliminarProfesor($profesores, 2);
listarProfesores($profesores);
?>
