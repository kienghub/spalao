<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <?php include('../../components/lib/lib.php') ?>
    <?php include('../../access/access.php') ?>
    <style>
    .card {
        cursor: pointer;
        border: 1px solid #ced4da;
    }

    .card:hover {
        background-color: #ced4da;
    }

    .bottom-bar {
        height: 70px;
        width: 100%;
        background-color: #e5e9f0;
        padding: 10px;
        vertical-align: middle !important;
    }

    .check-box {
        width: 18px;
        height: 18px;
    }
    </style>
</head>
<?php _active('.sale') ?>

<body ng-app="app" ng-controller="controller" ng-init="_callCategory()">
    <!-- Page wrapper start -->
    <div class="page-wrapper pinned">
        <?php include('../../components/layout/side-bar.php') ?>
        <!-- Page content start  -->
        <div class="page-content">
            <?php include_once('../../components/layout/heading.php') ?>
            <div class="page-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">ລວມໂຕະ</li>
                    <li class="breadcrumb-item active">ລາຍລະອຽດ</li>
                </ol>

                <ul class="app-actions">
                    <li>
                        <a href="#" id="reportrange">
                            <?php echo $_DATE_FORMAT ?> <div id="MyClockDisplay" class="clock" onload="showTime()">
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-export"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Main container start -->
            <div class="main-container">
                <div class="row">
                    <div class="task-section" style="width:100%">
                        <form action="#" method="POST">
                            <!-- Row start -->
                            <div class="row no-gutters">
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                                    <div class="docs-type-container  text-center">
                                        <input type="hidden" id="tb_id" value="<?php echo $_GET['id'] ?>">
                                        <h4>ໝວດບໍລິການ</h4>
                                        <div class="docTypeContainerScroll">
                                            <div class="docs-block  p-2">
                                                <input type="text" id="searchCategory" class='form-control m-1'
                                                    placeholder="ຄົ້ນຫາ..">
                                                <div class="doc-labels">
                                                    <a href="#" class="active">
                                                        <i class="icon-receipt"></i> ທັງໝົດ
                                                    </a>
                                                    <a href="#" ng-repeat="i in _callcate">
                                                        <i class="icon-receipt"></i> <span
                                                            ng-bind='i.cate_title'></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="labels-container p-3">
                                        <div class="lablesContainerScroll p-2">
                                            <center>
                                                <h4>ລາຍການຄອສ໌</span>
                                            </center>
                                            <div class="filters-block">
                                                <table class="table table-hover table-sm">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>ລາຍການ</th>
                                                        <th class="text-center">ຈຳນວນ</th>
                                                        <th class="text-right">ລາຄາ</th>
                                                        <th class="text-right">ເປັນເງິນ</th>
                                                        <th></th>
                                                    </tr>
                                                    <tr ng-repeat="i in _callOrder">
                                                        <td style="width:20px" ng-bind='$index+1'></td>
                                                        <td class="wrap-text" ng-bind='i.m_name_l'></td>
                                                        <td class="text-center" ng-bind=''></td>
                                                        <td class="text-right" ng-bind=''></td>
                                                        <td class="text-right" ng-bind=''></td>
                                                        <td style="width:80px">
                                                            <button type="submit" name="_handleSubmit"
                                                                class="btn btn-outline-danger">
                                                                ຍ້າຍ <i class="icon-shopping-cart1"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="labels-container p-3">
                                        <div class="lablesContainerScroll p-2">
                                            <center>
                                                <h4> ລາຍການທີ່ເລືອກ
                                            </center>
                                            <div class="filters-block">
                                                <table class="table table-hover table-sm">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>ລາຍການ</th>
                                                        <th class="text-center">ຈຳນວນ</th>
                                                        <th class="text-right">ລາຄາ</th>
                                                        <th class="text-right">ເປັນເງິນ</th>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:20px"></td>
                                                        <td class="wrap-text"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-right"></td>
                                                        <td class="text-right"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom-bar">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary btn-lg btn-block text-right"
                                                style="font-size:20px;font-family:Impact">
                                                <span style="font-size:20px;font-family:Impact"
                                                    ng-bind="_sumOldBill | number"></span> ກີບ</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary btn-lg btn-block text-right"
                                                style="font-size:20px;font-family:Impact"> ກີບ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Main container end -->
                </div>
                <!-- Page content end -->
            </div>
            <?php
            if (isset($_POST['_handleSubmit'])) {
                $tb_id1 = $_POST['first_id'];
                $tb_id2 = $_POST['last_id'];
                $od_id = $_POST['od_id'];
                $od_qty = $_POST['od_qty'];
                    $_joined = $_SQL($con, "UPDATE quick_orders SET tb_id='$tb_id2',od_bill_no='$b_No2' WHERE od_id = '$od_id'");
                    if ($_joined) {
                        echo "<script>window.location='./?first_id=$tb_id1 & last_id=$tb_id2'</script>";
                    } else {
                        echo "<script>window.location='./?first_id=$tb_id1 & last_id=$tb_id2'</script>";
                    }
            }
    
            ?>
            <!-- Page wrapper end -->
            <?php include('../../components/lib/script.php') ?>
            <script src="./app.js"></script>
</body>

</html>