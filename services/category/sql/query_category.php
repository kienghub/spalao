<?php
include '../../../connection.php';
$output = array();
$query  =mysqli_query($con,"SELECT
	spa_category.*, 
	spa_users.user_fname
FROM spa_category LEFT JOIN spa_users ON spa_category.cate_createdBy=spa_users.user_id ORDER BY cate_createdAt DESC");
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
mysqli_close($con);
?>