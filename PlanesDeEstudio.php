<?php
// Módulo: Director de Carrera


$planes = [];

// Crear plan de estudio
function crearPlan(&$planes, $id, $carreraId, $materias, $semestres) {
    $plan = [
        "id"        => $id,
        "carreraId" => $carreraId,
        "materias"  => $materias,
        "semestres" => $semestres
    ];
    $planes[] = $plan;
    echo "Plan de estudio agregado para carrera ID: $carreraId\n";
}

// Listar planes
function listarPlanes($planes) {
    echo "=== Planes de Estudio ===\n";
    foreach ($planes as $plan) {
        echo "ID: " . $plan["id"] . 
             " | Carrera ID: " . $plan["carreraId"] . 
             " | Semestres: " . $plan["semestres"] . 
             " | Materias: " . implode(", ", $plan["materias"]) . "\n";
    }
}

// Actualizar plan
function actualizarPlan(&$planes, $id, $nuevasMaterias, $nuevosSemestres) {
    foreach ($planes as &$plan) {
        if ($plan["id"] === $id) {
            $plan["materias"]  = $nuevasMaterias;
            $plan["semestres"] = $nuevosSemestres;
            echo "Plan de estudio ID $id actualizado\n";
            return;
        }
    }
    echo "Plan no encontrado\n";
}

// Eliminar plan
function eliminarPlan(&$planes, $id) {
    foreach ($planes as $key => $plan) {
        if ($plan["id"] === $id) {
            unset($planes[$key]);
            echo "Plan con ID $id eliminado\n";
            return;
        }
    }
    echo "Plan no encontrado\n";
}


crearPlan($planes, 1, 1, ["Matemáticas", "Programación", "Base de Datos"], 8);
crearPlan($planes, 2, 2, ["Contabilidad", "Economía", "Finanzas"], 6);
listarPlanes($planes);
actualizarPlan($planes, 1, ["Cálculo", "POO", "Redes"], 9);
eliminarPlan($planes, 2);
listarPlanes($planes);
?>
