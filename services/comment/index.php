<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <?php include('../../components/lib/lib.php') ?>
     <?php include('../../access/access.php') ?>
     <?php _active('.comment') ?>
</head>

<body ng-app="app" ng-controller="comment" ng-init="_callComment();_limitTo='25'">
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
                         <li class="breadcrumb-item active">ລາຍການຄວາມຄິດເຫັນ</li>
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
                                             <th class="text-center text-nowrap">ລາຍລະອຽດ</th>
                                             <th class="text-center text-nowrap">ວັນທີສ້າງ</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <tr ng-repeat="x in _comment | filter:_filter">
                                             <td class="text-center" ng-bind="$index+1"></td>
                                             <td style="text-align:left" ng-bind="x.comment"></td>
                                             <td width="15%" style="text-align:left" ng-bind="x.date"></td>
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