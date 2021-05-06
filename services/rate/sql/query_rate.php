<?php
include '../../../connection.php';
$output = array();
$query  =mysqli_query($con,"SELECT * FROM spa_rate LEFT JOIN spa_users On spa_users.user_id=spa_rate.rate_createdBy ORDER BY spa_rate._id DESC");
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
mysqli_close($con);
?>