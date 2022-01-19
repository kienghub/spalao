<?php
include ('../../../connection.php');
$info = json_decode(file_get_contents("php://input"));
@$x=count($info);
if ($x > 0) {
   @$cate_title = $_SETSTRING($con, $info->cate_title);
   @$cate_note = $_SETSTRING($con, $info->cate_note);
    $btnName = $info->btnName;
    $_select_max_id_for_add_id=$_SQL($con,"SELECT _id FROM spa_category WHERE _id=(SELECT MAX(_id)FROM spa_category)");
        $result=$_ASSOC($_select_max_id_for_add_id);
        $max_number=$result['_id'];
        if($max_number==""){
            $id_number=1;
        }else{ 
            $id_number=$max_number+1;
        }
// INSERT DATA
    if ($btnName == "ບັນທຶກ") {
        $_catch=$_SQL($con,"SELECT cate_title FROM spa_category WHERE cate_title='$cate_title'");
        $_count=$_COUNT($_catch);
        if($_count > 0){
            echo "DATA_READY_EXIT";
        }else{
            $_DATA="'$id_number','$_AUTO_ID','$cate_title','$cate_note','$_TIMESTAMP','$_USER_ID'";
            $newData=$_SQL($con,"INSERT INTO spa_category VALUES($_DATA)");
            if($newData){
                echo 200;
            }else {
                echo 400;
            }
        }
    }else {
        $id= $info->cate_id;
        $_update =$_SQL($con, "UPDATE spa_category SET 
            cate_title='$cate_title',cate_note='$cate_note',cate_createdAt='$_TIMESTAMP',cate_createdBy='$_USER_ID' WHERE cate_id='$id'");
        if ($_update) {
            echo 200;
        }else {
            echo 400;
        }
    }
}
mysqli_close($con);
?>