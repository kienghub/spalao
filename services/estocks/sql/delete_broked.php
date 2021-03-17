<?php
include '../../../connection.php';
    @$id = $_GET['id'];
    @$qty = $_GET['qty'];
    @$ere_equiment_id = $_GET['ere_equiment_id'];
    $query = "DELETE FROM quick_oder_broked WHERE bk_id='$id'";
    if (mysqli_query($con, $query)) {
        $_SQL($con,"UPDATE spa_estock SET est_qty=est_qty+'$qty' Where est_equiment='$ere_equiment_id'");
        echo 7070;
    } else {
        echo 4466;
    }
?>