<?php
include 'php/db.php'; 


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
                            $jugMin = (int)$_GET['jugMin'];
                            if ($jugMin == 16) {
                                $sql .= " AND numJugMin >= 15";
                            } else {
                                $sql .= " AND numJugMin >= $jugMin";
                            }
                        }
                        if (!empty($_GET['jugMax'])) {
                            $jugMax = (int)$_GET['jugMax'];
                            if ($jugMax == 16) {
                                $sql .= " AND numJugMax >= 15"; // o puedes ajustar según cómo tengas los datos
                            } else {
                                $sql .= " AND numJugMax <= $jugMax";
                            }
                        }
                        if (!empty($_GET['durMin'])) {
                            $durMin = (int) $_GET['durMin'];
                            $sql .= " AND duracion >= $durMin";
                        }
                        if (!empty($_GET['durMax'])) {
                            $durMax = (int) $_GET['durMax'];
                            $sql .= " AND duracion <= $durMax";
                        }
                        if (!empty($_GET['anioMin'])) {
                            $anioMin = (int)$_GET['anioMin'];
                            $sql .= " AND año >= $anioMin";
                        }
                        if (!empty($_GET['anioMax'])) {
                            $anioMax = (int)$_GET['anioMax'];
                            $sql .= " AND año <= $anioMax";
                        }
                        
                        $sql .= " ORDER BY nombre";
                        

                        $result = $conn->query($sql);
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr class='fila-juego' data-nombre='" . htmlspecialchars($row['nombre'], ENT_QUOTES) . "'>";

                                echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['año']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['duracion']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['tematica']) . "</td>";
                                echo "<td>" . ($row['expansion'] ? 'Sí' : 'No') . "</td>";
                                echo "<td>" . htmlspecialchars($row['expansionDe']) . "</td>";
                                if (!empty($row['imagen'])) {
                                    // Asegúrate de que 'imagen' tenga solo el nombre de archivo, no la ruta completa
                                    $rutaImagen = "http://localhost/fotos/" . htmlspecialchars($row['imagen']);
                                    echo "<td><img src='$rutaImagen' alt='Imagen de juego' style='width: 60px; height: auto;'></td>";
                                } else {
                                    echo "<td><div class='imagen-placeholder'>IMG</div></td>";
                                }
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No se encontraron juegos.</td></tr>";
                        }
                        ?>