<?php

include 'selectAll.php'; 

for ($year = 1980; $year <= $currentYear; $year++) {
    $selected = (isset($_GET['anioMin']) && $_GET['anioMin'] == $year) ? 'selected' : '';
    echo "<option value='$year' $selected>$year</option>";
}