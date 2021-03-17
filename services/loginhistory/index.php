<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <?php include('../../components/lib/lib.php') ?>
    <?php include('../../access/access.php') ?>
</head>

<body ng-app="app" ng-controller="controller" ng-init="_callData();_limitTo='20';years='<?php echo $_GET['years']?>'">
    <!-- Page wrapper start -->
    <div class="page-wrapper pinned">
        <?php 
        include('../../components/layout/side-bar.php')
         ?>
        <!-- Page content start  -->
        <div class="page-content">
            <?php include_once('../../components/layout/heading.php') ?>
            <!-- Page header start -->
            <div class="page-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" onclick="window.location='../home/'">ໜ້າຫຼັກ</li>
                    <li class="breadcrumb-item active">ປະຫວັດການເຂົ້າລະບົບ</li>
                </ol>

                <ul class="app-actions">
                    <li>
                        <a href="#" id="reportrange">
                            <?php echo $_DATE_FORMAT ?> <div id="MyClockDisplay" class="clock" onload="showTime();">
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Page header end -->
            <!-- Main container start -->
            <div class="main-container">
                <div class="row no-gutters">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-4">
                        <div class="docs-type-container">
                            <div class="docTypeContainerScroll">
                                <div class="docs-block  bg-white">
                                    <div class="doc-labels">
                                        <a href="./?all=true"
                                            class="<?php if(@$_GET['all']=='true'){echo 'active';}else{echo '';}?>">
                                            <i class="icon-receipt"></i> ທັງໝົດ
                                        </a>
                                        <?php 
                                            $_callYear =$_SQL($con,"SELECT * FROM spa_login GROUP BY years ORDER BY years DESC");
                                            foreach($_callYear as $key){
                                            ?>
                                        <a href="./?years=<?php echo $key['years'] ?>"
                                            class="<?php if($_GET['years']==$key['years']){echo 'active';}else{echo '';}?>">
                                            <i class="icon-receipt"></i>ປີ <?php echo $key['years']; ?>
                                        </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-9 col-sm-9 col-8">
                        <div class="documents-container">
                            <div class="documents-body">
                                <!-- Row start -->
                                <div class="table-container">
                                    <div class="t-header h5"><i class="icon-list"></i> ລາຍການທັງໝົດ
                                        <?php _limit()?>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="main" class="table custom-table table-sm">
                                            <tr>
                                                <th class="text-center" width='90'>#</th>
                                                <th class="text-center">ຊື່ຜູ້ເຂົ້າລະບົບ</th>
                                                <th class="text-center">ຊື່ອຸປະກອນ</th>
                                                <th class="text-center">ສະຖານທີ່</th>
                                                <th class="text-center">ພິກັດ</th>
                                                <th class="text-center">ເວລາ</th>
                                                <th class="text-center">ປີ</th>
                                                <th class="text-center">ຈັດການ</th>
                                            </tr>
                                            <tr id="sublist"
                                                ng-repeat="x in _history | filter:{years:years} | limitTo:_limitTo">
                                                <td class="text-center" ng-bind="$index+1"></td>
                                                <td ng-bind="x.login_user"></td>
                                                <td ng-bind="x.login_host"></td>
                                                <td ng-bind="x.login_address"></td>
                                                <td>
                                                    <a href="https://maps.google.com/?q={{x.login_lat+','+x.login_long}}"
                                                        target="_blank"><span ng-bind="x.login_lat"></span>,<span
                                                            ng-bind="x.login_long"></span></a>
                                                </td>
                                                <td ng-bind="x.login_time"></td>
                                                <td ng-bind="x.years"></td>
                                                <td style="width:100px!important;text-align:center">
                                                    <div class="btn-group">
                                                        <button type="button" ng-click="_onDelete(x.login_id)"
                                                            class="btn btn-outline-danger"><i
                                                                class="icon-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <?php _length() ?>
                                    </div>
                                </div>
                                <!-- Row end -->
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- Main container end -->
    </div>


    <!-- Page content end -->
    </div>
    <!-- Page wrapper end -->
    <?php include('../../components/lib/script.php') ?>
    <script src="app.js"></script>
</body>

</html>