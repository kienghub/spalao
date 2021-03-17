<?php 
include '../../../connection.php';
// SUM DATA 1
$bill_no=$_GET['bill_no'];
$_sumData1 = $_SQL($con, "SELECT sum(od_qty*od_price)as total FROM quick_orders  WHERE quick_orders.od_bill_no='$bill_no' AND quick_orders.branch='$_BRANCH'");
$_sum1 = $_ASSOC($_sumData1);
echo $_total1 = $_sum1['total'];
// SUM DATA 2
// echo ",";
// $_sumData2 = $_SQL($con, "SELECT sum(od_qty*od_price)as total FROM quick_orders  WHERE quick_orders.od_bill_no='$bill_no' AND quick_orders.branch='$_BRANCH'");
// $_sum2 = $_ASSOC($_sumData2);
// $_total2 = $_sum2['total'];
?>