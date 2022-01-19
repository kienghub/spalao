<?php
include '../../../connection.php';
$output = array();

if(@$_GET['st_date'] || @$_GET['end_date']){
    $start_date=$_GET['st_date'];
    $end_date=$_GET['end_date'];
    $params="WHERE add_date BETWEEN '$start_date' AND '$end_date'";
}else{
$params="";
}

$query  =mysqli_query($con,"SELECT*,spa_add_package._id as p_id FROM spa_add_package 
left join spa_users on spa_add_package.createdBy=spa_users.user_id
left join spa_package on spa_add_package.package_id_fk=spa_package._id $params
 ORDER BY spa_add_package._id DESC");
if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
mysqli_close($con);
?>