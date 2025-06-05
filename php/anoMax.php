<?php

include 'selectAll.php'; 

for ($year = 1980; $year <= $currentYear; $year++) {
    $selected = (isset($_GET['anioMax']) && $_GET['anioMax'] == $year) ? 'selected' : '';
    echo "<option value='$year' $selected>$year</option>";
}