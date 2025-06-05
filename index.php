<?php include 'php/db.php'; 

$sql = "SELECT dueno, COUNT(*) AS cantidad FROM Juegos GROUP BY dueno";
$result = $conn->query($sql);

$duenos = [];
$cantidades = [];

while ($row = $result->fetch_assoc()) {
    $duenos[] = $row['dueno'];
    $cantidades[] = $row['cantidad'];
}

// Convertimos a JSON para usarlos en JavaScript
$duenos_json = json_encode($duenos);
$cantidades_json = json_encode($cantidades);

$tematicas = [];
$resultTematicas = $conn->query("SELECT DISTINCT tematica FROM Juegos ORDER BY tematica");

if ($resultTematicas && $resultTematicas->num_rows > 0) {
    while ($row = $resultTematicas->fetch_assoc()) {
        if (!empty($row['tematica'])) {
            $tematicas[] = $row['tematica'];
        }
    }
}
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
                <button onclick="location.href='insertar.php'">Insertar Juego</button>
                <button onclick="location.href='eliminar.php'">Eliminar Juego</button>
            </div>
            <div class="grafico-juegos">
                <canvas id="graficoJuegos"></canvas>
            </div>

        </div>

        <!-- Lado Central -->
        <div class="lado-central">
            <!-- Filtros de Búsqueda -->
            <form method="GET" class="form-filtros" id="formFiltros">
            <input type="text" name="nombre" placeholder="Nombre" value="<?= isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : '' ?>">
                <select name="tematica" onchange="this.form.submit()">
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
                    <option value="1" <?= (isset($_GET['dificultad']) && $_GET['dificultad'] == '2') ? 'selected' : '' ?>>Fácil</option>
                    <option value="2" <?= (isset($_GET['dificultad']) && $_GET['dificultad'] == '3') ? 'selected' : '' ?>>Media</option>
                    <option value="3" <?= (isset($_GET['dificultad']) && $_GET['dificultad'] == '4') ? 'selected' : '' ?>>Difícil</option>
                    <option value="3" <?= (isset($_GET['dificultad']) && $_GET['dificultad'] == '5') ? 'selected' : '' ?>>Muy difícil</option>
                </select>
                    <input type="number" name="jugMin" placeholder="Jugadores (mín)" value="<?= isset($_GET['jugMin']) ? $_GET['jugMin'] : '' ?>">
                    <input type="number" name="jugMax" placeholder="Jugadores (máx)" value="<?= isset($_GET['jugMax']) ? $_GET['jugMax'] : '' ?>">
                    <input type="number" name="durMin" placeholder="Duración min" value="<?= isset($_GET['durMin']) ? $_GET['durMin'] : '' ?>">
                    <input type="number" name="durMax" placeholder="Duración max" value="<?= isset($_GET['durMax']) ? $_GET['durMax'] : '' ?>">       
            </form>
            <div class="centrar-boton">
                <button type="button" onclick="window.location.href='index.php'" class="boton-limpiar">
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
                    <tbody>
                        <?php
                        // Armado dinámico de la consulta con filtros
                        $sql = "SELECT nombre, año, duracion, tematica, expansion, expansionDe, imagen FROM Juegos WHERE 1=1";

                        if (!empty($_GET['nombre'])) {
                            $nombre = $conn->real_escape_string($_GET['nombre']);
                            $sql .= " AND nombre LIKE '%$nombre%'";
                        }
                        if (!empty($_GET['tematica'])) {
                            $tematica = $conn->real_escape_string($_GET['tematica']);
                            $sql .= " AND tematica = '$tematica'";
                        }
                        if (!empty($_GET['dificultad'])) {
                            $dificultad = (int) $_GET['dificultad'];
                            $sql .= " AND dificultad = $dificultad";
                        }
                        if (!empty($_GET['jugMin'])) {
                            $jugMin = (int) $_GET['jugMin'];
                            $sql .= " AND numJugMin <= $jugMin";
                        }
                        if (!empty($_GET['jugMax'])) {
                            $jugMax = (int) $_GET['jugMax'];
                            $sql .= " AND numJugMax >= $jugMax";
                        }
                        if (!empty($_GET['durMin'])) {
                            $durMin = (int) $_GET['durMin'];
                            $sql .= " AND duracion >= $durMin";
                        }
                        if (!empty($_GET['durMax'])) {
                            $durMax = (int) $_GET['durMax'];
                            $sql .= " AND duracion <= $durMax";
                        }

                        $result = $conn->query($sql);
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>{$row['nombre']}</td>";
                                echo "<td>{$row['año']}</td>";
                                echo "<td>{$row['duracion']} min</td>";
                                echo "<td>{$row['tematica']}</td>";
                                echo "<td>" . ($row['expansion'] ? 'Sí' : 'No') . "</td>";
                                echo "<td>" . ($row['expansion'] ? $row['expansionDe'] : '-') . "</td>";
                                echo "<td><div class='imagen-placeholder'>IMG</div></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No se encontraron juegos.</td></tr>";
                        }
                        ?>
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

<script>
  // Traemos los datos desde PHP
  const duenos = <?php echo $duenos_json; ?>;
  const cantidades = <?php echo $cantidades_json; ?>;

  const ctx = document.getElementById('graficoJuegos').getContext('2d');
  const grafico = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: duenos,
      datasets: [{
        label: 'Cantidad',
        data: cantidades,
        backgroundColor: ['#4e79a7', '#f28e2b', '#e15759', '#76b7b2', '#59a14f']
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false },
        title: {
          display: true,
          text: 'Juegos por dueño',
          font: {
          size: 20  // Tamaño del título
        }
        }
      },
      scales: {
        y: { beginAtZero: true, ticks: { stepSize: 1 } }
      }
    }
  });
</script>
<script>
    document.querySelectorAll('#formFiltros input, #formFiltros select').forEach(input => {
        input.addEventListener('input', () => {
            document.getElementById('formFiltros').submit();
        });
    });
</script>



</body>
</html>
