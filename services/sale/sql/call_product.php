<?php
include '../../../connection.php';
$output = array();
$query  =mysqli_query($con, "SELECT * FROM quick_order_table WHERE branch='$_BRANCH' AND tb_status='FULL' OR tb_status='CHECKING' ORDER BY tb_createdAt ASC");
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
?>