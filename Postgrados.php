<?php
// Módulo: Director de Carrera


$postgrados = [];

// Crear postgrado
function crearPostgrado(&$postgrados, $id, $nombre, $tipo, $duracion) {
    // tipo: "maestria", "doctorado", "especialidad"
    $postgrado = [
        "id"       => $id,
        "nombre"   => $nombre,
        "tipo"     => $tipo,
        "duracion" => $duracion
    ];
    $postgrados[] = $postgrado;
    echo "Postgrado agregado: " . $nombre . "\n";
}

// Listar postgrados
function listarPostgrados($postgrados) {
    echo "=== Lista de Postgrados ===\n";
    foreach ($postgrados as $postgrado) {
        echo "ID: " . $postgrado["id"] . 
             " | Nombre: " . $postgrado["nombre"] . 
             " | Tipo: " . $postgrado["tipo"] . 
             " | Duración: " . $postgrado["duracion"] . " años\n";
    }
}

// Actualizar postgrado
function actualizarPostgrado(&$postgrados, $id, $nuevoNombre, $nuevoTipo) {
    foreach ($postgrados as &$postgrado) {
        if ($postgrado["id"] === $id) {
            $postgrado["nombre"] = $nuevoNombre;
            $postgrado["tipo"]   = $nuevoTipo;
            echo "Postgrado actualizado: " . $nuevoNombre . "\n";
            return;
        }
    }
    echo "Postgrado no encontrado\n";
}

// Eliminar postgrado
function eliminarPostgrado(&$postgrados, $id) {
    foreach ($postgrados as $key => $postgrado) {
        if ($postgrado["id"] === $id) {
            unset($postgrados[$key]);
            echo "Postgrado con ID $id eliminado\n";
            return;
        }
    }
    echo "Postgrado no encontrado\n";
}


crearPostgrado($postgrados, 1, "Maestría en Sistemas", "maestria", 2);
crearPostgrado($postgrados, 2, "Doctorado en Tecnología", "doctorado", 4);
crearPostgrado($postgrados, 3, "Especialidad en Redes", "especialidad", 1);
listarPostgrados($postgrados);
actualizarPostgrado($postgrados, 1, "Maestría en Software", "maestria");
eliminarPostgrado($postgrados, 3);
listarPostgrados($postgrados);
?>
