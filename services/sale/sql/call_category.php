<?php
include '../../../connection.php';
$output = array();
$query  =mysqli_query($con, "SELECT * FROM spa_category ORDER BY cate_createdAt ASC");
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
?>