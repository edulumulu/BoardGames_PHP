<?php 
include 'php/db.php'; 

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