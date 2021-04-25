<?php
include ('../../../connection.php');
$info = json_decode(file_get_contents("php://input"));
@$x=count($info);
if ($x > 0) {
   @$cate_title = $_SUBSTRING($con, $info->cate_title);
   @$cate_note = $_SUBSTRING($con, $info->cate_note);
    $btnName = $info->btnName;

// INSERT DATA
    if ($btnName == "ບັນທຶກ") {
        $_catch=$_SQL($con,"SELECT cate_title FROM spa_category WHERE cate_title='$cate_title'");
        $_count=$_COUNT($_catch);
        if($_count > 0){
            echo "DATA_READY_EXIT";
        }else{
            $_DATA="'$_AUTO_ID','$cate_title','$cate_note','$_TIMESTAMP','$_USER_ID'";
            $newData=$_SQL($con,"INSERT INTO spa_category VALUES($_DATA)");
            if($newData){
                echo 7070;
            }else {
                echo 4466;
            }
        }
    }else {
        $id= $info->cate_id;
        $_update =$_SQL($con, "UPDATE spa_category SET 
            cate_title='$cate_title',cate_note='$cate_note',cate_createdAt='$_TIMESTAMP',cate_createdBy='$_USER_ID' WHERE cate_id='$id'");
        if ($_update) {
            echo 7070;
        }else {
            echo 4466;
        }
    }
}
?>