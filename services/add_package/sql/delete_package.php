<?php
include '../../../connection.php';
@$data = json_decode(file_get_contents("php://input"));
@$x=count($data);
if($x > 0) {
    $id    = $data->_id;
    $package_id_fk= $data->package_id_fk;
    $package_qty = $data->package_qty;
    $query = "DELETE FROM spa_add_package WHERE _id='$id'";
    if (mysqli_query($con, $query)) {
        mysqli_query($con,"UPDATE spa_stock_package set package_qty=package_qty-'$package_qty' WHERE package_id_fk='$package_id_fk'");
        echo 200;
    } else {
        echo 400;
    }
}
mysqli_close($con);
?>