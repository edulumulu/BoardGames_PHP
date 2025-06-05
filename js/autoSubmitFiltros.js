// autoSubmitFiltros.js

document.querySelectorAll('#formFiltros input, #formFiltros select').forEach(input => {
    input.addEventListener('input', () => {
        document.getElementById('formFiltros').submit();
    });
});
  