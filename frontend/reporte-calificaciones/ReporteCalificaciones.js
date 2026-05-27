document.getElementById("formReporte").addEventListener("submit", function(e) {
    e.preventDefault();
    const datos = {
        profesor_id: document.getElementById("profesor_id").value,
        materia: document.getElementById("materia").value
    };
    fetch("../../backend/reporte-calificaciones/ReporteCalificaciones.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(datos)
    })
    .then(res => res.json())
    .then(data => {
        if (data.registros && data.registros.length > 0) {
            const cuerpo = document.getElementById("cuerpoTabla");
            cuerpo.innerHTML = "";
            data.registros.forEach(r => {
                cuerpo.innerHTML += `<tr><td>${r.alumno_id}</td><td>${r.materia}</td><td>${r.parcial}</td><td>${r.calificacion}</td></tr>`;
            });
            document.getElementById("tabla").style.display = "table";
            document.getElementById("mensaje").textContent = "";
        } else {
            document.getElementById("mensaje").textContent = "No se encontraron registros";
        }
    })
    .catch(() => { document.getElementById("mensaje").textContent = "Error al conectar con el servidor"; });
});
