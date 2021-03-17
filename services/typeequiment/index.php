<!doctype html>
<html lang="en" ng-app="app" ng-controller="controller" ng-init="_callTypeEqument();">

<head>
    <!-- Required meta tags -->
    <?php include('../../components/lib/lib.php')?>
    <?php include('../../access/access.php')?>
    <?php _active('.equiment')?>
</head>

<body>
    <!-- Page wrapper start -->
    <div class="page-wrapper pinned">
        <?php include('../../components/layout/side-bar.php') ?>
        <!-- Page content start  -->
        <div class="page-content">
            <?php include_once('../../components/layout/heading.php')?>
            <!-- Page header start -->
            <div class="page-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">ປະເພດອຸປະກອນ</li>
                </ol>

                <ul class="app-actions">
                    <li>
                        <a href="#" id="reportrange">
                            <span class="range-text"></span>
                            <i class="icon-chevron-down"></i>
                        </a>
                    </li>
                    <li>
                        <a href="./">
                            <i class="icon-export"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Page header end -->
            <!-- Main container start -->
            <div class="main-container">
                <div class="row">
                    <div class="col-md-3 col-12">
                        <div class="blog p-3">
                            <h4><i class="fa fa-plus"></i> <span ng-bind="form_title"></span></h4>
                            <hr>
                            <div class="form-group">
                                <label for="">ປະເພດອຸປະກອນ(ລາວ) <?php isVal()?></label>
                                <input type="hidden" class="form-control" ng-model="etype_id">
                                <input type="text" class="form-control" ng-model="etype_name_l"
                                    placeholder="ກະລຸນາປ້ອນປະເພດອຸປະກອນ(ລາວ)">
                            </div>
                            <div class="form-group">
                                <label for="">ປະເພດອຸປະກອນ(ອັງກິດ)</label>
                                <input type="text" class="form-control" ng-model="etype_name_e"
                                    placeholder="ກະລຸນາປ້ອນປະເພດອຸປະກອນ(ອັງກິດ)">
                            </div>
                            <div class="form-group">
                                <button type="button" ng-click="_onSave()" class="btn btn-outline-primary"><i
                                        class="fa fa-check-circle"></i> <span ng-bind='btnName'"></span></button>
                                    <button type=" button" ng-click="_clear()" class="btn btn-outline-danger"><i
                                            class="fa fa-times-circle"></i> ຍົກເລີກ</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-12">
                        <div class="blog p-3">
                            <h4><i class="fa fa-list"></i> ລາຍການປະເພດອຸປະກອນ </h4>
                            <hr>
                            <div class="table-responsice">
                                <table class="table table-hover table-sm" id="data">
                                    <tr>
                                        <th>#</th>
                                        <th>ລາຍການ</th>
                                        <th>ໝາຍເຫດ</th>
                                        <th>ລົງວັນທີ</th>
                                        <th>ລົງໂດຍ</th>
                                        <th></th>
                                    </tr>
                                    <tr ng-repeat="x in _typeequiment" id="row">
                                        <td ng-bind='$index+1'></td>
                                        <td ng-bind='x.etype_name_l'></td>
                                        <td ng-bind='x.etype_name_e'></td>
                                        <td ng-bind='x.etype_createdAt'></td>
                                        <td ng-bind='x.user_fname'></td>
                                        <td>
                                            <div class="btn-group float-right">
                                                <button type="button" ng-click="_onUpdate(x)"
                                                    class="btn btn-outline-primary"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" ng-click="_onDelete(x.etype_id)"
                                                    class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row end -->
        </div>
        <!-- Main container end -->
    </div>
    <!-- Page content end -->
    </div>
    <!-- Page wrapper end -->
    <?php include('../../components/lib/script.php')?>
    <script src="app.js"></script>
</body>

</html>