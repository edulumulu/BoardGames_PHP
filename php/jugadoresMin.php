<?php

include 'selectAll.php'; 

                    for ($i = 1; $i <= 15; $i++) {
                        $selected = (isset($_GET['jugMin']) && $_GET['jugMin'] == $i) ? 'selected' : '';
                        echo "<option value='$i' $selected>$i</option>";
                    }
                    // Opción +15
                    $selected = (isset($_GET['jugMin']) && $_GET['jugMin'] == 16) ? 'selected' : '';
                    echo "<option value='16' $selected>15+</option>";
                    ?>