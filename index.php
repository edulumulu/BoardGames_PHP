<?php include 'php/db.php'; ?>
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
            <button onclick="location.href='insertar.php'">Insertar Juego</button>
            <button onclick="location.href='eliminar.php'">Eliminar Juego</button>
        </div>

        <!-- Lado Central -->
        <div class="lado-central">
            <!-- Filtros de Búsqueda -->
            <form method="GET" class="form-filtros">
                <input type="text" name="nombre" placeholder="Nombre">
                <select name="tematica">
                    <option value="">Temática</option>
                    <option value="Estrategia">Estrategia</option>
                    <option value="Familiar">Familiar</option>
                    <option value="Party">Party</option>
                    <!-- Agrega más temáticas -->
                </select>
                <select name="dificultad">
                    <option value="">Dificultad</option>
                    <option value="1">Fácil</option>
                    <option value="2">Media</option>
                    <option value="3">Difícil</option>
                </select>
                <input type="number" name="jugMin" placeholder="Jugadores (mín)">
                <input type="number" name="jugMax" placeholder="Jugadores (máx)">
                <input type="number" name="durMin" placeholder="Duración min">
                <input type="number" name="durMax" placeholder="Duración max">
                <button type="submit">Buscar</button>
            </form>

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
</body>
</html>
