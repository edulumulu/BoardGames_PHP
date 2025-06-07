form.querySelectorAll("input, select").forEach(el => {
    el.addEventListener("input", () => actualizarTabla());
    el.addEventListener("change", () => actualizarTabla());
});

function actualizarTabla() {
    const formData = new FormData(form);
    const params = new URLSearchParams(formData).toString();

    fetch("php/tablaJuegos.php?" + params)
        .then(res => res.text())
        .then(html => {
            tabla.innerHTML = html;
        })
        .catch(err => console.error("Error al actualizar la tabla:", err));
}