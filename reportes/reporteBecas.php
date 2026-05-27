<?php
$titulo = "Reportes de Becas";
$pagina_activa = "becas";
include "header.php";

$resumen_becas = [
    ["tipo" => "Académica", "beneficiarios" => 412, "lic" => 378, "mtria" => 34, "monto" => 2142400],
    ["tipo" => "Socioeconómica", "beneficiarios" => 298, "lic" => 289, "mtria" => 9, "monto" => 1430400],
    ["tipo" => "Deportiva", "beneficiarios" => 98, "lic" => 96, "mtria" => 2, "monto" => 343000],
    ["tipo" => "Cultural", "beneficiarios" => 55, "lic" => 52, "mtria" => 3, "monto" => 176000]
];

$beneficiarios = [
    ["matricula" => "20221456", "nombre" => "Vargas Ríos, Sofía", "carrera" => "Ing. en Sistemas", "tipo" => "Académica", "porcentaje" => "100%", "promedio" => 9.8],
    ["matricula" => "20231087", "nombre" => "Castillo Mendoza, Diego", "carrera" => "Lic. en Medicina", "tipo" => "Académica", "porcentaje" => "100%", "promedio" => 9.7],
    ["matricula" => "20220743", "nombre" => "Jiménez Pérez, Valeria", "carrera" => "Lic. en Derecho", "tipo" => "Socioeconómica", "porcentaje" => "75%", "promedio" => 9.2],
    ["matricula" => "20240389", "nombre" => "Aguilar Reyes, Emilio", "carrera" => "Lic. en Administración", "tipo" => "Deportiva", "porcentaje" => "50%", "promedio" => 8.7]
];
?>

<h2>Reportes de Becas</h2>

<form class="filtros" method="get">
    <label>Ciclo:</label>
    <select name="ciclo">
        <option>2026-1</option>
        <option>2025-2</option>
    </select>

    <label>Tipo de Beca:</label>
    <select name="tipo">
        <option>Todas</option>
        <option>Académica</option>
        <option>Socioeconómica</option>
        <option>Deportiva</option>
        <option>Cultural</option>
    </select>

    <label>Porcentaje:</label>
    <select name="porcentaje">
        <option>Todos</option>
        <option>100%</option>
        <option>75%</option>
        <option>50%</option>
        <option>25%</option>
    </select>

    <button type="submit" onclick="generarReporte()">Generar</button>
    <button type="button" onclick="exportarPDF()">PDF</button>
    <button type="button" onclick="exportarExcel()">Excel</button>
</form>

<h3>Resumen por Tipo de Beca</h3>
<table>
    <thead>
        <tr>
            <th>Tipo de Beca</th>
            <th>Beneficiarios</th>
            <th>Licenciatura</th>
            <th>Maestría</th>
            <th>Monto Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total_ben = 0;
        $total_monto = 0;
        foreach ($resumen_becas as $b) {
            $total_ben += $b["beneficiarios"];
            $total_monto += $b["monto"];
        ?>
            <tr>
                <td><?php echo $b["tipo"]; ?></td>
                <td><?php echo $b["beneficiarios"]; ?></td>
                <td><?php echo $b["lic"]; ?></td>
                <td><?php echo $b["mtria"]; ?></td>
                <td>$<?php echo number_format($b["monto"]); ?></td>
            </tr>
        <?php } ?>
        <tr>
            <th>TOTAL</th>
            <th><?php echo $total_ben; ?></th>
            <th>-</th>
            <th>-</th>
            <th>$<?php echo number_format($total_monto); ?></th>
        </tr>
    </tbody>
</table>

<h3>Lista de Beneficiarios</h3>
<table>
    <thead>
        <tr>
            <th>Matrícula</th>
            <th>Alumno</th>
            <th>Carrera</th>
            <th>Tipo</th>
            <th>%</th>
            <th>Promedio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($beneficiarios as $b) { ?>
            <tr>
                <td><?php echo $b["matricula"]; ?></td>
                <td><?php echo $b["nombre"]; ?></td>
                <td><?php echo $b["carrera"]; ?></td>
                <td><?php echo $b["tipo"]; ?></td>
                <td><?php echo $b["porcentaje"]; ?></td>
                <td><?php echo $b["promedio"]; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php include "footer.php"; ?>
