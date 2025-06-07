//listenerTabla.js

document.querySelectorAll('.fila-juego').forEach(fila => {
    fila.addEventListener('click', () => {
        const nombre = fila.dataset.nombre;
        window.location.href = `php/detalleJuego.php?nombre=${encodeURIComponent(nombre)}`;
    });
    });