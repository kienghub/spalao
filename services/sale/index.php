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

<body ng-app="app" ng-controller="controller" ng-init="_callProduct();_callCategory();cate_id=''">
    <!-- Page wrapper start -->
    <div class="page-wrapper pinned">
        <?php include('../../components/layout/side-bar.php') ?>
        <!-- Page content start  -->
        <div class="page-content">
            <?php include_once('../../components/layout/heading.php') ?>
            <div class="page-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">ໜ້າຂາຍ</li>
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
                                <div class="col-8">
                                    <div class="labels-container p-3">
                                        <div id="elem">
                                            <label class="list-menu" ng-click='_onSelected()'
                                                class="{{cate_id==null ?'active':''}}">
                                                <a href="#"> <strong> ທັງໝົດ</strong></a>
                                            </label>
                                            <label ng-repeat="i in _callcate" class="list-menu"
                                                ng-click='_onSelected(i.cate_id)'
                                                class="{{cate_id==i.cate_id ? 'active':''}}">
                                                <a href="#"> <strong ng-bind='i.cate_title'></strong></a>
                                            </label>
                                        </div>

                                        <div class="lablesContainerScroll p-2">
                                            <center>
                                                <h4>ລາຍການຄອສ໌</span>
                                            </center>
                                            <div class="filters-block">
                                                <table class="table table-hover table-sm" id="main">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>ລາຍການ</th>
                                                        <th class="text-center">ຈຳນວນ</th>
                                                        <th class="text-center">ລາຄາ/ຄັ້ງ</th>
                                                        <th class="text-center">ລາຄາ/ຄອສ໌</th>
                                                        <th></th>
                                                    </tr>
                                                    <tr id="sublist"
                                                        ng-repeat="i in _callproduct | filter:{pro_cate_id:cate_id}">
                                                        <td style="width:20px" ng-bind='$index+1'></td>
                                                        <td class="wrap-text" ng-bind='i.pro_title'></td>
                                                        <td class="wrap-text text-center" ng-bind='i.pro_qty'></td>
                                                        <td class="text-right" ng-bind='i.price_for_time | number'>
                                                        </td>
                                                        <td class="text-right" ng-bind='i.price_for_course | number'>
                                                        </td>
                                                        <td style="width:80px">
                                                            <button type="button" name="_handleSubmit"
                                                                class="btn btn-outline-danger">
                                                                <i class="icon-shopping-cart1"></i>
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
                                                <h4> ເລກບິນ
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
                                        <div class="row">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-warning btn-lg btn-block p-2"
                                                    style="font-size:25px">
                                                    <i class="icon-printer"></i> ພິມບິນ</button>
                                            </div>
                                            <div class="col-6">
                                                <button type="button" class="btn btn-danger btn-lg btn-block p-2"
                                                    style="font-size:25px">
                                                    <i class="icon-power1"></i> ປິດການຂາຍ</button>
                                            </div>
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
            <!-- Page wrapper end -->
            <?php include('../../components/lib/script.php') ?>
            <script src="./app.js"></script>
</body>

</html>