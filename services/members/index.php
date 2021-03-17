<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <?php include('../../components/lib/lib.php') ?>
    <?php include('../../access/access.php') ?>
    <?php _active('.settings') ?>
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
                    <li class="breadcrumb-item" onclick="window.location='../settings/'">ຈັດການລະບົບ</li>
                    <li class="breadcrumb-item active">ອັດຕາແລກປ່ຽນ</li>
                </ol>

                <ul class="app-actions">
                    <li>
                        <a href="#" id="reportrange">
                            <?php echo $_DATE_FORMAT ?> <div id="MyClockDisplay" class="clock" onload="showTime()">
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#addMember">
                            <i class="icon-plus"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Page header end -->
            <!-- Main container start -->
            <div class="main-container">
                <!-- Row start -->
                <div class="table-container">
                    <div class="t-header"><i class="icon-list"></i> ລາຍກາສະມາຊິກທັງໝົດ
                    </div>
                    <div class="table-responsive">
                        <table id="main" class="table custom-table table-sm">
                            <tr>
                                <th class="text-center" width='90'>#</th>
                                <th class="text-center">ຊື່ ແລະ ນາມສະກຸນ</th>
                                <th class="text-center">ເບີໂທລະສັບ</th>
                                <th class="text-center">ທີ່ຢູ່</th>
                                <th class="text-center">ລາຍລະອຽດ</th>
                                <th class="text-center">ວັນທີສ້າງ</th>
                                <th class="text-center">ສ້າງໂດຍ</th>
                                <th class="text-center"></th>
                            </tr>
                            <?php
                            $queryMember = $_SQL($con, "SELECT * FROM spa_member ORDER BY mb_createdAt DESC");
                            $x = 1;
                            foreach ($queryMember as $key) {
                            ?>
                            <tr id="sublist">
                                <td class="text-center"><?php echo $x ?></td>
                                <td><?php echo $key['mb_fullName'] ?></td>
                                <td class="text-center"><?php echo $key['mb_phoneNumber'] ?></td>
                                <td><?php echo $key['mb_address'] ?></td>
                                <td><?php echo $key['mb_note'] ?></td>
                                <td class="text-center"><?php echo $key['mb_createdAt'] ?></td>
                                <td><?php echo $key['mb_createdBy'] ?></td>
                                <td style="width:100px!important;text-align:center">
                                    <div class="btn-group">
                                        <button type="button" onclick="_onUpdate(<?php echo $key['mb_id'] ?>)"
                                            class="btn btn-outline-success"><i class="icon-edit"></i></button>
                                        <button type="button" onclick="_onDelete('<?php echo $key['mb_id'] ?>')"
                                            class="btn btn-outline-danger"><i class="icon-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php $x++;
                            } ?>
                        </table>
                    </div>
                </div>
                <!-- Row end -->
            </div>
            <!-- Row end -->
        </div>
        <!-- Main container end -->
    </div>
    <!-- Page content end -->
    <!-- Page content end -->
    <form id="onSubmitMember" action="#">
        <div class="modal fade" id="addMember" tabindex="-1" role="dialog" aria-labelledby="addNewTaskLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewTaskLabel" style="color:white!important"><i
                                class="fa fa-user-plus"></i> ເພີ່ມສະມາຊິກ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="taskTitle">ຊື່ ແລະ ນາມສະກຸນ <?php isVal() ?></label>
                                <input type="hidden" class="form-control" id="mb_id" name="mb_id">
                                <input type="text" class="form-control" id="mb_fullName" name="mb_fullName"
                                    placeholder="ກະລຸນາປ້ອນຊື່ ແລະ ນາມສະກຸນ">
                            </div>
                            <div class="form-group">
                                <label for="taskTitle">ເບີໂທລະສັບ <?php isVal() ?></label>
                                <input type="number" class="form-control" id="mb_phoneNumber" name="mb_phoneNumber"
                                    placeholder="ກະລຸນາປ້ອນເບີໂທ">
                            </div>
                            <div class="form-group">
                                <label for="taskTitle">ທີ່ຢູ່ <?php isVal() ?></label>
                                <textarea name="mb_address" id="mb_address" cols="30" rows="4" class="form-control"
                                    placeholder="ກະລຸນາປ້ອນທີ່ຢູ່"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="taskTitle">ລາຍລະອຽດ</label>
                                <textarea name="mb_note" id="mb_note" cols="30" rows="4" class="form-control"
                                    placeholder="ກະລຸນາປ້ອນລາຍລະອຽດ"></textarea>
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

    </div>
    <!-- Page wrapper end -->
    <?php include('../../components/lib/script.php') ?>
    <script src="./app.js"></script>
</body>

</html>