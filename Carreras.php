<?php
// Módulo: Director de Carrera


$carreras = [];

// Crear carrera
function crearCarrera(&$carreras, $id, $nombre, $duracion) {
    $carrera = [
        "id"       => $id,
        "nombre"   => $nombre,
        "duracion" => $duracion
    ];
    $carreras[] = $carrera;
    echo "Carrera agregada: " . $nombre . "\n";
}

// Listar carreras
function listarCarreras($carreras) {
    echo "=== Lista de Carreras ===\n";
    foreach ($carreras as $carrera) {
        echo "ID: " . $carrera["id"] . 
             " | Nombre: " . $carrera["nombre"] . 
             " | Duración: " . $carrera["duracion"] . " años\n";
    }
}

// Actualizar carrera
function actualizarCarrera(&$carreras, $id, $nuevoNombre, $nuevaDuracion) {
    foreach ($carreras as &$carrera) {
        if ($carrera["id"] === $id) {
            $carrera["nombre"]   = $nuevoNombre;
            $carrera["duracion"] = $nuevaDuracion;
            echo "Carrera actualizada: " . $nuevoNombre . "\n";
            return;
        }
    }
    echo "Carrera no encontrada\n";
}

// Eliminar carrera
function eliminarCarrera(&$carreras, $id) {
    foreach ($carreras as $key => $carrera) {
        if ($carrera["id"] === $id) {
            unset($carreras[$key]);
            echo "Carrera con ID $id eliminada\n";
            return;
        }
    }
    echo "Carrera no encontrada\n";
}


crearCarrera($carreras, 1, "Ingeniería en Sistemas", 4);
crearCarrera($carreras, 2, "Administración", 3);
listarCarreras($carreras);
actualizarCarrera($carreras, 1, "Ingeniería en Software", 5);
eliminarCarrera($carreras, 2);
listarCarreras($carreras);
?>
