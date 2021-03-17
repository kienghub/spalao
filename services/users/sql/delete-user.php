<?php
include '../../../connection.php';
    $id = $_GET['id'];
    $selectUser=$_SQL($con,"SELECT user_img FROM spa_users WHERE user_id='$id'");
    $res=$_ASSOC($selectUser);
    $img=$res['user_img'];
    $dir='../../../img/';
    $query = "DELETE FROM spa_users WHERE user_id='$id'";
    if (mysqli_query($con, $query)) {
        echo 'SUCCESS';
        @unlink($dir.$img);
    } else {
        echo 'FAIL';
    }
?>