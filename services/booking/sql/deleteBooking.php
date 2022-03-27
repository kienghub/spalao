<?php
include '../../../connection.php';
@$data = json_decode(file_get_contents("php://input"));
@$x=count($data);
if($x > 0) {
    $id    = $data->_id;
    $query = "DELETE FROM spa_booking WHERE _id='$id'";
    if (mysqli_query($web_connect, $query)) {
        echo 200;
    } else {
        echo 400;
    }
}
mysqli_close($con);
?>