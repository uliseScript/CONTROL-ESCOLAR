document.getElementById("formReinscripcion").addEventListener("submit", function(e) {
    e.preventDefault();
    const datos = {
        matricula: document.getElementById("matricula").value,
        semestre: document.getElementById("semestre").value,
        fecha_reinscripcion: document.getElementById("fecha_reinscripcion").value
    };
    fetch("../../backend/reinscripciones/Reinscripciones.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(datos)
    })
    .then(res => res.json())
    .then(data => { document.getElementById("mensaje").textContent = data.mensaje; })
    .catch(() => { document.getElementById("mensaje").textContent = "Error al conectar con el servidor"; });
});
