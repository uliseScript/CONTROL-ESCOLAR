<?php
$titulo = "Reportes de Matrícula";
$pagina_activa = "matricula";
include "header.php";

// Datos de ejemplo (en un sistema real vendrían de la base de datos)
$matricula = [
    ["carrera" => "Ing. en Sistemas", "nivel" => "Licenciatura", "hombres" => 412, "mujeres" => 198],
    ["carrera" => "Lic. en Administración", "nivel" => "Licenciatura", "hombres" => 289, "mujeres" => 356],
    ["carrera" => "Lic. en Derecho", "nivel" => "Licenciatura", "hombres" => 312, "mujeres" => 398],
    ["carrera" => "Lic. en Psicología", "nivel" => "Licenciatura", "hombres" => 142, "mujeres" => 456],
    ["carrera" => "Mtría. en Educación", "nivel" => "Maestría", "hombres" => 78, "mujeres" => 132],
    ["carrera" => "Mtría. en Cs. Computacionales", "nivel" => "Maestría", "hombres" => 134, "mujeres" => 87]
];
?>

<h2>Reportes de Matrícula</h2>

<form class="filtros" method="get">
    <label>Ciclo:</label>
    <select name="ciclo">
        <option>2026-1</option>
        <option>2025-2</option>
    </select>

    <label>Nivel:</label>
    <select name="nivel">
        <option>Todos</option>
        <option>Licenciatura</option>
        <option>Maestría</option>
    </select>

    <label>Carrera:</label>
    <select name="carrera">
        <option>Todas</option>
        <option>Ing. en Sistemas</option>
        <option>Lic. en Administración</option>
        <option>Lic. en Derecho</option>
    </select>

    <button type="submit" onclick="generarReporte()">Generar</button>
    <button type="button" onclick="exportarPDF()">PDF</button>
    <button type="button" onclick="exportarExcel()">Excel</button>
</form>

<table>
    <thead>
        <tr>
            <th>Carrera</th>
            <th>Nivel</th>
            <th>Hombres</th>
            <th>Mujeres</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total_h = 0;
        $total_m = 0;
        foreach ($matricula as $fila) {
            $total = $fila["hombres"] + $fila["mujeres"];
            $total_h += $fila["hombres"];
            $total_m += $fila["mujeres"];
        ?>
            <tr>
                <td><?php echo $fila["carrera"]; ?></td>
                <td><?php echo $fila["nivel"]; ?></td>
                <td><?php echo $fila["hombres"]; ?></td>
                <td><?php echo $fila["mujeres"]; ?></td>
                <td><?php echo $total; ?></td>
            </tr>
        <?php } ?>
        <tr>
            <th colspan="2">TOTAL</th>
            <th><?php echo $total_h; ?></th>
            <th><?php echo $total_m; ?></th>
            <th><?php echo $total_h + $total_m; ?></th>
        </tr>
    </tbody>
</table>

<?php include "footer.php"; ?>
