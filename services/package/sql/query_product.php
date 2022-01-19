<?php
include '../../../connection.php';
$output = array();
$_id=$_GET['id'];
$query  =mysqli_query($con,"SELECT*FROM spa_product Where pro_cate_id='$_id' ORDER BY _id DESC");
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
mysqli_close($con);
?>