<?php
include ('../../../connection.php');
$info = json_decode(file_get_contents("php://input"));
@$x=count($info);
if ($x > 0) {
   @$pro_id = $_SUBSTRING($con, $info->pro_id);
   @$pro_cate_id = $_SUBSTRING($con, $info->pro_cate_id);
   @$pro_title = $_SUBSTRING($con, $info->pro_title);
   @$price_for_course = $_SUBSTRING($con, $info->price_for_course);
   @$pro_qty = $_SUBSTRING($con, $info->pro_qty);
   @$price_for_time = $_SUBSTRING($con, $info->price_for_time);
   @$pro_note = $_SUBSTRING($con, $info->pro_note);
    $btnName = $info->btnName;

// INSERT DATA
    if ($btnName == "ບັນທຶກ") {
        $_catch=$_SQL($con,"SELECT pro_title,pro_cate_id FROM spa_product WHERE pro_title='$pro_title' AND pro_cate_id='$pro_cate_id'"); 
        $_count=$_COUNT($_catch);
        if($_count > 0){
            echo "DATA_READY_EXIT";
        }else{
            $_DATA="'$_AUTO_ID','$pro_cate_id','$pro_title','$price_for_course','$pro_qty','$price_for_time','true','$pro_note','$_TIMESTAMP','$_USER_ID'";
            $newData=$_SQL($con,"INSERT INTO spa_product VALUES($_DATA)");
            if($newData){
                echo 7070;
            }else {
                echo 4466;
            }
        }
    }else {
        $id= $info->pro_id;
        $_update =$_SQL($con, "UPDATE spa_product SET 
            pro_cate_id='$pro_cate_id',pro_title='$pro_title',price_for_course='$price_for_course',pro_qty='$pro_qty',price_for_time='$price_for_time',pro_createdAt='$_TIMESTAMP',pro_createdBy='$_USER_ID' WHERE pro_id='$id'");
        if ($_update) {
            echo 7070;
        }else {
            echo 4466;
        }
    }
}
?>