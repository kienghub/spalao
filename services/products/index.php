<!doctype html>
<html lang="en" ng-app="app" ng-controller="controller" ng-init="_callProducts();_callCategory();_limitTo='20'">

<head>
    <!-- Required meta tags -->
    <?php include('../../components/lib/lib.php')?>
    <?php include('../../access/access.php')?>
    <?php _active('.settings')?>
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
                    <li class="breadcrumb-item" onclick="window.location='../settings/'">ຈັດການຂໍ້ມູນ</li>
                    <li class="breadcrumb-item active">ຂໍ້ມູນຄອສ໌</li>
                </ol>

                <ul class="app-actions">
                    <li>
                        <a href="#" id="reportrange">
                            <span class="range-text"></span>
                            <i class="icon-chevron-down"></i>
                        </a>
                    </li>
                    <li>
                        <a href="../settings/">
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
                            <h4><i class="fa fa-align-left"></i> <span ng-bind="form_title"></span></h4>
                            <hr>
                            <div class="form-group">
                                <label for="">ປະເພດຄອສ໌ <?php isVal()?></label>
                                <select ng-model="pro_cate_id" class="form-control">
                                    <option value="">-- ເລືອກ --</option>
                                    <option value={{i.cate_id}} ng-repeat="i in _categorys">
                                        {{i.cate_title}}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">ຊື່ຄອສ໌ <?php isVal()?></label>
                                <input type="hidden" class="form-control" ng-model="pro_id">
                                <input type="text" class="form-control" ng-model="pro_title"
                                    placeholder="ກະລຸນາປ້ອນຊື່ຄອສ໌">
                            </div>
                            <div class="form-group">
                                <label for="">ລາຄາ/ຄອສ໌ <?php isVal()?></label>
                                <input type="text" class="form-control text-right" ng-model="price_for_course"
                                    placeholder="00">
                            </div>
                            <div class="form-group">
                                <label for="">ຈຳນວນຄັ້ງ/ຄອສ໌ <?php isVal()?></label>
                                <input type="text" class="form-control text-right" ng-model="pro_qty" placeholder="0">
                            </div>
                            <div class="form-group">
                                <label for="">ລາຄາ/ຄັ້ງ <?php isVal()?></label>
                                <input type="text" class="form-control  text-right" ng-model="price_for_time"
                                    placeholder="00">
                            </div>
                            <div class="form-group">
                                <label for="">ໝາຍເຫດ</label>
                                <textarea rows="3" class="form-control" ng-model="pro_note"
                                    placeholder="ກະລຸນາປ້ອນໝາຍເຫດ"></textarea>
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
                            <h4><i class="fa fa-list"></i> ລາຍການຄອສ໌ <?php _limit() ?></h4>
                            <hr>
                            <div class="table-responsice">
                                <table class="table table-hover table-sm" id="main">
                                    <tr>
                                        <th>#</th>
                                        <th>ລາຍການ</th>
                                        <th>ລາຄາ/ຄອສ໌</th>
                                        <th>ຈຳນວນຄັ້ງ/ຄອສ໌</th>
                                        <th>ລາຄາ/ຄັ້ງ</th>
                                        <th>ໝາຍເຫດ</th>
                                        <th>ລົງວັນທີ</th>
                                        <th>ລົງໂດຍ</th>
                                        <th></th>
                                    </tr>
                                    <tr ng-repeat="x in _products" id="sublist">
                                        <td ng-bind='$index+1'></td>
                                        <td ng-bind='x.pro_title'></td>
                                        <td class="text-right" ng-bind='x.price_for_course | number'></td>
                                        <td class="text-right" ng-bind='x.pro_qty | number'></td>
                                        <td class="text-right" ng-bind='x.price_for_time | number'></td>
                                        <td ng-bind='x.pro_note'></td>
                                        <td ng-bind='x.pro_createdAt'></td>
                                        <td ng-bind='x.user_fname'></td>
                                        <td>
                                            <div class="btn-group float-right">
                                                <button type="button" ng-click="_onUpdate(x)"
                                                    class="btn btn-outline-primary"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" ng-click="_onDelete(x.pro_id)"
                                                    class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <?php _length() ?>
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