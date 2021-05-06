<?php
include '../../../connection.php';
$output = array();
$query  =mysqli_query($con,"SELECT * FROM spa_equiment 
LEFT JOIN spa_users ON spa_equiment.e_createdBy = spa_users.user_id ORDER BY spa_equiment._id DESC");
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
mysqli_close($con);
?>