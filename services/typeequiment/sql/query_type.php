<?php
include '../../../connection.php';
$output = array();
$query  =mysqli_query($con,"SELECT
	spa_etype.*, 
	spa_users.user_fname
FROM
	spa_etype LEFT JOIN spa_users ON spa_etype.etype_createdBy=spa_users.user_id ORDER BY spa_etype.etype_createdAt DESC");
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
?>