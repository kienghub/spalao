<?php
include '../../../connection.php';
    $id = $_GET['id'];
    $query = "DELETE FROM spa_rate WHERE rate_id='$id'";
    if (mysqli_query($con, $query)) {
        echo 'SUCCESS';
    } else {
        echo 'FAIL';
    }
?>