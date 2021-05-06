<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <?php include('../../components/lib/lib.php') ?>
     <?php include('../../access/access.php') ?>
     <?php _active('.settings') ?>
</head>

<body ng-app="app" ng-controller="rate" ng-init="_callRate();_limitTo='25'">
     <!-- Page wrapper start -->
     <div class="page-wrapper">
          <?php include('../../components/layout/side-bar.php') ?>
          <!-- Page content start  -->
          <div class="page-content">
               <?php include_once('../../components/layout/heading.php') ?>
               <!-- Page header start -->
               <div class="page-header">
                    <ol class="breadcrumb">
                         <li class="breadcrumb-item" onclick="window.location='../settings/'">ຈັດການຂໍ້ມູນ</li>
                         <li class="breadcrumb-item active">ອັດຕາແລກປ່ຽນ</li>
                    </ol>

                    <ul class="app-actions">
                         <li>
                              <h5 class="mt-2 mr-2">ເພີ່ມອັດຕາແລກປ່ຽນ</h5>
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
                         <h4 class="t-header"><i class="icon-list"></i> ລາຍລະອຽດ
                         </h4>
                         <div class="table-responsive">
                              <table datatable="ng" dt-option="vm.Option" class="table custom-table table-sm">
                                   <thead>
                                        <tr>
                                             <th class="text-center" width='90'>#</th>
                                             <th class="text-center">ບາດ(THB) / ກີບ</th>
                                             <th class="text-center">ໂດລາ(USD) / ກີບ</th>
                                             <th class="text-center">ວັນທີສ້າງ</th>
                                             <th class="text-center">ສ້າງໂດຍ</th>
                                             <th class="text-center"></th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <tr ng-repeat="x in _rate | filter:_filter">
                                             <td class="text-center" ng-bind="$index+1"></td>
                                             <td style="text-align:right" ng-bind="x.rate_THB"></td>
                                             <td style="text-align:right" ng-bind="x.rate_USD"></td>
                                             <td style="text-align:center" ng-bind="x.rate_createdAt"></td>
                                             <td ng-bind="x.user_fname + ' ' + x.user_lname"></td>
                                             <td style="width:100px!important;text-align:center">
                                                  <div class="btn-group">
                                                       <button type="button"
                                                            onclick="_onUpdate(<?php echo $key['rate_id'] ?>)"
                                                            class="btn btn-outline-success"><i
                                                                 class="icon-edit"></i></button>
                                                       <button type="button"
                                                            onclick="_onDelete('<?php echo $key['rate_id'] ?>')"
                                                            class="btn btn-outline-danger"><i
                                                                 class="icon-trash"></i></button>
                                                  </div>
                                             </td>
                                        </tr>
                                   </tbody>
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
                                        class="fa fa-usd"></i> <span ng-bind="titles"></span></h5>
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