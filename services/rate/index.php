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
    <div class="page-wrapper">
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
                        <a href="#" data-toggle="modal" data-target="#addRate">
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
                    <div class="t-header"><i class="icon-list"></i> ລາຍການປີ
                    </div>
                    <div class="table-responsive">
                        <table id="data" class="table custom-table table-sm">
                            <tr>
                                <th class="text-center" width='90'>#</th>
                                <th class="text-center">ບາດ(THB) / ກີບ</th>
                                <th class="text-center">ໂດລາ(USD) / ກີບ</th>
                                <th class="text-center">ວັນທີສ້າງ</th>
                                <th class="text-center">ສ້າງໂດຍ</th>
                                <th class="text-center"></th>
                            </tr>
                            <?php
                            $QUICK_ORDER_LOGIN = $_SQL($con, "SELECT * FROM spa_rate ORDER BY rate_createdAt DESC");
                            $x = 1;
                            foreach ($QUICK_ORDER_LOGIN as $key) {
                            ?>
                            <tr id="row">
                                <td class="text-center"><?php echo $x ?></td>
                                <td style="text-align:right"><?php echo @number_format($key['rate_THB']) ?></td>
                                <td style="text-align:right"><?php echo @number_format($key['rate_USD']) ?></td>
                                <td><?php echo $key['rate_createdAt'] ?></td>
                                <td><?php echo $key['rate_createdBy'] ?></td>
                                <td style="width:100px!important;text-align:center">
                                    <div class="btn-group">
                                        <button type="button" onclick="_onUpdate(<?php echo $key['rate_id'] ?>)"
                                            class="btn btn-outline-success"><i class="icon-edit"></i></button>
                                        <button type="button" onclick="_onDelete('<?php echo $key['rate_id'] ?>')"
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
    <form id="onSubmitRate" action="#">
        <div class="modal fade" id="addRate" tabindex="-1" role="dialog" aria-labelledby="addNewTaskLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewTaskLabel" style="color:white!important"><i
                                class="fa fa-usd"></i> ເພີ່ມອັດຕາແລກປ່ຽນ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="taskTitle">ອັດຕາແລກປ່ຽນ(THB) <?php isVal()?></label>
                                <input type="hidden" class="form-control" id="rate_id" name="rate_id">
                                <input type="number" class="form-control" id="rate_THB" name="rate_THB"
                                    placeholder="ອັດຕາແລກປ່ຽນ(THB)">
                            </div>
                            <div class="form-group">
                                <label for="taskTitle">ອັດຕາແລກປ່ຽນ(USD) <?php isVal()?></label>
                                <input type="number" class="form-control" id="rate_USD" name="rate_USD"
                                    placeholder="ອັດຕາແລກປ່ຽນ(USD)">
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
                            <button type="submit" class="btn btn-link success btn-block">
                                <i class="icon-check-circle"></i> <span id="btnName"> ຢືນຢັນ</span></button>
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