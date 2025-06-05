// Función que desbloquea y muestra un espacio para añadiir la nueva temática
function mostrarOtraTematica(select) {
    const campoOtra = document.getElementById('otra-tematica-campo');
    campoOtra.style.display = select.value === 'otra' ? 'block' : 'none';
}