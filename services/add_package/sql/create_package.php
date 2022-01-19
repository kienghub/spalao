<?php
include ('../../../connection.php');
$info = json_decode(file_get_contents("php://input"));
@$x=count($info);
if ($x > 0) {
    $package_id_fk = $_SETSTRING($con, $info->package_id_fk);
    $add_package_qty = $_SETSTRING($con, $info->add_package_qty);
    @$package_note = $_SETSTRING($con, $info->package_note);
    
    $btnName = $info->btnName;

    $callPackagePrice=mysqli_query($con,"SELECT package_price from spa_package Where _id='$package_id_fk'");
    $res=mysqli_fetch_assoc($callPackagePrice);
    $price=$res['package_price'];

    $countStockPackage=mysqli_query($con,"SELECT count(*)as total from spa_stock_package Where package_id_fk='$package_id_fk'");
    $result=mysqli_fetch_assoc($countStockPackage);
    $stocks=$result['total'];

    if ($btnName == "ບັນທຶກ") {
        $_catch=$_SQL($con,"SELECT * FROM spa_add_package WHERE package_id_fk='$package_id_fk' AND add_package_qty='$add_package_qty' AND add_package_price='$price' AND createdAt like '$_DATE%'");
        $_count=$_COUNT($_catch);
        if($_count > 0){
            echo "DATA_READY_EXIT";
        }else{
          $_DATA="'$_AUTO_ID','$package_id_fk','$add_package_qty','$price','$package_note','$_DATE','$_TIMESTAMP','$_USER_ID'";
            $newData=$_SQL($con,"INSERT INTO spa_add_package VALUES($_DATA)");
            if($newData){
                if($stocks>0){
                    mysqli_query($con,"UPDATE spa_stock_package set package_qty=package_qty+'$add_package_qty' WHERE package_id_fk='$package_id_fk'");
                    echo 200;
                }else{
                    mysqli_query($con,"INSERT INTO spa_stock_package values('$_AUTO_ID','$package_id_fk','$add_package_qty')");
                    echo 200;
                }
            }else {
                echo 400;
            }
        }
    }else {
     $id= $info->_id;
     $old_qty = $_SETSTRING($con, $info->old_qty);
     mysqli_query($con,"UPDATE spa_stock_package set package_qty=package_qty-'$old_qty' WHERE package_id_fk='$package_id_fk'");

     $_update =$_SQL($con, "UPDATE spa_add_package SET 
            package_id_fk='$package_id_fk',add_package_qty='$add_package_qty',package_note='$package_note',createdAt='$_TIMESTAMP', add_package_price='$price', createdBy='$_USER_ID' WHERE _id='$id'");
        if ($_update) {
            echo 200;
            mysqli_query($con,"UPDATE spa_stock_package set package_qty=package_qty+'$add_package_qty' WHERE package_id_fk='$package_id_fk'");
        }else {
            echo 400;
        }
    }
}
mysqli_close($con);
?>