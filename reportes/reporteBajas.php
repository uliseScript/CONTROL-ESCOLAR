<?php
$titulo = "Reportes de Bajas y Deserciones";
$pagina_activa = "bajas";
include "header.php";

$resumen_bajas = [
    ["carrera" => "Ing. en Sistemas", "matricula" => 610, "temporales" => 9, "definitivas" => 15],
    ["carrera" => "Lic. en Administración", "matricula" => 645, "temporales" => 10, "definitivas" => 14],
    ["carrera" => "Lic. en Derecho", "matricula" => 710, "temporales" => 8, "definitivas" => 11],
    ["carrera" => "Lic. en Psicología", "matricula" => 598, "temporales" => 11, "definitivas" => 13]
];

$alumnos_baja = [
    ["matricula" => "20231245", "nombre" => "García López, Ana", "carrera" => "Lic. en Psicología", "fecha" => "15/05/2026", "causal" => "Económica", "tipo" => "Temporal"],
    ["matricula" => "20221098", "nombre" => "Martínez Ruiz, Carlos", "carrera" => "Ing. en Sistemas", "fecha" => "10/05/2026", "causal" => "Académica", "tipo" => "Definitiva"],
    ["matricula" => "20240567", "nombre" => "Hernández Salas, María", "carrera" => "Lic. en Derecho", "fecha" => "08/05/2026", "causal" => "Personal", "tipo" => "Temporal"],
    ["matricula" => "20211456", "nombre" => "Ramírez Torres, Luis", "carrera" => "Lic. en Administración", "fecha" => "02/05/2026", "causal" => "Laboral", "tipo" => "Definitiva"]
];
?>

<h2>Reportes de Bajas y Deserciones</h2>

<form class="filtros" method="get">
    <label>Ciclo:</label>
    <select name="ciclo">
        <option>2026-1</option>
        <option>2025-2</option>
    </select>

    <label>Tipo:</label>
    <select name="tipo">
        <option>Todas</option>
        <option>Temporal</option>
        <option>Definitiva</option>
    </select>

    <label>Causal:</label>
    <select name="causal">
        <option>Todas</option>
        <option>Económica</option>
        <option>Académica</option>
        <option>Personal</option>
    </select>

    <button type="submit" onclick="generarReporte()">Generar</button>
    <button type="button" onclick="exportarPDF()">PDF</button>
    <button type="button" onclick="exportarExcel()">Excel</button>
</form>

<h3>Resumen por Carrera</h3>
<table>
    <thead>
        <tr>
            <th>Carrera</th>
            <th>Matrícula</th>
            <th>Temporales</th>
            <th>Definitivas</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resumen_bajas as $fila) {
            $total = $fila["temporales"] + $fila["definitivas"];
        ?>
            <tr>
                <td><?php echo $fila["carrera"]; ?></td>
                <td><?php echo $fila["matricula"]; ?></td>
                <td><?php echo $fila["temporales"]; ?></td>
                <td><?php echo $fila["definitivas"]; ?></td>
                <td><?php echo $total; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<h3>Alumnos Dados de Baja</h3>
<table>
    <thead>
        <tr>
            <th>Matrícula</th>
            <th>Alumno</th>
            <th>Carrera</th>
            <th>Fecha</th>
            <th>Causal</th>
            <th>Tipo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($alumnos_baja as $a) { ?>
            <tr>
                <td><?php echo $a["matricula"]; ?></td>
                <td><?php echo $a["nombre"]; ?></td>
                <td><?php echo $a["carrera"]; ?></td>
                <td><?php echo $a["fecha"]; ?></td>
                <td><?php echo $a["causal"]; ?></td>
                <td><?php echo $a["tipo"]; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include "footer.php"; ?>
