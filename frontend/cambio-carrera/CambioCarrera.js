document.getElementById("formCambio").addEventListener("submit", function(e) {
    e.preventDefault();
    const datos = {
        matricula: document.getElementById("matricula").value,
        carrera_anterior: document.getElementById("carrera_anterior").value,
        carrera_nueva: document.getElementById("carrera_nueva").value,
        motivo: document.getElementById("motivo").value,
        fecha_cambio: document.getElementById("fecha_cambio").value
    };
    fetch("../../backend/cambio-carrera/CambioCarrera.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(datos)
    })
    .then(res => res.json())
    .then(data => { document.getElementById("mensaje").textContent = data.mensaje; })
    .catch(() => { document.getElementById("mensaje").textContent = "Error al conectar con el servidor"; });
});
