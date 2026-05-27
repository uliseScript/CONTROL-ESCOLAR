document.getElementById("formAsistencia").addEventListener("submit", function(e) {
    e.preventDefault();
    const datos = {
        profesor_id: document.getElementById("profesor_id").value,
        alumno_id: document.getElementById("alumno_id").value,
        materia: document.getElementById("materia").value,
        fecha: document.getElementById("fecha").value,
        status: document.getElementById("status").value
    };
    fetch("../../backend/reporte-asistencias/ReporteAsistencias.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(datos)
    })
    .then(res => res.json())
    .then(data => { document.getElementById("mensaje").textContent = data.mensaje; })
    .catch(() => { document.getElementById("mensaje").textContent = "Error al conectar con el servidor"; });
});
