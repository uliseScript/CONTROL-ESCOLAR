<?php
// Módulo: Director de Carrera


$evaluaciones = [];

// Registrar evaluación
function evaluarProfesor(&$evaluaciones, $idProfesor, $puntaje, $comentario) {
    $evaluacion = [
        "idProfesor" => $idProfesor,
        "puntaje"    => $puntaje,
        "comentario" => $comentario
    ];
    $evaluaciones[] = $evaluacion;
    echo "Evaluación registrada para profesor ID: $idProfesor\n";
}

// Ver evaluaciones de un profesor
function verEvaluaciones($evaluaciones, $idProfesor) {
    echo "=== Evaluaciones del Profesor ID: $idProfesor ===\n";
    foreach ($evaluaciones as $evaluacion) {
        if ($evaluacion["idProfesor"] === $idProfesor) {
            echo "Puntaje: " . $evaluacion["puntaje"] . 
                 " | Comentario: " . $evaluacion["comentario"] . "\n";
        }
    }
}

// Promedio de evaluación
function promedioEvaluacion($evaluaciones, $idProfesor) {
    $total = 0;
    $cantidad = 0;
    foreach ($evaluaciones as $evaluacion) {
        if ($evaluacion["idProfesor"] === $idProfesor) {
            $total += $evaluacion["puntaje"];
            $cantidad++;
        }
    }
    if ($cantidad > 0) {
        $promedio = $total / $cantidad;
        echo "Promedio del profesor ID $idProfesor: $promedio\n";
    } else {
        echo "No hay evaluaciones para este profesor\n";
    }
}


evaluarProfesor($evaluaciones, 1, 9, "Excelente maestro");
evaluarProfesor($evaluaciones, 1, 8, "Muy buen desempeño");
evaluarProfesor($evaluaciones, 2, 7, "Buen maestro");
verEvaluaciones($evaluaciones, 1);
promedioEvaluacion($evaluaciones, 1);
?>
