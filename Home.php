<?php
$titulo = "Inicio - Secretario Académico";
$pagina_activa = "home";
include "header.php";

// Opciones del menú
$opciones = [
    ["url" => "reporte_matricula.php", "nombre" => "Reportes de Matrícula"],
    ["url" => "reporte_bajas.php", "nombre" => "Reportes de Bajas y Deserciones"],
    ["url" => "reporte_becas.php", "nombre" => "Reportes de Becas"],
    ["url" => "reporte_aprovechamiento.php", "nombre" => "Reporte de Aprovechamiento"]
];
?>

<h2>Menú Principal</h2>

<div class="menu">
    <?php foreach ($opciones as $op) { ?>
        <a href="<?php echo $op['url']; ?>"><?php echo $op['nombre']; ?></a>
    <?php } ?>
</div>

<?php include "footer.php"; ?>
