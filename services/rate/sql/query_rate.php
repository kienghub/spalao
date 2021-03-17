<?php
include '../../../connection.php';
    $selectRate ="SELECT * FROM spa_rate WHERE rate_id='".$_GET['id']."'";
    $resultRate =$DB_con->prepare($selectRate);
    $resultRate->execute();
    $_row=$resultRate->fetch();
    echo json_encode($_row);