<?php
include 'db.php';

function html_datos_fallidos($frase){
?>
<!DOCTYPE html>
        <html>
            <head>
                <title>Error en datos </title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" type="text/css" href="../css/formularios.css">
            </head>
            <body>
                <h1><?php echo $frase; ?></h1>
                <div>
                    <input type="button" value="Regresar" onclick="history.back()">
                </div>
                <!--<form action="../html/formInsertarJuego.html" method="post">
                    <input type="submit" value="Regresar">
                </form>-->

            </body>
        </html>
<?php


}

$nom = $_POST['nom'] ?? '';
$disen = $_POST['disen'] ?? '';
$ano = $_POST['ano'] ?? '';
$maxJug = $_POST['maxJug'] ?? '';
$minJug = $_POST['minJug'] ?? '';
$dur = $_POST['dur'] ?? '';
$tem = $_POST['tematica'] ?? '';
$otraTem = $_POST['otra_temati'] ?? '';
$dif = $_POST['dif'] ?? '';
$sue = $_POST['sue'] ?? '';
$inte = $_POST['inte'] ?? '';
$dueno = $_POST['dueno'] ?? '';
$es_expansion = $_POST['es_expansion'] ?? '';
$base = $_POST['base'] ?? '';

$datos =[$nom, $disen, $ano, $maxJug, $minJug, $dur ];

print_r($datos);

foreach($datos as $d){
    if(strcmp($d, '')== 0){   

        html_datos_fallidos("Debes rellenar todos los campos del formulario");
        
         exit();
    }

}

$stm = $conn->prepare("SELECT * FROM juegos WHERE nombre = ?");
$stm->bind_param("s", $nom);
$stm->execute();

$result = $stm->get_result(); // requiere mysqlnd
if ($result->num_rows > 0) {
    html_datos_fallidos("El juego ya existe en la base de datos");
    exit();
}


