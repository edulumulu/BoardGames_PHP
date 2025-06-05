<?php 
include 'php/db.php'; 

$tematicas = [];
$resultTematicas = $conn->query("SELECT DISTINCT tematica FROM Juegos ORDER BY tematica");

if ($resultTematicas && $resultTematicas->num_rows > 0) {
    while ($row = $resultTematicas->fetch_assoc()) {
        if (!empty($row['tematica'])) {
            $tematicas[] = $row['tematica'];
        }
    }
}