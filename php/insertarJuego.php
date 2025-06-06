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


function inserccion_correcta($j){
    ?>
    <!DOCTYPE html>
            <html>
                <head>
                    <title>Juego ingredado </title>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" type="text/css" href="../css/formularios.css">
                </head>
                <body>
                    <h1>Juego <?php  echo $j; ?>agregado correctamente</h1>
                    <form action="../html/formInsertarJuego.php" method="post">
                        <input type="submit" value="Insertar otro juego">
                    </form>
                    <form action="../index.php" method="post">
                        <input type="submit" value="Aceptar">
                    </form>
    
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
$estra = $_POST['est'] ?? '';
$sue = $_POST['sue'] ?? '';
$inte = $_POST['inte'] ?? '';
$dueno = $_POST['dueno'] ?? '';
$es_expansion = $_POST['es_expansion'] ?? '';
$base = $_POST['base'] ?? '';
$desc = $_POST['desc'] ?? '';

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

if($minJug > $maxJug){
    html_datos_fallidos("El numero de jugadores máximo debe ser igual o mayor que el minimo");
    exit();
}

if($tem === 'Otra'){
    if(strcasecmp($otraTem, '') == 0){
        html_datos_fallidos("Debes rellenar el campo de nueva temática antes de continuar");
        exit();
    }
    $tem = $otraTem;
}

if (strcasecmp($es_expansion, 'no') == 0) {
    $loes = 0;
    $insertar = $conn->prepare("
        INSERT INTO juegos 
          (nombre, disenador, año, numJugMax, numJugMin, duracion, 
           tematica, dificultad, estrategia, suerte, interaccion, dueno, expansion, descripcion) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $insertar->bind_param(
        "ssiiiiiiiiisis", 
        $nom, $disen, $ano, $maxJug, $minJug, $dur, 
        $tem, $dif, $estra, $sue, $inte, $dueno, $loes, $desc
    );
    $insertar->execute();

} else {
    $loes = 1;
    $insertar = $conn->prepare("
        INSERT INTO juegos 
          (nombre, disenador, año, numJugMax, numJugMin, duracion, 
           tematica, dificultad, estrategia, suerte, interaccion, dueno, 
           expansion, expansionDe, descripcion) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $insertar->bind_param(
        "ssiiiiiiiiisiss", 
        $nom, $disen, $ano, $maxJug, $minJug, $dur, 
        $tem, $dif, $estra, $sue, $inte, $dueno, $loes, $base, $desc
    );
    $insertar->execute();

    // Revisa si la inserción se hizo bien
    if ($insertar->affected_rows > 0) {
        //echo "<p>DEBUG: valor de \$base = <strong>" . htmlspecialchars($base) . "</strong></p>";
    
        $seleccion = $conn->prepare("SELECT listaExpansiones FROM juegos WHERE nombre = ?");
        $seleccion->bind_param("s", $base);
        $seleccion->execute();
        $resultado = $seleccion->get_result();
    
        if ($resultado === false) {
            //echo "<p>DEBUG: get_result() devolvió FALSE. Error: " . htmlspecialchars($conn->error) . "</p>";
        } else {
            //echo "<p>DEBUG: número de filas encontradas en SELECT = " . $resultado->num_rows . "</p>";
        }
    
        if ($resultado && $resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $listaActual = $fila['listaExpansiones'];
    
            //echo "<pre>DEBUG: listaActual = " . var_export($listaActual, true) . "</pre>";
    
            if (is_null($listaActual) || trim($listaActual) === '') {
                $nuevaLista = "[$nom]";
                //echo "<p>DEBUG: listaActual vacía o NULL, nuevaLista = $nuevaLista</p>";
            } else {
                if (str_ends_with($listaActual, "]")) {
                    $listaActual = substr($listaActual, 0, -1);
                }
                $nuevaLista = $listaActual . ",\n" . $nom . "]";
                //echo "<p>DEBUG: listaActual no vacía, nuevaLista = $nuevaLista</p>";
            }
    
            $actualizar = $conn->prepare("UPDATE juegos SET listaExpansiones = ? WHERE nombre = ?");
            $actualizar->bind_param("ss", $nuevaLista, $base);
            $ok = $actualizar->execute();
    
            
            
        }
    }
    
}

inserccion_correcta($nom);



