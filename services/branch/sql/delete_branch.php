<?php
include '../../../connection.php';
    $id = $_GET['id'];
    $query = "DELETE FROM spa_branch WHERE branch_id='$id'";
    if (mysqli_query($con, $query)) {
        echo 'SUCCESS';
    } else {
        echo 'FAIL';
    }
?>