<?php
include '../../../connection.php';
$output = array();
$_bill_no=$_GET['bill_no'];
$query  =mysqli_query($con, "SELECT
quick_orders.*, 
quick_order_menu.m_name_l, 
quick_order_menu.m_name_e, 
quick_order_menu.m_type, 
quick_order_menu.m_size, 
quick_order_menu.m_img
FROM
quick_orders LEFT JOIN quick_order_menu ON quick_orders.od_menu_id=quick_order_menu.m_id WHERE quick_orders.od_bill_no='$_bill_no' AND quick_orders.branch='$_BRANCH' ORDER BY quick_orders.on_aprovalTime ASC");
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
?>