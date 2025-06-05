<?php

/*try {
    $pdo = new PDO("mysql:host=127.0.0.1;port=3308;dbname=JuegosDeMesaBBDD", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "conectado";
} catch (PDOException $e) {
    die("ERROR DE CONEXIÓN: " . $e->getMessage());
}

<?php*/
$host = '127.0.0.1';
$db = 'JuegosDeMesaBBDD';
$user = 'root';
$pass = '';
$port = 3308;

    $conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}else{
  
}

