<?php

    if(isset($_POST['subm'])) {
        $l1 = $_POST['lat'];
        $l2 = $_POST['long'];

        header("Location: FNP.php?lat=$l1&long=$l2");
    }
?>