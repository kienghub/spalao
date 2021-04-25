<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <?php include('../../components/lib/lib.php') ?>
     <?php include('../../access/access.php') ?>
     <?php _active('.settings') ?>
</head>

<body ng-app="app" ng-controller="controller" ng-init="_callBranch();_limitTo='20'">
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
                         <li class="breadcrumb-item active">ຈັດການສາຂາ</li>
                    </ol>

                    <ul class="app-actions">
                         <li>
                              <a href="#" id="reportrange">
                                   <?php echo $_DATE_FORMAT ?> <div id="MyClockDisplay" class="clock"
                                        onload="showTime()">
                                   </div>
                              </a>
                         </li>
                         <li>
                              <a href="../settings/">
                                   <i class="icon-forward"></i>
                              </a>
                         </li>
                    </ul>
               </div>
               <!-- Page header end -->
               <!-- Main container start -->
               <div class="main-container">
                    <div class="row">
                         <div class="col-md-3 blog p-3">
                              <h4>
                                   <i class="icon-add-to-list"></i>
                                   <span ng-bind="titles"></span>
                              </h4>
                              <hr>
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
                              <button type="button" ng-click="_onSave()" class="btn btn-outline-primary">
                                   <i class="icon-check-circle"></i> <span ng-bind="btnName"></span>
                              </button>
                              <button type="button" ng-click="_onReset()" class="btn btn-outline-danger">
                                   <i class="icon-x-circle"></i>  ຍົກເລີກ
                              </button>
                         </div>
                         <div class="col-md-9">
                              <div class="table-container">
                                   <h4 class="t-header"><i class="icon-list"></i> ລາຍການສາຂາທັງໝົດ <?php _limit();?>
                                   </h4>
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
                                             <tr id="row" ng-repeat="x in _branchs | filter:_filter | limitTo:_limitTo">
                                                  <td class="text-center" ng-bind="$index+1"></td>
                                                  <td ng-bind='x.branch_name_l'></td>
                                                  <td ng-bind='x.branch_name_e'></td>
                                                  <td class="text-center" ng-bind='x.branch_createdAt'></td>
                                                  <td class="text-center" ng-bind='x.user_fname'></td>
                                                  <td style="width:100px!important;text-align:center">
                                                       <div class="btn-group">
                                                            <button type="button" ng-click="_onUpdate(x)"
                                                                 class="btn btn-outline-success"><i
                                                                      class="icon-edit"></i></button>
                                                            <button type="button" ng-click="_onDelete(x.branch_id)"
                                                                 class="btn btn-outline-danger"><i
                                                                      class="icon-trash"></i></button>
                                                       </div>
                                                  </td>
                                             </tr>
                                        </table>
                                        <?php _length() ?>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <!-- Row start -->

                    <!-- Row end -->
               </div>
               <!-- Row end -->
          </div>
          <!-- Main container end -->
     </div>
     </div>
     <!-- Page wrapper end -->
     <?php include('../../components/lib/script.php') ?>
     <script src="./app.js"></script>
</body>

</html>