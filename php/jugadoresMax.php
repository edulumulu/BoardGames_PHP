<?php
include 'selectAll.php';
                    for ($i = 1; $i <= 15; $i++) {
                        $selected = (isset($_GET['jugMax']) && $_GET['jugMax'] == $i) ? 'selected' : '';
                        echo "<option value='$i' $selected>$i</option>";
                    }
                    $selected = (isset($_GET['jugMax']) && $_GET['jugMax'] == 16) ? 'selected' : '';
                    echo "<option value='16' $selected>15+</option>";
                    ?>