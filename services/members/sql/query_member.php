<?php
include '../../../connection.php';
    $selectMember ="SELECT * FROM spa_member WHERE mb_id='".$_GET['id']."'";
    $resultMember =$DB_con->prepare($selectMember);
    $resultMember->execute();
    $_row=$resultMember->fetch();
    echo json_encode($_row);