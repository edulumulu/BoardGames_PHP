// Hace visible un desplegable con los posibles juegos base
function mostrarJuegoBase(select) {
    const contenedor = document.getElementById('juego-base-container');
    if (select.value === 'si') {
        contenedor.style.display = 'block';
    } else {
        contenedor.style.display = 'none';
        document.getElementById('juego_base').value = '';
    }
}