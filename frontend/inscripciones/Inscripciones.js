document.getElementById("formInscripcion").addEventListener("submit", function(e) {
    e.preventDefault();
    const datos = {
        nombre: document.getElementById("nombre").value,
        apellido_paterno: document.getElementById("apellido_paterno").value,
        apellido_materno: document.getElementById("apellido_materno").value,
        matricula: document.getElementById("matricula").value,
        carrera: document.getElementById("carrera").value,
        semestre: document.getElementById("semestre").value,
        email: document.getElementById("email").value,
        telefono: document.getElementById("telefono").value
    };
    fetch("../../backend/inscripciones/Inscripciones.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(datos)
    })
    .then(res => res.json())
    .then(data => { document.getElementById("mensaje").textContent = data.mensaje; })
    .catch(() => { document.getElementById("mensaje").textContent = "Error al conectar con el servidor"; });
});
