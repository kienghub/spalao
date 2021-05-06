<?php
include '../../../connection.php';
    @$id = $_GET['id'];
    @$qty = $_GET['qty'];
    @$bring_equiment_id = $_GET['bring_equiment_id'];
    $query = "DELETE FROM spa_bring_equiment WHERE bring_id='$id'";
    if (mysqli_query($con, $query)) {
        $_SQL($con,"UPDATE spa_estock SET est_qty=est_qty+'$qty' Where est_equiment='$bring_equiment_id'");
        echo 200;
    } else {
        echo 400;
    }
?>