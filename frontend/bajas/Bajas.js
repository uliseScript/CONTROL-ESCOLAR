document.getElementById("formBaja").addEventListener("submit", function(e) {
    e.preventDefault();
    const datos = {
        matricula: document.getElementById("matricula").value,
        tipo: document.getElementById("tipo").value,
        motivo: document.getElementById("motivo").value,
        fecha_baja: document.getElementById("fecha_baja").value
    };
    fetch("../../backend/bajas/Bajas.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(datos)
    })
    .then(res => res.json())
    .then(data => { document.getElementById("mensaje").textContent = data.mensaje; })
    .catch(() => { document.getElementById("mensaje").textContent = "Error al conectar con el servidor"; });
});
