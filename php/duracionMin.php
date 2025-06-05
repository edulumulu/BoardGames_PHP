<?php

include 'selectAll.php'; 

for ($i = 5; $i <= 150; $i += 5) {
    $selected = (isset($_GET['durMin']) && $_GET['durMin'] == $i) ? 'selected' : '';
    echo "<option value='$i' $selected>$i min</option>";
}