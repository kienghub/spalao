<?php 
include('../../connection.php');
include('../../config/_config.php');
$_callProfileSystem=$_SQL($con,"SELECT*FROM spa_profile_system");
$_profile=$_ASSOC($_callProfileSystem);
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Meta -->
<meta name="description" content="spa">
<meta name="author" content="kieng">
<link rel="shortcut icon"
    href="../../img/<?php if($_profile['p_logo']){echo $_profile['p_logo'];}else{echo 'app-logo.png';}?>" />

<!-- Title -->
<title>SPA</title>

<!-- Bootstrap css -->
<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
<!-- Icomoon Font Icons css -->
<link rel="stylesheet" href="../../assets/fonts/style.css">
<link rel="stylesheet" href="../../assets/font/font-style.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<!-- Main css -->
<link rel="stylesheet" href="../../assets/css/main.css">
<!-- DateRange css -->
<link rel="stylesheet" href="../../assets/vendor/daterange/daterange.css" />
<!-- Data Tables -->
<link rel="stylesheet" href="../../assets/vendor/datatables/dataTables.bs4.css" />
<link rel="stylesheet" href="../../assets/vendor/datatables/dataTables.bs4-custom.css" />
<link href="../../assets/vendor/datatables/buttons.bs.css" rel="stylesheet" />