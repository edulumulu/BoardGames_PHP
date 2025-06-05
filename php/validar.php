<?php

$user = $_POST['user'] ?? '';
$pass = $_POST['pass'] ?? '';

if(strcasecmp($user, "edu") == 0 && strcasecmp($pass, "edu") == 0){
    // Redirige a formulario_inserccion.php
    header("Location: ../html/formInsertarJuego.php");
    exit();
}else{
    ?>
    <!DOCTYPE html>
    <!DOCTYPE html>
<html>
    <head>
        <title>Confirmación de autentificación</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/formularios.css">
    </head>
    <body>
        <h1>Validación incorrecta</h1>
        <form action="../html/login.html" method="post">
        <input type="submit" value="Regresar">
        </form>
    </body>
</html>
<?php

}
