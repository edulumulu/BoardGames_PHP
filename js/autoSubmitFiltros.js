// autoSubmitFiltros.js
// Script para autocompletar los filtros 

document.querySelectorAll('#formFiltros input, #formFiltros select').forEach(input => {
    input.addEventListener('input', () => {
        document.getElementById('formFiltros').submit();
    });
});
  