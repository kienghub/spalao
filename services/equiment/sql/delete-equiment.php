<?php
include '../../../connection.php';
@$data = json_decode(file_get_contents("php://input"));
@$x=count($data);
if($x > 0) {
    $id    = $data->id;
    $selectMenu=$_SQL($con,"SELECT e_img FROM spa_equiment WHERE e_id='$id'");
    $res=$_ASSOC($selectMenu);
    $img=$res['e_img'];
    $dir='../../../img/';
    $query = "DELETE FROM spa_equiment WHERE e_id='$id'";
    if (mysqli_query($con, $query)) {
         @unlink($dir.$img);
        echo 200;
    } else {
        echo 400;
    }
}
mysqli_close($con);
?>