<?php
include('../../../connection.php');
@$rate_THB = $_POST['rate_THB'];
@$rate_USD = $_POST['rate_USD'];
$_select_max_id_for_add_id=$_SQL($con,"SELECT _id FROM spa_rate WHERE _id=(SELECT MAX(_id)FROM spa_rate)");
        $result=$_ASSOC($_select_max_id_for_add_id);
        $max_number=$result['_id'];
        if($max_number==""){
            $id_number=1;
        }else{ 
            $id_number=$max_number+1;
     }
if ($_POST['rate_id'] == "") {
    $data = "'$id_number','$_AUTO_ID','$rate_THB','$rate_USD','$_DATE','$_USER_ID'";
    $_createRate = $_SQL($con, "INSERT INTO spa_rate VALUE($data)");
    if ($_createRate) {
        echo 200;
    } else {
        echo 400;
    }
} else {
    $id = $_POST['rate_id'];
    $_newData = "rate_THB='$rate_THB',rate_USD='$rate_USD',rate_createdAt='$_DATE',rate_createdBy='$_USER_ID'";
    $_updateRate = $_SQL($con, "UPDATE spa_rate SET $_newData WHERE rate_id='$id'");
    if ($_updateRate) {
        echo 200;
    } else {
        echo 400;
    }
}