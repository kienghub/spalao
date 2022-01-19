<?php
include '../../../connection.php';
$output = array();
$query  =mysqli_query($con,"SELECT
            spa_product.*, 
            spa_product.pro_title, 
            spa_category.cate_title,
            spa_users.user_fname
        FROM
            spa_product LEFT JOIN spa_category ON spa_product.pro_cate_id=spa_category.cate_id
            LEFT JOIN spa_users ON spa_product.pro_createdBy=spa_users.user_id WHERE spa_product.pro_status='true' ORDER BY spa_product.pro_createdAt DESC");
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
mysqli_close($con);
?>