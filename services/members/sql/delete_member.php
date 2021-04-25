<?php
include '../../../connection.php';
@$data = json_decode(file_get_contents("php://input"));
@$x=count($data);
if($x > 0) {
    $id  = $data->id;
     $query = "DELETE FROM spa_member WHERE mb_id='$id'";
    if (mysqli_query($con, $query)) {
        echo 7070;
    } else {
        echo 4466;
    }
}
?>