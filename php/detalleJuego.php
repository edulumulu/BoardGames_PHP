<?php

include 'db.php';

$nomJuego = $_GET['nombre'] ?? null;
$juego = null;

if ($nomJuego) {
    $stmt = $conn->prepare("SELECT * FROM juegos WHERE nombre = ?");
    $stmt->bind_param("s", $nomJuego);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $juego = $resultado->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Juego</title>
    <link rel="stylesheet" href="../css/ficha_juego.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="fondo-transparente" style="background-image: url('http://localhost/fotos/<?= htmlspecialchars($juego['imagen']) ?>');"></div>

    <div class="contenedor">
        <?php if ($juego): ?>
            
            <div class="detalle-juego">
                <h1 class="titulo-juego"><?= htmlspecialchars($juego['nombre']) ?></h1>

                <div class="contenido-juego">
                    <div class="info">

                        <section class="descripcion">
                            <h2>Descripción</h2>
                            <p><?= nl2br(htmlspecialchars($juego['descripcion'])) ?></p>
                        </section>

                        <div class="datos-basicos">
                            <div class="dato"><strong>🎨 Diseñador:</strong> <?= htmlspecialchars($juego['disenador']) ?></div>
                            <div class="dato"><strong>👥 Jugadores:</strong> entre <?= htmlspecialchars($juego['numJugMin']) ?> y <?= htmlspecialchars($juego['numJugMax']) ?></div>
                            <div class="dato"><strong>🧑‍💼 Dueño:</strong> <?= htmlspecialchars($juego['dueno']) ?></div>
                            <div class="dato"><strong>📅 Año:</strong> <?= htmlspecialchars($juego['año']) ?></div>
                            <div class="dato"><strong>⏱️ Duración:</strong> <?= htmlspecialchars($juego['duracion']) ?> min</div>
                            <div class="dato"><strong>🏷️ Temática:</strong> <?= htmlspecialchars($juego['tematica']) ?></div>
                            <div class="dato"><strong>🧩 Expansión:</strong> <?= $juego['expansion'] ? 'Sí' : 'No' ?></div>
                            <?php if ($juego['expansion'] && !empty($juego['expansionDe'])): ?>
                                <div class="dato expansion-de">
                                    <strong>🔗 Juego base:</strong> 
                                    <?php
                                     $nombreBase = trim($juego['expansionDe']); // Elimina espacios en los extremos
                                     $dir = 'detalleJuego.php?nombre=' . urlencode($nombreBase);
                                    ?>
                                    <a href="<?= $dir ?>">
                                        <?= htmlspecialchars($juego['expansionDe']) ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                        </div>
                        <?php
                            $listaExpansiones = $juego['listaExpansiones'];
                            $expansionesTabla = [];

                            if (!empty($listaExpansiones)) {
                                $expansionesTabla = json_decode($listaExpansiones);
                                if (!$expansionesTabla) {
                                    // fallback si no es JSON válido
                                    $expansionesTabla = explode(",", trim($listaExpansiones, "[]"));
                                }
                            }
                            ?>
                            <?php if (!empty($expansionesTabla)): ?>
                            <section class="tabla-expansiones">
                                <h2>Expansiones disponibles</h2>
                                <div class="tabla-scroll">
                                    <table>
                                        
                                        <tbody>
                                        <?php 
                                            $contador = 1;
                                            foreach ($expansionesTabla as $exp): 
                                                $nombreLimpio = trim($exp); // Elimina espacios en los extremos
                                                $url = 'detalleJuego.php?nombre=' . urlencode($nombreLimpio);
                                            ?>
                                                <tr>
                                                    <td><?= $contador ?></td>
                                                    <td>
                                                        <a href="<?= $url ?>" class="enlace-expansion">
                                                            <?= htmlspecialchars($nombreLimpio) ?>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php 
                                                $contador++;
                                            endforeach;
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </section>
<?php endif; ?>


                        
                    </div>

                    <div class="imagen">
                        <img src="http://localhost/fotos/<?= htmlspecialchars($juego['imagen']) ?>" alt="Imagen del juego">
                    </div>
                </div>
            </div>


            <div class="grafico">
                <h2>Características del juego</h2>
                <canvas id="graficoCaracteristicas"></canvas>
            </div>

            <div class="volver">
                <a href="../index.php">Volver al catálogo</a>
            </div>

<script>
    const ctx = document.getElementById('graficoCaracteristicas').getContext('2d');
    const grafico = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Dificultad', 'Estrategia', 'Suerte', 'Interacción'],
            datasets: [{
                label: 'Valor (1 a 5)',
                data: [
                    <?= $juego['dificultad'] ?? 0 ?>,
                    <?= $juego['estrategia'] ?? 0 ?>,
                    <?= $juego['suerte'] ?? 0 ?>,
                    <?= $juego['interaccion'] ?? 0 ?>
                ],
                backgroundColor: ['#4e79a7', '#f28e2b', '#e15759', '#76b7b2']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Características del juego',
                    font: { size: 20 }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 5,
                    ticks: { stepSize: 1 }
                }
            }
        }
    });
</script>

        <?php else: ?>
            <p>Juego no encontrado.</p>
        <?php endif; ?>
    </div>
</body>
</html>




