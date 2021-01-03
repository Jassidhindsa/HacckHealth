<?php

    if(isset($_POST['subm'])) {
        $l1 = $_POST['lats'];
        $l2 = $_POST['longs'];

        header("Location: FNP.php?lat=$l1&long=$l2");
    }
?>