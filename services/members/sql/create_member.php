<?php
include('../../../connection.php');
@$mb_fullName = $_POST['mb_fullName'];
@$mb_phoneNumber = $_POST['mb_phoneNumber'];
@$mb_address = $_POST['mb_address'];
@$mb_note = $_POST['mb_note'];
if ($_POST['mb_id'] == "") {
    //Check DAta DUPLICATE
    $selectMember = $_SQL($con, "SELECT * FROM spa_member WHERE mb_fullName='$mb_fullName' AND mb_phoneNumber='$mb_phoneNumber'");
    $res = $_COUNT($selectMember);
    if ($res > 0) {
        echo 'DUPLICATED'; 
    } else {
        $data = "'$_AUTO_ID','$mb_fullName','$mb_phoneNumber','$mb_address','$mb_note','$_TIMESTAME','$_USER_NAME'";
        $_createMember = $_SQL($con, "INSERT INTO spa_member VALUE($data)");
        if ($_createMember) {
            echo 'SUCCESS';
        } else {
            echo 'FAIL';
        }
    }
} else {
    $id = $_POST['mb_id'];
    $_newData = "mb_fullName='$mb_fullName',mb_phoneNumber='$mb_phoneNumber',mb_address='$mb_address',mb_note='$mb_note',mb_createdAt='$_TIMESTAME',mb_createdBy='$_USER_NAME'";
    $_updateMember = $_SQL($con, "UPDATE spa_member SET $_newData WHERE mb_id='$id'");
    if ($_updateMember) {
        echo 'SUCCESS';
    } else {
        echo 'FAIL';
    }
}