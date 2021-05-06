<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <?php include('../../components/lib/lib.php') ?>
     <?php include('../../access/access.php') ?>
     <?php _active('.equiment') ?>
</head>

<body ng-app="app" ng-controller="equiment" ng-init="_callEquiment()">
     <!-- Page wrapper start -->
     <div class="page-wrapper pinned">
          <?php include('../../components/layout/side-bar.php') ?>
          <!-- Page content start  -->
          <div class="page-content">
               <?php include_once('../../components/layout/heading.php') ?>
               <!-- Page header start -->
               <div class="page-header">
                    <ol class="breadcrumb">
                         <li class="breadcrumb-item" onclick="window.location='../home/'">ໜ້າຫຼັກ</li>
                         <li class="breadcrumb-item active">ລາຍການອຸປະກອນ</li>
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
                              <a href="./sign-up.php">
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
                         <div class="t-header"><i class="icon-list"></i> ລາຍການອຸປະກອນ
                         </div>
                         <div class="table-responsive">
                              <table datatable="ng" dt-option="vm.dtOption" class="table table-striped table-sm">
                                   <thead>
                                        <tr>
                                             <th class="text-center" width='70px'>#</th>
                                             <th class="text-center" width='90px'>ຮູບ</th>
                                             <th class="text-center">ຊື່ອຸປະກອນ(ລາວ)</th>
                                             <th class="text-center">ຊື່ອຸປະກອນ(ອັງກິດ)</th>
                                             <th class="text-center">ຫົວໜ່ວຍ</th>
                                             <th class="text-center">ຂະໜາດ</th>
                                             <th class="text-center">ລາຄາຊື້</th>
                                             <th class="text-center">ວັນທີສ້າງ</th>
                                             <th class="text-center">ສ້າງໂດຍ</th>
                                             <th class="text-center"></th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <tr ng-repeat="n in _equiment | filter:_filter">
                                             <td class="text-center" ng-bind="$index+1"></td>
                                             <td class="text-center">
                                                  <div class="project-details" style="margin:-10px">
                                                       <img src="../../img/{{n.e_img?n.e_img:'./photo.jpg'}}"
                                                            data-darkbox="../../img/{{n.e_img?n.e_img:'./photo.jpg'}}"
                                                            data-darkbox-group='two' class="avatar" alt="menu">
                                                  </div>
                                             <td ng-bind="n.e_name_l"></td>
                                             <td ng-bind="n.e_name_e"></td>
                                             <td class="text-center" ng-bind="n.e_type"></td>
                                             <td class="text-center" ng-bind="n.e_size"></td>
                                             <td class="text-right" ng-bind="n.e_Bprice | number"></td>
                                             <td class="text-center" ng-bind="n.e_createdAt"></td>
                                             <td class="text-center" ng-bind="n.user_fname"></td>
                                             <td style="width:100px!important;text-align:center">
                                                  <div class="btn-group">
                                                       <button type="button"
                                                            onclick="window.location='edit-equiment.php?id={{n.e_id}}'"
                                                            class="btn btn-outline-success"><i
                                                                 class="icon-edit"></i></button>
                                                       <button type="button" ng-click="_onDelete(n.e_id)"
                                                            class="btn btn-outline-danger">
                                                            <i class="icon-trash"></i></button>
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
     </div>
     <!-- Page wrapper end -->
     <?php include('../../components/lib/script.php') ?>
     <script src="./app.js"></script>
</body>

</html>