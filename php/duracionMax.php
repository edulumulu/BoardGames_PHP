<?php

include 'selectAll.php'; 

for ($i = 5; $i <= 150; $i += 5) {
                        $selected = (isset($_GET['durMax']) && $_GET['durMax'] == $i) ? 'selected' : '';
                        echo "<option value='$i' $selected>$i min</option>";
                    }