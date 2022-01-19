<?php 
include ('../../../connection.php');
$info = json_decode(file_get_contents("php://input"));
@$x=count($info);
if ($x > 0) {
    @$mb_fullName = $_SETSTRING($con, $info->mb_fullName);
    @$mb_phoneNumber =$_SETSTRING($con, $info->mb_phoneNumber);
    @$mb_address = $_SETSTRING($con, $info->mb_address);
    @$mb_note = $_SETSTRING($con, $info->mb_note);
    $btnName = $info->btnName;
// INSERT DATA
$select_max_id=$_SQL($con, "SELECT _id FROM spa_member WHERE _id=(SELECT MAX(_id)FROM spa_member)");
    $get_result=$_ASSOC($select_max_id);
    $max_id=$get_result['_id'];
    if($max_id<1){
        $id=1;
    }else{
        $id=$max_id+1;
    }

    if ($btnName == "ບັນທຶກ") {
    $selectMember = $_SQL($con, "SELECT * FROM spa_member WHERE mb_fullName='$mb_fullName' AND mb_phoneNumber='$mb_phoneNumber' AND branch_id='$_BRANCH'");
    $res = $_COUNT($selectMember);
    if ($res > 0) {
        echo 'DUPLICATED'; 
    } else {
        $data = "'$id','$_AUTO_ID','$mb_fullName','$mb_phoneNumber','$mb_address','$mb_note','$_TIMESTAMP','$_USER_ID','$_BRANCH'";
        $_createMember = $_SQL($con, "INSERT INTO spa_member VALUE($data)");
        if ($_createMember) {
            echo 200;
        } else {
            echo 400;
        }
    }
}else {
   $id =$info->mb_id;
    $_newData = "mb_fullName='$mb_fullName',mb_phoneNumber='$mb_phoneNumber',mb_address='$mb_address',mb_note='$mb_note',mb_createdAt='$_TIMESTAMP',mb_createdBy='$_USER_ID'";
    $_updateMember = $_SQL($con, "UPDATE spa_member SET $_newData WHERE mb_id='$id'");
    if ($_updateMember) {
        echo 200;
    } else {
        echo 400;
    }
}
}
?>