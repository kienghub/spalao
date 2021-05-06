<?php
include('../../../connection.php');
@$bring_equiment_id = $_POST['bring_equiment_id'];
@$bring_qty = $_POST['bring_qty'];
@$bring_time = $_POST['bring_time'];
@$bring_note = $_POST['bring_note'];

  //CHECK DATA DUPLICATE
    $selectResivce = $_SQL($con,"SELECT * FROM spa_bring_equiment WHERE bring_equiment_id='$bring_equiment_id' AND bring_qty='$bring_qty' AND bring_time='$bring_time'");
    $res = $_COUNT($selectResivce);
    // CHECK MENU IN STOCK
    $selectStocks = $_SQL($con,"SELECT * FROM spa_estock WHERE est_equiment='$bring_equiment_id'");
    $_countStock = $_COUNT($selectStocks);
    if($_countStock < 1){
    $createStock=$_SQL($con, "INSERT INTO spa_estock VALUES('$_AUTO_ID','$bring_equiment_id','0')");
}else if ($res > 0) {
        echo 'DATA_READY_EXIT'; 
}else{
       $data = "'$_AUTO_ID','$bring_equiment_id','$bring_qty','$bring_time','true','$bring_note','$_TIMESTAMP','$_USER_ID'";
        $_creatbroked = $_SQL($con, "INSERT INTO spa_bring_equiment VALUE($data)");
        if ($_creatbroked) {
            $_SQL($con,"UPDATE spa_estock SET est_qty=est_qty-'$bring_qty' WHERE est_equiment='$bring_equiment_id'");
            echo 200;
        } else {
            echo 400;
        }
    }