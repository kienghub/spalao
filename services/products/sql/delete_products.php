<?php
include '../../../connection.php';
@$data = json_decode(file_get_contents("php://input"));
@$x=count($data);
if($x > 0) {
    $id    = $data->pro_id;
    $query = "DELETE FROM spa_product WHERE pro_id='$id'";
    if (mysqli_query($con, $query)) {
        echo 7070;
    } else {
        echo 4466;
    }
}
?>