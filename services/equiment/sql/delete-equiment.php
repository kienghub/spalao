<?php
include '../../../connection.php';
    $id = $_GET['id'];
    $selectMenu=$_SQL($con,"SELECT e_img FROM spa_equiment WHERE e_id='$id'");
    $res=$_ASSOC($selectMenu);
    $img=$res['e_img'];
    $dir='../../../img/';
    $query = "DELETE FROM spa_equiment WHERE e_id='$id'";
    if (mysqli_query($con, $query)) {
        echo 7070;
        @unlink($dir.$img);
    } else {
        echo 4466;
    }
?>