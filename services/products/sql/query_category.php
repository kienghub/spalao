<?php
include '../../../connection.php';
$output = array();
$query  =mysqli_query($con,"SELECT
                        spa_product.*, 
                        spa_product.pro_title, 
                        spa_category.cate_title
                    FROM
                        spa_product LEFT JOIN spa_category ON spa_product.pro_cate_id=spa_category.cate_id ORDER BY pro_createdAt DESC");
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
?>