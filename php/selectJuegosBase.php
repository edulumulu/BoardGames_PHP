<?php
include 'db.php';
$juegosNoEx = [];
$resultJuegos = $conn->query("SELECT nombre FROM juegos WHERE expansion = 0 ORDER BY nombre");

if($resultJuegos && $resultJuegos > 0){
    while ($row = $resultJuegos->fetch_assoc()) {
        if (!empty($row['nombre'])) {
            $juegosNoEx[] = $row['nombre'];
        }
    }
}