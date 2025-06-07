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
                    <h1>Juego <?php  echo $j; ?> agregado correctamente</h1>
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
$otraTem = $_POST['otra_tematica'] ?? '';
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
//echo PHP_EOL . $tem . PHP_EOL;
if(strcasecmp($tem, "Otra") == 0){
    if(strcasecmp($otraTem, '') == 0){
        html_datos_fallidos("Debes rellenar el campo de nueva temática antes de continuar");
        exit();
    }
    $tem = $otraTem;
    //echo PHP_EOL . $tem . PHP_EOL;
}


// Ruta absoluta para carpeta "fotos"
$uploadDir = realpath(__DIR__ . '/../../fotos') . '/';
if ($uploadDir === false) {
   // echo "ERROR: La carpeta fotos no existe o la ruta es inválida.<br>";
    exit();
}
//echo "DEBUG: Ruta absoluta de uploadDir: " . $uploadDir . "<br>";

// Verificar que la carpeta existe o crearla
if (!is_dir($uploadDir)) {
    //echo "DEBUG: La carpeta 'fotos' no existe. Intentando crearla...<br>";
    if (mkdir($uploadDir, 0755, true)) {
       // echo "DEBUG: Carpeta 'fotos' creada correctamente.<br>";
    } else {
        //echo "ERROR: No se pudo crear la carpeta para subir imágenes.<br>";
        exit("ERROR: No se pudo crear la carpeta para subir imágenes.");
    }
}

$fotoNombre = '';

if (!empty($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $tmpPath = $_FILES['foto']['tmp_name'];
    $originalName = $_FILES['foto']['name'];
    $originalBase = basename($originalName);

    //echo "DEBUG: Archivo temporal: " . $tmpPath . "<br>";
    //echo "DEBUG: Nombre original: " . $originalName . "<br>";

    $ext = strtolower(pathinfo($originalBase, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($ext, $allowed)) {
       // echo "ERROR: Tipo de imagen no permitido: " . $ext . "<br>";
        html_datos_fallidos("Tipo de imagen no permitido. Solo JPG, PNG o GIF.");
        exit();
    }

    $fotoNombre = $originalBase;
    $destPath = $uploadDir . $fotoNombre;

    echo "DEBUG: Ruta destino para mover archivo: " . $destPath . "<br>";

    if (!move_uploaded_file($tmpPath, $destPath)) {
        //echo "ERROR: Hubo un error al mover el archivo.<br>";
        html_datos_fallidos("Hubo un error al guardar la imagen.");
        exit();
    } else {
        //echo "DEBUG: Imagen movida correctamente.<br>";
    }
} else {
    //echo "DEBUG: No se ha subido ningún archivo o hay error en la subida.<br>";
}










if (strcasecmp($es_expansion, 'no') == 0) {
    $loes = 0;
    $insertar = $conn->prepare("
        INSERT INTO juegos 
          (nombre, disenador, año, numJugMax, numJugMin, duracion, 
           tematica, dificultad, estrategia, suerte, interaccion, dueno, expansion, descripcion, imagen) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $insertar->bind_param(
        "ssiiiisiiiisiss", 
        $nom, $disen, $ano, $maxJug, $minJug, $dur, 
        $tem, $dif, $estra, $sue, $inte, $dueno, $loes, $desc, $fotoNombre
    );
    $insertar->execute();

} else {
    $loes = 1;
    $insertar = $conn->prepare("
        INSERT INTO juegos 
          (nombre, disenador, año, numJugMax, numJugMin, duracion, 
           tematica, dificultad, estrategia, suerte, interaccion, dueno, 
           expansion, expansionDe, descripcion, imagen) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $insertar->bind_param(
        "ssiiiisiiiisisss", 
        $nom, $disen, $ano, $maxJug, $minJug, $dur, 
        $tem, $dif, $estra, $sue, $inte, $dueno, $loes, $base, $desc, $fotoNombre
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



