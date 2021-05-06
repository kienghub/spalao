<!doctype html>
<html lang="en" ng-app="app" ng-controller="controller" ng-init="_callCategory();_limitTo='20'">

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
                         <li class="breadcrumb-item active">ປະເພດຄອສ໌</li>
                    </ol>

                    <ul class="app-actions">
                         <li>
                              <a href="#" id="reportrange">
                                   <?php echo $_DATE_FORMAT ?> &nbsp;<div id="MyClockDisplay" class="clock"
                                        onload="showTime()">
                                   </div>
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
                                        <input type="hidden" class="form-control" ng-model="cate_id">
                                        <input type="text" class="form-control" ng-model="cate_title"
                                             placeholder="ກະລຸນາປ້ອນປະເພດຄອສ໌">
                                   </div>
                                   <div class="form-group">
                                        <label for="">ໝາຍເຫດ</label>
                                        <textarea rows="3" class="form-control" ng-model="cate_note"
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
                                   <h4><i class="fa fa-list"></i> ລາຍການປະເພດຄອສ໌</h4>
                                   <hr>
                                   <div class="table-responsice">
                                        <table datatable="ng" dt-option="vm.dtOption"
                                             class="table table-hover table-sm">
                                             <thead>
                                                  <tr>
                                                       <th>#</th>
                                                       <th>ລາຍການ</th>
                                                       <th>ໝາຍເຫດ</th>
                                                       <th>ລົງວັນທີ</th>
                                                       <th>ລົງໂດຍ</th>
                                                       <th></th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <tr ng-repeat="x in _categorys | filter:_filter">
                                                       <td ng-bind='$index+1'></td>
                                                       <td ng-bind='x.cate_title'></td>
                                                       <td ng-bind='x.cate_note'></td>
                                                       <td ng-bind='x.cate_createdAt'></td>
                                                       <td ng-bind='x.user_fname'></td>
                                                       <td>
                                                            <div class="btn-group float-right">
                                                                 <button type="button" ng-click="_onUpdate(x)"
                                                                      class="btn btn-outline-primary"><i
                                                                           class="fa fa-pencil"></i></button>
                                                                 <button type="button" ng-click="_onDelete(x.cate_id)"
                                                                      class="btn btn-outline-danger"><i
                                                                           class="fa fa-trash"></i></button>
                                                            </div>
                                                       </td>
                                                  </tr>
                                             </tbody>
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