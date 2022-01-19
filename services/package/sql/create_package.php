<?php
include ('../../../connection.php');
$info = json_decode(file_get_contents("php://input"));
@$x=count($info);
if ($x > 0) {
    $pro_id = $_SETSTRING($con, $info->pro_id);
    $package_name = $_SETSTRING($con, $info->package_name);
    $package_type = $_SETSTRING($con, $info->package_type);
    $package_price = $_SETSTRING($con, $info->package_price);
    $package_qty = $_SETSTRING($con, $info->package_qty);
    @$note = $_SETSTRING($con, $info->note);
    $btnName = $info->btnName;
    if ($btnName == "ບັນທຶກ") {
        $_catch=$_SQL($con,"SELECT * FROM spa_package WHERE pro_id='$pro_id' AND package_name='$package_name' AND package_type='$package_type' AND package_price='$package_price' AND package_qty='$package_qty'");
        $_count=$_COUNT($_catch);
        if($_count > 0){
            echo "DATA_READY_EXIT";
        }else{
          $_DATA="'$_AUTO_ID','$pro_id','$package_name','$package_type','$package_price','$package_qty','$note','true','$_TIMESTAMP','$_USER_ID'";
            $newData=$_SQL($con,"INSERT INTO spa_package VALUES($_DATA)");
            if($newData){
                echo 200;
            }else {
                echo 400;
            }
        }
    }else {
     $id= $info->_id;
    $_update =$_SQL($con, "UPDATE spa_package SET 
            pro_id='$pro_id',package_name='$package_name',package_type='$package_type',package_price='$package_price',package_qty='$package_qty',note='$note',createdAt='$_TIMESTAMP',createdBy='$_USER_ID' WHERE _id='$id'");
        if ($_update) {
            echo 200;
        }else {
            echo 400;
        }
    }
}
mysqli_close($con);
?>