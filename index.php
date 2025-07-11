<?php 
include 'php/db.php'; 
include 'php/juegosDianaEdu.php'; 
include 'php/selectTematicas.php'; 
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Juegos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Catálogo de Juegos de Mesa</h1>

    <div class="contenedor">
        <!-- Lado Izquierdo -->
        <div class="lado-izquierdo">
            <div class="menu-botones">
                <button onclick="location.href='html/login.html'">Insertar Juego</button>
                <button onclick="location.href='eliminar.php'">Eliminar Juego</button>
            </div>
            <div class="grafico-juegos">
                <canvas id="graficoJuegos"></canvas>
            </div>

        </div>

        <!-- Lado Central -->
        <div class="lado-central">
            <!-- Filtros de Búsqueda -->
            <form method="GET" class="form-filtros" id="formFiltros" onsubmit="return false;">

            <div class="filtros-fila">
            <input type="text" name="nombre" placeholder="Nombre" value="<?= isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : '' ?>">
                <select name="tematica">
                    <option value="">Temática</option>
                    <?php foreach ($tematicas as $tema): ?>
                        <option value="<?= htmlspecialchars($tema) ?>" <?= (isset($_GET['tematica']) && $_GET['tematica'] == $tema) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($tema) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <select name="dificultad">
                    <option value="">Dificultad</option>
                    <option value="1" <?= (isset($_GET['dificultad']) && $_GET['dificultad'] == '1') ? 'selected' : '' ?>>Muy fácil</option>
                    <option value="2" <?= (isset($_GET['dificultad']) && $_GET['dificultad'] == '2') ? 'selected' : '' ?>>Fácil</option>
                    <option value="3" <?= (isset($_GET['dificultad']) && $_GET['dificultad'] == '3') ? 'selected' : '' ?>>Media</option>
                    <option value="4" <?= (isset($_GET['dificultad']) && $_GET['dificultad'] == '4') ? 'selected' : '' ?>>Difícil</option>
                    <option value="5" <?= (isset($_GET['dificultad']) && $_GET['dificultad'] == '5') ? 'selected' : '' ?>>Muy difícil</option>
                </select>
                </div>
                <div class="filtros-fila">
                    <select name="jugMin">
                        <option value="">Jugadores (mín)</option>
                        <?php   include 'php/jugadoresMin.php';?>
                    </select>

                    <select name="jugMax">
                        <option value="">Jugadores (máx)</option>
                        <?php  include 'php/jugadoresMax.php'; ?>
                    </select>
                    
                    <select name="durMin">
                        <option value="">Duración min</option>
                        <?php include 'php/duracionMin.php'?>
                    </select>

                    <select name="durMax">
                        <option value="">Duración max</option>
                        <?php include 'php/duracionMax.php'?>
                    </select>
                    
                    <?php $currentYear = date('Y'); ?>

                    <select name="anioMin">
                        <option value="">Año desde</option>
                        <?php include 'php/anoMin.php' ?>
                    </select>

                    <select name="anioMax">
                        <option value="">Año hasta</option>
                        <?php include 'php/anoMax.php'?>
                    </select>

                </div>
            </form>
            <div class="centrar-boton">
                <button type="button" id="btn-limpiar-filtros" class="boton-limpiar">
                    Limpiar filtros
                </button>
            </div>


            <!-- Tabla de Resultados -->
            <div class="tabla-contenedor">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Año</th>
                            <th>Duración</th>
                            <th>Temática</th>
                            <th>¿Expansión?</th>
                            <th>Expansión de</th>
                            <th>Imagen</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-juegos">
                        <?php include "php/tablaJuegos.php"; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="lado-derecho-imagenes">
            <img src="img/1.JPG" alt="Imagen 1">
            <img src="img/2.JPG" alt="Imagen 2">
            <img src="img/3.JPG" alt="Imagen 3">
        </div>
    </div>

    <!-- Cargar Chart.js desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <!-- Cargar jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Incluye el script externo que usa esos datos -->
    <script src="js/graficoJuegos.js"></script>

    <!-- Define los datos en una etiqueta <script> inline -->
    <script>
        const duenos = <?= $duenos_json ?>;
        const cantidades = <?= $cantidades_json ?>;
        crearGraficoJuegos(duenos, cantidades);
    </script>

    <!-- Script listener tabla -->
    <script>
        $(document).on('click', '.fila-juego', function () {
            const nombre = $(this).data('nombre');
            window.location.href = `php/detalleJuego.php?nombre=${encodeURIComponent(nombre)}`;
        });

    </script>

    <!-- Scripts para recargar tabla con AJAX -->
    <script>
    const form = document.getElementById("formFiltros");
    const tabla = document.getElementById("tabla-juegos");
    </script>

    <script src="js/cargarTablaAJAX.js"></script>

    <script>
    $(document).ready(function () {
    $('#btn-limpiar-filtros').on('click', function (e) {
        e.preventDefault();

        // 1. Limpiar los filtros
        $('#formFiltros')[0].reset(); 

        // 2. Cargar la tabla sin filtros
        $.ajax({
            url: 'php/tablaJuegos.php',
            method: 'GET',
            success: function (response) {
                $('#tabla-juegos').html(response);
            },
            error: function () {
                alert("Hubo un error al recargar la tabla.");
            }
        });
    });
});
</script>


    
</body>
</html>
