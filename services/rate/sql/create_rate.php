<?php
include('../../../connection.php');
@$rate_THB = $_POST['rate_THB'];
@$rate_USD = $_POST['rate_USD'];

if ($_POST['rate_id'] == "") {
    $data = "'$_AUTO_ID','$rate_THB','$rate_USD','$_DATE','$_USER_ID'";
    $_createRate = $_SQL($con, "INSERT INTO spa_rate VALUE($data)");
    if ($_createRate) {
        echo 'SUCCESS';
    } else {
        echo 'FAIL';
    }
} else {
    $id = $_POST['rate_id'];
    $_newData = "rate_THB='$rate_THB',rate_USD='$rate_USD',rate_createdAt='$_DATE',rate_createdBy='$_USER_ID'";
    $_updateRate = $_SQL($con, "UPDATE spa_rate SET $_newData WHERE rate_id='$id'");
    if ($_updateRate) {
        echo 'SUCCESS';
    } else {
        echo 'FAIL';
    }
}