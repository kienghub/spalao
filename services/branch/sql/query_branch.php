<?php
include '../../../connection.php';
$output = array();
$query  =mysqli_query($con,"SELECT
	spa_branch.*, 
	spa_users.user_fname, 
	spa_users.user_lname, 
	spa_users.user_gender
FROM
	spa_branch LEFT JOIN spa_users ON spa_branch.branch_createdBy=spa_users.user_id");
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
?>