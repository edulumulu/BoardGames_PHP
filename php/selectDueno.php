<?php 
include 'php/db.php'; 

$duenos = [];
$resultduenos = $conn->query("SELECT DISTINCT dueno FROM Juegos ORDER BY dueno");

if ($resultduenos && $resultduenos->num_rows > 0) {
    while ($row = $resultduenos->fetch_assoc()) {
        if (!empty($row['dueno'])) {
            $duenos[] = $row['dueno'];
        }
    }
}