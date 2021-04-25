<?php
include('../../../connection.php');
@$ere_equiment_id = $_POST['ere_equiment_id'];
@$ere_qty = $_POST['ere_qty'];
@$ere_Bprice = $_POST['ere_Bprice'];
@$ere_time = $_POST['ere_time'];
@$ere_note = $_POST['ere_note'];

  //CHECK DATA DUPLICATE
    $selectResivce = $_SQL($con,"SELECT * FROM spa_eresivce WHERE ere_equiment_id='$ere_equiment_id' AND ere_qty='$ere_qty' AND ere_time='$ere_time'");
    $res = $_COUNT($selectResivce);
    // CHECK MENU IN STOCK
    $selectStocks = $_SQL($con,"SELECT * FROM spa_estock WHERE est_equiment='$ere_equiment_id'");
    $_countStock = $_COUNT($selectStocks);
    if($_countStock < 1){
    $createStock=$_SQL($con, "INSERT INTO spa_estock VALUES('$_AUTO_ID','$ere_equiment_id','0')");
}else if ($res > 0) {
        echo 'DATA_READY_EXIT'; 
}else{
       $data = "'$_AUTO_ID','$ere_equiment_id','$ere_qty','$ere_Bprice','$ere_time','true','$ere_note','$_TIMESTAMP','$_USER_ID'";
        $_createResivce = $_SQL($con, "INSERT INTO spa_eresivce VALUE($data)");
        if ($_createResivce) {
            $_SQL($con,"UPDATE spa_estock SET est_qty=est_qty+'$ere_qty' WHERE est_equiment='$ere_equiment_id'");
            $_SQL($con,"UPDATE spa_equiment SET e_Bprice='$ere_Bprice' WHERE e_id='$ere_equiment_id'");
            echo 7070;
        } else {
            echo 4466;
        }
    }