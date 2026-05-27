document.getElementById("formEvaluacion").addEventListener("submit", function(e) {
    e.preventDefault();
    const datos = {
        matricula: document.getElementById("matricula").value,
        profesor_id: document.getElementById("profesor_id").value,
        puntaje: document.getElementById("puntaje").value,
        comentario: document.getElementById("comentario").value,
        fecha_evaluacion: document.getElementById("fecha_evaluacion").value
    };
    fetch("../../backend/evaluacion-profesores/EvaluacionProfesores.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(datos)
    })
    .then(res => res.json())
    .then(data => { document.getElementById("mensaje").textContent = data.mensaje; })
    .catch(() => { document.getElementById("mensaje").textContent = "Error al conectar con el servidor"; });
});
