<?php
include '../../../connection.php';
@$data = json_decode(file_get_contents("php://input"));
@$x=count($data);
if($x > 0) {
    $id    = $data->_id;
    $query = "UPDATE spa_booking SET status=1,receiptBy='$_USER_FNAME $_USER_LNAME' WHERE _id='$id'";
    if (mysqli_query($web_connect, $query)) {
        echo 200;
    } else {
        echo 400;
    }
}
mysqli_close($con);
?>