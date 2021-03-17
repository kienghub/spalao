<?php
include ('../../../connection.php');
$info = json_decode(file_get_contents("php://input"));
@$x=count($info);
if ($x > 0) {
   @$etype_name_l = $_SETSTRING($con, $info->etype_name_l);
   @$etype_name_e = $_SETSTRING($con, $info->etype_name_e);
    $btnName = $info->btnName;

// INSERT DATA
    if ($btnName == "ບັນທຶກ") {
        $_catch=$_SQL($con,"SELECT etype_name_l FROM spa_etype WHERE etype_name_l='$etype_name_l'");
        $_count=$_COUNT($_catch);
        if($_count > 0){
            echo "DATA_READY_EXIT";
        }else{
            $_DATA="'$_AUTO_ID','$etype_name_l','$etype_name_e','$_TIMESTAM','$_USER_ID'";
            $newData=$_SQL($con,"INSERT INTO spa_etype VALUES($_DATA)");
            if($newData){
                echo 3000;
            }else {
                echo 7070;
            }
        }
    }else {
        $id= $info->etype_id;
        $updateNewData="etype_name_l='$etype_name_l',etype_name_e='$etype_name_e',etype_createdAt='$_TIMESTAM',etype_createdBy='$_USER_ID'";
        $_update =$_SQL($con, "UPDATE spa_etype SET $updateNewData WHERE etype_id='$id'");
        if ($_update) {
            echo 3000;
        }else {
            echo 7070;
        }
    }
}
?>