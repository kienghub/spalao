<?php 
include ('../../../connection.php');
$info = json_decode(file_get_contents("php://input"));
@$x=count($info);
if ($x > 0) {
   @$branch_name_l = $_SUBSTRING($con, $info->branch_name_l);
   @$branch_name_e = $_SUBSTRING($con, $info->branch_name_e);
    $btnName = $info->btnName;
    // INSERT DATA
    $_select_max_id_for_add_id=$_SQL($con,"SELECT _id FROM spa_branch WHERE _id=(SELECT MAX(_id)FROM spa_branch)");
    $result=$_ASSOC($_select_max_id_for_add_id);
    $max_number=$result['_id'];
    if($max_number==""){
        $id_number=1;
    }else{ 
        $id_number=$max_number+1;
    }
    if ($btnName == "ບັນທຶກ") {
    $data = "'$id_number','$_AUTO_ID','$branch_name_l','$branch_name_e','$_TIMESTAMP','$_USER_ID'";
    $_queryBranch = $_SQL($con, "SELECT branch_name_l,branch_name_e FROM spa_branch WHERE branch_name_l='$branch_name_l' AND branch_name_e='$branch_name_e'");
    $_catch = $_COUNT($_queryBranch);
    if ($_catch > 1) {
        echo "DATA_READY_EXIT";
    } else {
        $_createBranch = $_SQL($con, "INSERT INTO spa_branch VALUE($data)");
        if ($_createBranch) {
            echo 200;
        } else {
            echo 400;
        }
    } 
}else {
    $id = $info->branch_id;
    $_newData = "branch_name_l='$branch_name_l',branch_name_e='$branch_name_e',branch_createdAt='$_TIMESTAMP',branch_createdBy='$_USER_ID'";
    $_updateBranch = $_SQL($con, "UPDATE spa_branch SET $_newData WHERE branch_id='$id'");
    if ($_updateBranch) {
        echo 200;
    } else {
        echo 400;
    }
}
}
mysqli_close($con);
?>