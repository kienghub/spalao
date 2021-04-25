<?php 
include ('../../../connection.php');
$info = json_decode(file_get_contents("php://input"));
@$x=count($info);
if ($x > 0) {
   @$branch_name_l = $_SUBSTRING($con, $info->branch_name_l);
   @$branch_name_e = $_SUBSTRING($con, $info->branch_name_e);
    $btnName = $info->btnName;
// INSERT DATA
$select_max_id=$_SQL($con, "SELECT _id FROM spa_branch WHERE _id=(SELECT MAX(_id)FROM spa_branch)");
    $get_result=$_ASSOC($select_max_id);
    $max_id=$get_result['_id'];
    if($max_id<1){
        $id=1;
        $branch_code=$_GEN_ID+$id;
    }else{
        $id=$max_id+1;
        $branch_code=$_GEN_ID+$id;
    }

    if ($btnName == "ບັນທຶກ") {
    $data = "'$id','$_AUTO_ID','$branch_name_l','$branch_name_e','$_TIMESTAMP','$_USER_ID'";
    $_queryBranch = $_SQL($con, "SELECT branch_name_l,branch_name_e FROM spa_branch WHERE branch_name_l='$branch_name_l' AND branch_name_e='$branch_name_e'");
    $_catch = $_COUNT($_queryBranch);
    if ($_catch > 1) {
        echo "DATA_READY_EXIT";
    } else {
        $_createBranch = $_SQL($con, "INSERT INTO spa_branch VALUE($data)");
        if ($_createBranch) {
            echo 7070;
        } else {
            echo 4466;
        }
    } 
}else {
    $id = $info->branch_id;
    $_newData = "branch_name_l='$branch_name_l',branch_name_e='$branch_name_e',branch_createdAt='$_TIMESTAMP',branch_createdBy='$_USER_ID'";
    $_updateBranch = $_SQL($con, "UPDATE spa_branch SET $_newData WHERE branch_id='$id'");
    if ($_updateBranch) {
        echo 7070;
    } else {
        echo 4466;
    }
}
}
?>