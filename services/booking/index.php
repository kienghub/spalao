<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <?php include('../../components/lib/lib.php') ?>
     <?php include('../../access/access.php') ?>
     <?php _active('.booking') ?>
</head>

<body ng-app="app" ng-controller="booking" ng-init="_callBooking();_limitTo='25'">
     <!-- Page wrapper start -->
     <div class="page-wrapper pinned">
          <?php include('../../components/layout/side-bar.php') ?>
          <!-- Page content start  -->
          <div class="page-content">
               <?php include_once('../../components/layout/heading.php') ?>
               <!-- Page header start -->
               <div class="page-header">
                    <ol class="breadcrumb">
                         <li class="breadcrumb-item" onclick="window.location='../settings/'">ຈັດການຂໍ້ມູນ</li>
                         <li class="breadcrumb-item active">ຂໍ້ມູນການຈອງ</li>
                    </ol>

                    <ul class="app-actions">

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
                                             <th class="text-center text-nowrap" width='90'>#</th>
                                             <th class="text-center text-nowrap">ຊື່ ແລະ ນາມສະກຸນ</th>
                                             <th class="text-center text-nowrap">ເບີໂທ</th>
                                             <th class="text-center text-nowrap">ທີ່ຢູ່</th>
                                             <th class="text-center text-nowrap">ລາຍລະອຽດ</th>
                                             <th class="text-center text-nowrap">ສະຖານະ</th>
                                             <th class="text-center text-nowrap">ຮັບໂດຍ</th>
                                             <th class="text-center text-nowrap">ວັນທີສ້າງ</th>
                                             <th class="text-center text-nowrap"></th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <tr ng-repeat="x in _booking | filter:_filter">
                                             <td class="text-center" ng-bind="$index+1"></td>
                                             <td style="text-align:left" ng-bind="x.fullName"></td>
                                             <td style="text-align:center" class="text-nowrap" ng-bind="x.phoneNumber"></td>
                                             <td style="text-align:left" class="text-nowrap" ng-bind="x.Address"></td>
                                             <td style="text-align:left" class="text-nowrap" ng-bind="x.note"></td>
                                             <td style="text-align:center" ng-bind="x.status==0 ? 'ຍັງບໍ່ຮັບ':'ຮັບແລ້ວ' "></td>
                                             <td class="text-nowrap">
                                                  <span ng-bind="x.receiptBy?x.receiptBy:''"></span>
                                             <button type="button" ng-click="_onUpdateStatus(x._id)" ng-hide="x.status!=0?true:false" class="btn btn-success"><i class="icon-check-circle"></i> ຢືນຢັນ</button>
                                             </td>
                                             <td style="text-align:center" class="text-nowrap" ng-bind="x.bookingDate"></td>
                                             <td style="width:100px!important;text-align:center">
                                                  <div class="btn-group">
                                                       <button type="button" ng-click="_onDelete(x._id)" class="btn btn-outline-danger"><i class="icon-trash"></i></button>
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
          <div class="modal fade" id="addRate" tabindex="-1" role="dialog" aria-labelledby="addNewTaskLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                    <div class="modal-content">
                         <div class="modal-header">
                              <h5 class="modal-title" id="addNewTaskLabel" style="color:white!important"><i class="fa fa-usd"></i> <span ng-bind="titles"></span></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                              </button>
                         </div>
                         <div class="modal-body">
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                   <div class="form-group">
                                        <label for="taskTitle">ອັດຕາແລກປ່ຽນ(THB) <?php isVal() ?></label>
                                        <input type="hidden" class="form-control" id="rate_id" name="rate_id">
                                        <input type="number" class="form-control" id="rate_THB" name="rate_THB" placeholder="ອັດຕາແລກປ່ຽນ(THB)">
                                   </div>
                                   <div class="form-group">
                                        <label for="taskTitle">ອັດຕາແລກປ່ຽນ(USD) <?php isVal() ?></label>
                                        <input type="number" class="form-control" id="rate_USD" name="rate_USD" placeholder="ອັດຕາແລກປ່ຽນ(USD)">
                                   </div>
                              </div>
                         </div>
                         <div class="modal-footer custom">
                              <div class="left-side">
                                   <button type="reset" class="btn btn-link btn-block" style="color:red"><i class="fa fa-times-circle"></i> ຍົກເລີກ</button>
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