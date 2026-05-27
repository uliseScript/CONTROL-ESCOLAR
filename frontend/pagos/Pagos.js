document.getElementById("formPago").addEventListener("submit", function(e) {
    e.preventDefault();
    const datos = {
        matricula: document.getElementById("matricula").value,
        concepto: document.getElementById("concepto").value,
        monto: document.getElementById("monto").value,
        fecha_pago: document.getElementById("fecha_pago").value,
        status: document.getElementById("status").value
    };
    fetch("../../backend/pagos/Pagos.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(datos)
    })
    .then(res => res.json())
    .then(data => { document.getElementById("mensaje").textContent = data.mensaje; })
    .catch(() => { document.getElementById("mensaje").textContent = "Error al conectar con el servidor"; });
});
