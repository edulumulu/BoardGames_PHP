<?php include '../php/db.php';
include '../php/selectTematicas.php'; 
include '../php/selectDueno.php'; 
include '../php/selectJuegosBase.php'; 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Insertar juego</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/formularios.css">
    </head>
    <body>
        <h1>Escribe los datos del juego</h1>

        <form action="../php/insertarJuego.php" method="post" enctype="multipart/form-data">
            <p>Nombre: <input type="text" name="nom"></p>
            <p>Diseñador: <input type="text" name="disen"></p>
            <p>Año:</p>
            <select name="ano">
                <option value=""></option>
                <?php
                    $currentYear = date('Y');
                    for($i = 1980 ; $i <= $currentYear ; $i++){
                        echo "<option value=\"$i\">$i</option>";
                    }
                    ?>
            </select>
        
            <p>Número máximo de jugadores: </p>
            <select name="maxJug">
                <option value=""></option>
                <?php  for($i = 1 ; $i <= 21 ; $i++){  echo "<option value=\"$i\">$i</option>"; } ?>
            </select>
            <p>Número mínimo de jugadores: </p>
            <select name="minJug">
                <option value=""></option>
                <?php  for($i = 1 ; $i <= 21 ; $i++){  echo "<option value=\"$i\">$i</option>"; } ?>
            </select>
            
            
            <p>Duración: </p>
            <select name="dur">
                <option value=""></option>
                <?php  for($i = 5 ; $i <= 240 ; $i+=5){  echo "<option value=\"$i\">$i</option>"; } ?>
            </select>
           
            <div class="inline-label-select">
                <label for="tem">Temática:</label>
                <select name="tematica" id="tematica" onchange="mostrarOtraTematica(this)">
                <?php 
                foreach ($tematicas as $tema): ?>
                        <option value="<?= htmlspecialchars($tema) ?>" <?= (isset($_GET['tematica']) && $_GET['tematica'] == $tema) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($tema) ?>
                        </option>
                    <?php endforeach; ?>
                <option value="otra">Otra</option>
            </select>
            </div>

            <div class="inline-label-select"  id="otra-tematica-campo" style="display: none;">
                <label for="ntem">Especifica nueva temática:</label>
                <input type="text" name="otra_tematica">
             </div>

            <div class="inline-label-select">
                <label for="dif">Dificultad:</label>
                <select name="dif" id="dif">
                    <?php  
                        for($i = 1 ; $i <= 5 ; $i++){  
                            echo "<option value=\"$i\">$i</option>"; 
                        } 
                    ?>
                </select>
            </div>
            <div class="inline-label-select">
                <label for="dif">Estrategia:</label>
                <select name="est" id="est">
                    <?php for($i = 1 ; $i <= 5 ; $i++){  echo "<option value=\"$i\">$i</option>";  }  ?>
                </select>
            </div>
            
            <div class="inline-label-select">
                <label for="dif">Suerte:    </label>
                <select name="sue" id="sue">
                    <?php for($i = 1 ; $i <= 5 ; $i++){  echo "<option value=\"$i\">$i</option>";  }  ?>
                </select>
            </div>
            <div class="inline-label-select">
                <label for="dif">Interacción:</label>
                <select name="inte" id="inte">
                    <?php for($i = 1 ; $i <= 5 ; $i++){  echo "<option value=\"$i\">$i</option>";  }  ?>
                </select>
            </div>
            
            <div class="inline-label-select">
                <label for="dif">Dueño:</label>
                <select name="dueno" id="dueno">
                <?php 
                foreach ($duenos as $d): ?>
                        <option value="<?= htmlspecialchars($d) ?>" <?= (isset($_GET['dueno']) && $_GET['dueno'] == $d) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($d) ?>
                        </option>
                    <?php endforeach; ?>
            </select>
            </div>

            <div class="inline-label-select">
                <label for="dif">Es una expansión:</label>
                <select name="es_expansion" id="es_expansion" onchange="mostrarJuegoBase(this)">
                    <option value="no">No</option>
                    <option value="si">Si</option>
                </select>
            </div>

            <div class="inline-label-select">
                <label for="dif">Juego base:</label>
                <select name="base" id="juego-base-container" style="display:none;">
                <?php 
                foreach ($juegosNoEx as $j): ?>
                        <option value="<?= htmlspecialchars($j) ?>" <?= (isset($_GET['nombre']) && $_GET['nombre'] == $d) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($j) ?>
                        </option>
                    <?php endforeach; ?>
            </select>
            </div>
            <p>Descripción: </p>
            <textarea name="desc" style="width: 100%; height: 100px;"></textarea>

            <p>Foto:
                <input type="file" name="foto" accept="image/*">
            </p>
        
        <input type="submit" value="Aceptar">
        </form>

        <script src="../js/mostrarOtraTematica.js"></script> 

        <script src="../js/mostrarJuegoBase.js"> </script>
       

    </body>
</html>

