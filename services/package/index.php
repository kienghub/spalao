<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <?php include('../../components/lib/lib.php')?>
     <?php include('../../access/access.php')?>
     <?php _active('.package')?>
</head>

<body ng-app="app" ng-controller="package" ng-init="_callPackage();_callProduct();pro_title=''">
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
                         <li class="breadcrumb-item active">ແພັກເກັຈ</li>
                    </ol>

                    <ul class="app-actions">
                         <button type="button" class="btn btn-success"
                              onclick="addPackage('ເພີ່ມຂໍ້ມູນແພັກເກັຈ','./add_package.php',50,90)">
                              <i class="icon-plus-circle"></i>
                              ສ້າງແພັກເກັຈ
                         </button>
                    </ul>
               </div>
               <!-- Page header end -->
               <!-- Main container start -->
               <div class="main-container">
                    <div class="row">
                         <div class="col-md-12 col-12">
                              <div class="blog p-3">
                                   <h4><i class="fa fa-list"></i> ລາຍການແພັກເກັຈ</h4>
                                   <hr>
                                   <div class="table-responsice">
                                        <table datatable="ng" dt-option="vm.dtOption"
                                             class="table table-hover table-sm table-bordered table-striped">
                                             <thead>
                                                  <tr>
                                                       <th>#</th>
                                                       <th>ຊື່ແພັກເກັຈ</th>
                                                       <th>ລາຄາ</th>
                                                       <th>ຈຳນວນຄັ້ງ</th>
                                                       <th>ລາຍລະອຽດ</th>
                                                       <th>ລົງວັນທີ</th>
                                                       <th>ລົງໂດຍ</th>
                                                       <th>ຈັດການ</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <tr ng-repeat="x in _package | filter:_filter">
                                                       <td class="text-center" ng-bind='$index+1'></td>
                                                       <td ng-bind='x.package_name'></td>
                                                       <td style="text-align:right" ng-bind='x.package_price | number'>
                                                       </td>
                                                       <td style="text-align:right" ng-bind='x.package_qty | number'>
                                                       </td>
                                                       <td ng-bind='x.note'></td>
                                                       <td class="text-center" ng-bind='x.createdAt'></td>
                                                       <td ng-bind="x.user_fname + ' ' + x.user_lname"></td>
                                                       <td class="text-center">
                                                            <div class="btn-group">
                                                                 <button type="button"  onclick="addPackage('ເພີ່ມຂໍ້ມູນແພັກເກັຈ','./edit_package.php?id={{x.p_id}}',50,90)"
                                                                      class="btn btn-outline-primary"><i
                                                                           class="fa fa-pencil"></i></button>
                                                                 <button type="button" ng-click="_onDelete(x.p_id)"
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
     <script>
     function addPackage(title, url, w, h) {
          layer.open({
               type: 2,
               area: [w + "%", h + "%"],
               fix: true,
               maxmin: true,
               shade: 0.4,
               title: title,
               content: url
          });
     }
     </script>
</body>

</html>