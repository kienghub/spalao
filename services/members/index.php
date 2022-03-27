<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <?php include('../../components/lib/lib.php') ?>
     <?php include('../../access/access.php') ?>
     <?php _active('.member') ?>
</head>

<body ng-app="app" ng-controller="member" ng-init="_limitTo='20';_callMemberData()">
     <!-- Page wrapper start -->
     <div class="page-wrapper pinned">
          <?php include('../../components/layout/side-bar.php') ?>
          <!-- Page content start  -->
          <div class="page-content">
               <?php include_once('../../components/layout/heading.php') ?>
               <!-- Page header start -->
               <div class="page-header">
                    <ol class="breadcrumb">
                         <li class="breadcrumb-item" onclick="window.location='./'">ຈັດການສະມາຊິກ</li>
                    </ol>

                    <ul class="app-actions">
                         <li>
                         </li>
                    </ul>
               </div>
               <!-- Page header end -->
               <!-- Main container start -->
               <div class="main-container">
                    <div class="row">
                         <div class="col-sm-3 blog p-3">

                              <h4>
                                   <i class="icon-user-plus"></i>
                                   <span ng-bind="titles"></span>
                              </h4>
                              <hr>
                              <div class="form-group">
                                   <label for="taskTitle">ຊື່ ແລະ ນາມສະກຸນ <?php isVal() ?></label>
                                   <input type="hidden" class="form-control" ng-model="mb_id">
                                   <input type="text" class="form-control" ng-model="mb_fullName" placeholder="ກະລຸນາປ້ອນຊື່ ແລະ ນາມສະກຸນ">
                              </div>
                              <div class="form-group">
                                   <label for="taskTitle">ເບີໂທລະສັບ <?php isVal() ?></label>
                                   <input type="number" class="form-control" ng-model="mb_phoneNumber" placeholder="ກະລຸນາປ້ອນເບີໂທ">
                              </div>
                              <div class="form-group">
                                   <label for="taskTitle">ທີ່ຢູ່ <?php isVal() ?></label>
                                   <textarea ng-model="mb_address" cols="30" rows="4" class="form-control" placeholder="ກະລຸນາປ້ອນທີ່ຢູ່"></textarea>
                              </div>
                              <div class="form-group">
                                   <label for="taskTitle">ລາຍລະອຽດ</label>
                                   <textarea ng-model="mb_note" id="mb_note" cols="30" rows="4" class="form-control" placeholder="ກະລຸນາປ້ອນລາຍລະອຽດ"></textarea>
                              </div>
                              <div class="form-group">
                                   <button type="button" ng-click="_onSave()" class="btn btn-outline-primary">
                                        <i class="icon-check-circle"></i>
                                        <span ng-bind="btnName"></span>
                                   </button>
                                   <button type="" ng-click="_onReset()" class="btn btn-outline-danger">
                                        <i class="fa fa-times-circle"></i> ຍົກເລີກ
                                   </button>
                              </div>
                         </div>
                         <div class="col-sm-9">
                              <div class="row">
                                   <div class="col-md-12">
                                        <div class="card">
                                             <div class="card-body">
                                                  <h3> <i class="icon-user-plus"></i> ລາຍການສະມາຊິກ</h5>
                                                  <hr />
                                                  <div class="table-responsive">
                                                       <table datatable="ng" dt-option="vm.dtOption" class="table table-sm table-bordered table-striped">
                                                            <thead>
                                                                 <tr>
                                                                      <th>#</th>
                                                                      <th>ຊື່ ແລະ ນາມສະກຸນ</th>
                                                                      <th>ເບີໂທ</th>
                                                                      <th>ທີ່ຢູ່</th>
                                                                      <th>ລາຍລະອຽດ</th>
                                                                      <th>ວັນທີເຂົ້າຮວ່ມ</th>
                                                                      <th></th>
                                                                 </tr>
                                                            </thead>
                                                            <tbody>
                                                                 <tr ng-repeat="x in _members | filter:_filter | limitTo:_limitTo">
                                                                      <td>#</td>
                                                                      <td ng-bind="x.mb_fullName"></td>
                                                                      <td ng-bind="x.mb_phoneNumber"></td>
                                                                      <td ng-bind="x.mb_address"></td>
                                                                      <td ng-bind="x.mb_note"></td>
                                                                      <td ng-bind="x.mb_createdAt"></td>
                                                                      <td>
                                                                           <a href="" class="edit-card" ng-hide="_edit" ng-click="_onUpdate(x)">
                                                                                <i class="icon-mode_edit"></i>
                                                                           </a>
                                                                           <a href="" class="edit-card" ng-hide="_delete" ng-click="_onDelete(x.mb_id)">
                                                                                <i class="icon-trash"></i>
                                                                           </a>
                                                                      </td>
                                                                 </tr>
                                                            </tbody>
                                                       </table>
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
                    <!-- Page content end -->
                    <!-- Page wrapper end -->
                    <?php include('../../components/lib/script.php') ?>
                    <script src="./app.js"></script>
</body>

</html>