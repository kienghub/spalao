<?php
include '../../../connection.php';
@$data = json_decode(file_get_contents("php://input"));
@$x=count($data);
if($x > 0) {
    $id    = $data->cate_id;
    $query = "DELETE FROM spa_rate WHERE rate_id='$id'";
    if (mysqli_query($con, $query)) {
        echo 200;
    } else {
        echo 400;
    }
}
mysqli_close($con);
?>