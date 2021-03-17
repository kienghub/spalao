<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <?php include('../../components/lib/lib.php') ?>
    <?php include('../../access/access.php') ?>
    <?php _active('.equiment') ?>
</head>

<body>
    <!-- Page wrapper start -->
    <div class="page-wrapper pinned">
        <?php include('../../components/layout/side-bar.php') ?>
        <!-- Page content start  -->
        <div class="page-content">
            <?php include_once('../../components/layout/heading.php') ?>
            <!-- Page header start -->
            <div class="page-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" onclick="window.location='../home/'">ໜ້າຫຼັກ</li>
                    <li class="breadcrumb-item active">ລາຍການອຸປະກອນໃນສາງ</li>
                </ol>

                <ul class="app-actions">
                    <li>
                        <a href="#" id="reportrange">
                            <?php echo $_DATE_FORMAT ?> <div id="MyClockDisplay" class="clock" onload="showTime()">
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="../home/">
                            <i class="fa fa-times"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Page header end -->
            <!-- Main container start -->
            <div class="main-container">
                <div class="task-section">
                    <!-- Row start -->
                    <div class="row no-gutters">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                            <div class="docs-type-container  text-center">
                                <input type="hidden" id="tb_id" value="<?php echo $_GET['id'] ?>">
                                <h4>ໝວດອຸປະກອນ</h4>
                                <div class="docTypeContainerScroll">
                                    <div class="docs-block  p-2">
                                        <input type="text" id="searchCategory" class='form-control m-1'
                                            placeholder="ຄົ້ນຫາ..">
                                        <div class="doc-labels" id="categorys">
                                            <a href="../estocks/?all=true"
                                                class="<?php if ($_GET['all'] == true) {
                                                                                                                                                echo "active";
                                                                                                                                            } ?>"
                                                id="category">
                                                <i class="icon-receipt"></i> ທັງໝົດ
                                            </a>
                                            <?php
                                            $selectetype = $_SQL($con, "SELECT * FROM spa_etype ORDER BY etype_id DESC");
                                            foreach ($selectetype as $key) {
                                            ?>
                                            <a href="../estocks/?etype_id=<?php echo $key['etype_id'] ?>"
                                                class="<?php if ($_GET['etype_id'] == $key['etype_id']) {
                                                                                                                                                                                    echo "active";
                                                                                                                                                                                } ?>"
                                                id="category">
                                                <i class="icon-receipt"></i> <?php echo $key['etype_name_l'] ?>
                                            </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10">
                            <div class="labels-container">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h4><i class="icon-list"></i> ລາຍການອຸປະກອນທັງໝົດ</h4>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" onclick="window.location='./resivce.php?all=true'"
                                                class="btn btn-primary btn-lg btn-block"><i
                                                    class="fa fa-plus-circle"></i> ເອົາອຸປະກອນເຂົ້າ</button>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" onclick="window.location='./bring_out.php?all=true'"
                                                class="btn btn-info btn-lg btn-block"><i
                                                    class="fa fa-pencil-square-o"></i> ເບີກອຸປະກອນ</button>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" onclick="window.location='./broked.php?all=true'"
                                                class="btn btn-warning btn-lg btn-block">
                                                <i class="fa fa-exclamation-triangle"></i> ອຸປະກອນເປ່ເພ</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="lablesContainerScroll p-2">
                                    <div class="filters-block row" id="data">
                                        <div class="table-responsive">
                                            <table id="data" class="table custom-table table-sm">
                                                <tr>
                                                    <th class="text-center" width='70px'>#</th>
                                                    <th class="text-center" width='90px'>ຮູບ</th>
                                                    <th class="text-center">ຊື່ອຸປະກອນ(ລາວ)</th>
                                                    <th class="text-center">ຊື່ອຸປະກອນ(ອັງກິດ)</th>
                                                    <th class="text-center">ຫົວໜ່ວຍ</th>
                                                    <th class="text-center">ຂະໜາດ</th>
                                                    <th class="text-center">ຈຳນວນ</th>
                                                    <th class="text-center">ລາຄາຊື້</th>
                                                </tr>
                                                <?php
                                                 @$_etype_id = $_GET['etype_id'];
                                                 if ($_etype_id == "") {
                                                     $_FILTER = "";
                                                 } else {
                                                     $_FILTER = "WHERE e_cate_id='$_etype_id'";
                                                 }
                                                $queryEqument = $_SQL($con, "SELECT
                                                spa_estock.*, 
                                                spa_equiment.e_name_l, 
                                                spa_equiment.e_name_e,
                                                spa_equiment.e_type,
                                                spa_equiment.e_size,
                                                spa_equiment.e_Bprice,
                                                spa_equiment.e_cate_id,
                                                spa_equiment.e_img
                                                FROM spa_estock LEFT JOIN spa_equiment ON spa_estock.est_equiment=spa_equiment.e_id $_FILTER");
                                                $x = 1;
                                                foreach ($queryEqument as $key) {
                                                ?>
                                                <tr id="row">
                                                    <td class="text-center"><?php echo $x ?></td>
                                                    <td class="text-center">
                                                        <div class="project-details" style="margin:-10px">
                                                            <img src="../../img/<?php if ($key['e_img']) {
                                                                                        echo $key['e_img'];
                                                                                    } else {
                                                                                        echo 'photo.jpg';
                                                                                    } ?>" data-darkbox='../../img/<?php if ($key['e_img']) {
                                                                echo $key['e_img'];
                                                            } else {
                                                                echo 'photo.jpg';
                                                            } ?>' data-darkbox-group='two' class="avatar" alt="menu">
                                                        </div>
                                                    <td><?php echo $key['e_name_l'] ?></td>
                                                    <td><?php echo $key['e_name_e'] ?></td>
                                                    <td class="text-center"><?php echo $key['e_type'] ?></td>
                                                    <td class="text-center"><?php echo $key['e_size'] ?></td>
                                                    <td class="text-right"><?php echo @number_format($key['est_qty']) ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php echo @number_format($key['e_Bprice']) ?></td>
                                                </tr>
                                                <?php $x++;
                                                } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row end -->
            </div>
            <!-- Row end -->
        </div>
        <!-- Main container end -->
    </div>
    <!-- Page content end -->
    </div>
    <!-- Page wrapper end -->
    <?php include('../../components/lib/script.php') ?>
    <script src="./app.js"></script>
</body>

</html>