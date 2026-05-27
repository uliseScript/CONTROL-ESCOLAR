<?php
$titulo = "Reporte de Aprovechamiento";
$pagina_activa = "aprovechamiento";
include "header.php";

$por_carrera = [
    ["carrera" => "Ing. en Sistemas", "nivel" => "Licenciatura", "matricula" => 610, "promedio" => 8.3, "aprobados" => 552, "reprobados" => 58],
    ["carrera" => "Lic. en Administración", "nivel" => "Licenciatura", "matricula" => 645, "promedio" => 8.5, "aprobados" => 596, "reprobados" => 49],
    ["carrera" => "Lic. en Derecho", "nivel" => "Licenciatura", "matricula" => 710, "promedio" => 8.6, "aprobados" => 660, "reprobados" => 50],
    ["carrera" => "Lic. en Psicología", "nivel" => "Licenciatura", "matricula" => 598, "promedio" => 8.7, "aprobados" => 557, "reprobados" => 41],
    ["carrera" => "Mtría. en Educación", "nivel" => "Maestría", "matricula" => 210, "promedio" => 9.1, "aprobados" => 204, "reprobados" => 6],
    ["carrera" => "Mtría. en Cs. Computacionales", "nivel" => "Maestría", "matricula" => 221, "promedio" => 9.3, "aprobados" => 216, "reprobados" => 5]
];

$por_grupo = [
    ["grupo" => "ISIS-1A", "semestre" => "1°", "alumnos" => 32, "promedio" => 8.1, "aprobacion" => "87.5%"],
    ["grupo" => "ISIS-1B", "semestre" => "1°", "alumnos" => 30, "promedio" => 8.0, "aprobacion" => "86.7%"],
    ["grupo" => "ISIS-3A", "semestre" => "3°", "alumnos" => 28, "promedio" => 8.4, "aprobacion" => "92.9%"],
    ["grupo" => "ISIS-5A", "semestre" => "5°", "alumnos" => 26, "promedio" => 8.5, "aprobacion" => "92.3%"]
];

$comparativo = [
    ["indicador" => "Matrícula total", "lic" => "3,856", "mtria" => "431"],
    ["indicador" => "Promedio general", "lic" => "8.4", "mtria" => "9.2"],
    ["indicador" => "% Aprobación", "lic" => "91.6%", "mtria" => "97.4%"],
    ["indicador" => "% Reprobación", "lic" => "8.4%", "mtria" => "2.6%"]
];
?>

<h2>Reporte de Aprovechamiento</h2>

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

    <label>Grupo:</label>
    <select name="grupo">
        <option>Todos</option>
        <option>1° A</option>
        <option>3° A</option>
        <option>5° A</option>
    </select>

    <button type="submit" onclick="generarReporte()">Generar</button>
    <button type="button" onclick="exportarPDF()">PDF</button>
    <button type="button" onclick="exportarExcel()">Excel</button>
</form>

<h3>Aprovechamiento por Carrera</h3>
<table>
    <thead>
        <tr>
            <th>Carrera</th>
            <th>Nivel</th>
            <th>Matrícula</th>
            <th>Promedio</th>
            <th>Aprobados</th>
            <th>Reprobados</th>
            <th>% Aprobación</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($por_carrera as $c) {
            $porcentaje = round(($c["aprobados"] / $c["matricula"]) * 100, 1);
        ?>
            <tr>
                <td><?php echo $c["carrera"]; ?></td>
                <td><?php echo $c["nivel"]; ?></td>
                <td><?php echo $c["matricula"]; ?></td>
                <td><?php echo $c["promedio"]; ?></td>
                <td><?php echo $c["aprobados"]; ?></td>
                <td><?php echo $c["reprobados"]; ?></td>
                <td><?php echo $porcentaje; ?>%</td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<h3>Aprovechamiento por Grupo (Ing. en Sistemas)</h3>
<table>
    <thead>
        <tr>
            <th>Grupo</th>
            <th>Semestre</th>
            <th>Alumnos</th>
            <th>Promedio</th>
            <th>% Aprobación</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($por_grupo as $g) { ?>
            <tr>
                <td><?php echo $g["grupo"]; ?></td>
                <td><?php echo $g["semestre"]; ?></td>
                <td><?php echo $g["alumnos"]; ?></td>
                <td><?php echo $g["promedio"]; ?></td>
                <td><?php echo $g["aprobacion"]; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<h3>Comparativo por Nivel Académico</h3>
<table>
    <thead>
        <tr>
            <th>Indicador</th>
            <th>Licenciatura</th>
            <th>Maestría</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($comparativo as $c) { ?>
            <tr>
                <td><?php echo $c["indicador"]; ?></td>
                <td><?php echo $c["lic"]; ?></td>
                <td><?php echo $c["mtria"]; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include "footer.php"; ?>
