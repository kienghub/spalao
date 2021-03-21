<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <?php include('../../components/lib/lib.php') ?>
    <?php include('../../access/access.php') ?>
    <?php _active('.settings') ?>
</head>

<body ng-app="app" ng-controller="controller" ng-init="_callBranch()">
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
                    <li class="breadcrumb-item active">ຈັດການສາຂາ</li>
                </ol>

                <ul class="app-actions">
                    <li>
                        <a href="#" id="reportrange">
                            <?php echo $_DATE_FORMAT ?> <div id="MyClockDisplay" class="clock" onload="showTime()">
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#addBranch">
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
                    <div class="t-header"><i class="icon-list"></i> ລາຍການສາຂາທັງໝົດ
                    </div>
                    <div class="table-responsive">
                        <table id="data" class="table custom-table table-sm">
                            <tr>
                                <th class="text-center" width='90'>#</th>
                                <th class="text-center">ສາຂາ(ລາວ)</th>
                                <th class="text-center">ສາຂາ(ອັງກິດ)</th>
                                <th class="text-center">ວັນທີສ້າງ</th>
                                <th class="text-center">ສ້າງໂດຍ</th>
                                <th class="text-center"></th>
                            </tr>
                            <tr id="row" ng-repeat="x in _branchs">
                                <td class="text-center" ng-bind="$index+1"></td>
                                <td ng-bind='x.branch_name_l'></td>
                                <td ng-bind='x.branch_name_e'></td>
                                <td class="text-center" ng-bind='x.branch_createdAt'></td>
                                <td class="text-center" ng-bind='x.user_fname'></td>
                                <td style="width:100px!important;text-align:center">
                                    <div class="btn-group">
                                        <button type="button" ng-click="_onUpdate(x)" class="btn btn-outline-success"><i
                                                class="icon-edit"></i></button>
                                        <button type="button" ng-click="_onDelete(x.branch_id)"
                                            class="btn btn-outline-danger"><i class="icon-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
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
    <form action="#">
        <div class="modal fade" id="addBranch" tabindex="-1" role="dialog" aria-labelledby="addNewTaskLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewTaskLabel" style="color:white!important">
                            <span ng-bind="titles"></span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="taskTitle">ສາຂາ(ລາວ) <?php isVal()?></label>
                                <input type="hidden" class="form-control" ng-model="branch_id">
                                <input type="text" class="form-control" ng-model="branch_name_l"
                                    placeholder="ກະລຸນາປ້ອນສາຂາ(ລາວ)">
                            </div>
                            <div class="form-group">
                                <label for="taskTitle">ສາຂາ(ອັງກິດ)</label>
                                <input type="text" class="form-control" ng-model="branch_name_e"
                                    placeholder="ກະລຸນາປ້ອນສາຂາ(ອັງກິດ)">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer custom">
                        <div class="left-side">
                            <a href="#" class="btn btn-link btn-block" ng-click="_refresh()"
                                style="color:red">
                                <i class="fa fa-times-circle"></i> ຍົກເລີກ
                            </a>
                        </div>
                        <div class="divider"></div>
                        <div class="right-side">
                            <button type="button" ng-click="_onSave()" class="btn btn-link success btn-block">
                                <i class="icon-check-circle"></i>
                                <span ng-bind="btnName"> </span>
                            </button>
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