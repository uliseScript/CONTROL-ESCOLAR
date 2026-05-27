<?php
// ==================================
// MÓDULO: Administrativo Nivel B
// INTERFAZ: Home - Menú Principal
// AUTOR: Erik mtz
// ===================================

$menuAdminNivelB = [
    "modulo" => "Administrativo Nivel B",
    "opciones" => [
        ["id" => 1, "nombre" => "CRUD de Pagos", "descripcion" => "Gestión de pagos de alumnos"],
        ["id" => 2, "nombre" => "CRUD de Becas", "descripcion" => "Gestión de becas"],
        ["id" => 3, "nombre" => "Titulación",    "descripcion" => "Gestión de titulación"],
    ]
];

echo "=== BIENVENIDO AL MÓDULO ADMINISTRATIVO NIVEL B ===\n";
foreach ($menuAdminNivelB["opciones"] as $opcion) {
    echo "[{$opcion['id']}] {$opcion['nombre']} - {$opcion['descripcion']}\n";
}
?>