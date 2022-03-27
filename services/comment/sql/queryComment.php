<?php
include '../../../connection.php';
$output = array();
$query  =mysqli_query($web_connect,"SELECT * FROM spa_comment ORDER BY _id DESC");
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
mysqli_close($web_connect);
?>