<?php
include '../../../connection.php';
@$id=$_GET['id'];
$_billData = $_SQL($con, "SELECT b_no FROM quick_order_bill WHERE b_table_id='$id' AND branch='$_BRANCH'");
$_callBillNo = $_ASSOC($_billData);
echo $_callBillNo['b_no'];
?>