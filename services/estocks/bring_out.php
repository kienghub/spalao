<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <?php include('../../components/lib/lib.php') ?>
    <?php include('../../access/access.php') ?>
    <?php _active('.equiment') ?>
    <style>
    .select2 {
        width: 100% !important;
    }
    </style>
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
                    <li class="breadcrumb-item" onclick="window.location='../settings/'">ໜ້າຫຼັກ</li>
                    <li class="breadcrumb-item" onclick="window.location='./?all=true'">ສາງອຸປະກອນທັງໝົດ</li>
                    <li class="breadcrumb-item active">ເບີກອຸປະກອນອອກໃຊ້</li>
                </ol>

                <ul class="app-actions">
                    <li>
                        <a href="#" id="reportrange">
                            <?php echo $_DATE_FORMAT ?> <div id="MyClockDisplay" class="clock" onload="showTime()">
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#addBringOut">
                            <i class="icon-plus"></i>
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
                                            <a href="./bring_out.php?all=true"
                                                class="<?php if ($_GET['all'] == true) { echo "active";} ?>"
                                                id="category">
                                                <i class="icon-receipt"></i> ທັງໝົດ
                                            </a>
                                            <?php
                                            $selectetype = $_SQL($con, "SELECT * FROM spa_etype ORDER BY etype_id DESC");
                                            foreach ($selectetype as $key) {
                                            ?>
                                            <a href="./bring_out.php?etype_id=<?php echo $key['etype_id'] ?>"
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
                                        <div class="col-md-9">
                                            <h4>ລາຍການເບີກອຸປະກອນ</h4>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="lablesContainerScroll p-2">
                                    <div class="filters-block row" id="main">
                                        <div class="table-responsive">
                                            <table id="data" class="table custom-table table-sm">
                                                <tr>
                                                    <th class="text-center" width='70px'>#</th>
                                                    <th class="text-center" width='90px'>ຮູບ</th>
                                                    <th class="text-center">ຊື່ອຸປະກອນ</th>
                                                    <th class="text-center">ຫົວໜ່ວຍ</th>
                                                    <th class="text-center">ຂະໜາດ</th>
                                                    <th class="text-center">ຈຳນວນ</th>
                                                    <th class="text-center">ລາຄາຊື້</th>
                                                    <th class="text-center">ວັນທີ</th>
                                                    <th class="text-center">ຜູ້ເບີກອຸປະກອນ</th>
                                                    <th class="text-center"></th>
                                                </tr>
                                                <?php
                                                @$etype_id = $_GET['etype_id'];
                                                if ($etype_id == "") {
                                                    $_FILTER = "";
                                                } else {
                                                    $_FILTER = "WHERE spa_equiment.e_cate_id='$etype_id'";
                                                }
                                                $queryResivce = $_SQL($con, "SELECT
                                                spa_bring_equiment.*, 
                                                spa_equiment.e_name_l, 
                                                spa_equiment.e_name_e,
                                                spa_equiment.e_type,
                                                spa_equiment.e_size,
                                                spa_equiment.e_Bprice,
                                                spa_equiment.e_img,
                                                spa_equiment.e_cate_id
                                                FROM spa_bring_equiment LEFT JOIN spa_equiment ON spa_bring_equiment.bring_equiment_id=spa_equiment.e_id $_FILTER");
                                                $x = 1;
                                                foreach ($queryResivce as $key) {
                                                ?>
                                                <tr id="sublist">
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
                                                    <td class="text-center"><?php echo $key['e_type'] ?></td>
                                                    <td class="text-center"><?php echo $key['e_size'] ?></td>
                                                    <td class="text-right">
                                                        <?php echo @number_format($key['bring_qty']) ?>
                                                    </td>
                                                    <td class="text-right">
                                                        <?php echo @number_format($key['bring_Bprice']) ?></td>
                                                    <td class="text-center"><?php echo $key['bring_time'] ?></td>
                                                    <td class="text-center">
                                                        <?php _renderUserName($key['bring_createdBy']) ?></td>
                                                    <td class="text-center">
                                                        <a href="#"
                                                            onclick="_onDeleteBringOut('<?php echo $key['bring_id'] ?>','<?php echo $key['bring_qty'] ?>','<?php echo $key['bring_equiment_id'] ?>')"><i
                                                                style="color:red"
                                                                class="fa fa-minus-circle fa-2x"></i></button>
                                                    </td>
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
    <form id="onSubmitBringOut" action="#">
        <div class="modal fade" id="addBringOut" tabindex="-1" role="dialog" aria-labelledby="addNewTaskLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewTaskLabel" style="color:white!important"><i
                                class="fa fa-plus-circle"></i> ຟອມເບີກອຸປະກອນ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="taskTitle">ໝວດອຸປະກອນ <?php isVal()?></label>
                                <select name="bring_cate_id" id="e_cate_id" onchange="_callTypeEquiment2()"
                                    class="form-control select2">
                                    <option value="">-- ເລືອກ --</option>
                                    <?php 
                                        $_queryCategory=$_SQL($con,"SELECT * FROM spa_etype");
                                        foreach($_queryCategory as $val){
                                    ?>
                                     <option value="<?php echo $val['etype_id']?>"><?php echo $val['etype_name_l']?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="taskTitle">ລາຍການເບີກອຸປະກອນ <?php isVal()?></label>
                                <select class="form-control select2" id="bring_equiment_id" name="bring_equiment_id">
                                    <option value="">-- ເລືອກ --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="taskTitle">ຈຳນວນ <?php isVal()?></label>
                                <input type="hidden" id="bring_id" name="bring_id">
                                <input type="number" class="form-control text-right" id="bring_qty" name="bring_qty"
                                    placeholder="0">
                            </div>
                            <div class="form-group">
                                <label for="taskTitle">ວັນທີ <?php isVal()?></label>
                                <input type="date" class="form-control" id="bring_time" name="bring_time"
                                    value="<?php echo $_DATE ?>">
                            </div>
                            <div class="form-group">
                                <label for="taskTitle">ໝາຍເຫດ</label>
                                <textarea name="bring_note" id="bring_note" class="form-control" cols="30" rows="4"
                                    placeholder="ກະລຸນາປ້ອນໝາຍເຫດ"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer custom">
                        <div class="left-side">
                            <button type="reset" class="btn btn-link btn-block" style="color:red"><i
                                    class="fa fa-times-circle"></i> ຍົກເລີກ</button>
                        </div>
                        <div class="divider"></div>
                        <div class="right-side">
                            <button type="submit" class="btn btn-link success btn-block"><i
                                    class="icon-check-circle"></i> <span id="btnName"> ຢືນຢັນ</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Page wrapper end -->
    <?php include('../../components/lib/script.php') ?>
    <script src="./app.js"></script>
</body>

</html>