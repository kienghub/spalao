<?php
include '../../../connection.php';
$output = array();
$query  =mysqli_query($con,"SELECT*,spa_package._id as p_id FROM spa_package 
left join spa_users on spa_package.createdBy=spa_users.user_id
left join spa_product on spa_package.pro_id=spa_product.pro_id
 ORDER BY spa_package._id DESC");
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
mysqli_close($con);
?>