<?php
include('../../../connection.php');
@$bk_equiment_id = $_POST['bk_equiment_id'];
@$bk_qty = $_POST['bk_qty'];
@$bk_time = $_POST['bk_time'];
@$bk_note = $_POST['bk_note'];

  //CHECK DATA DUPLICATE
    $selectResivce = $_SQL($con,"SELECT * FROM spa_broked WHERE bk_equiment_id='$bk_equiment_id' AND bk_qty='$bk_qty' AND bk_time='$bk_time'");
    $res = $_COUNT($selectResivce);
    // CHECK MENU IN STOCK
    $selectStocks = $_SQL($con,"SELECT * FROM spa_estock WHERE est_equiment='$bk_equiment_id'");
    $_countStock = $_COUNT($selectStocks);
    if($_countStock < 1){
    $createStock=$_SQL($con, "INSERT INTO spa_estock VALUES('$_AUTO_ID','$bk_equiment_id','0')");
}else if ($res > 0) {
        echo 'DATA_READY_EXIT'; 
}else{
       $data = "'$_AUTO_ID','$bk_equiment_id','$bk_qty','$bk_time','true','$bk_note','$_TIMESTAMP','$_USER_ID'";
        $_creatbroked = $_SQL($con, "INSERT INTO spa_broked VALUE($data)");
        if ($_creatbroked) {
            $_SQL($con,"UPDATE spa_estock SET est_qty=est_qty-'$bk_qty' WHERE est_equiment='$bk_equiment_id'");
            echo 200;
        } else {
            echo 400;
        }
    }